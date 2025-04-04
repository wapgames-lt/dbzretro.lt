<?php

	GLOBAL $curlHeaders;
	$curlHeaders = array();
		
	/**
	 * get content of file given by $url, also can send POST query
	 * @param string $url - remote adress (urlencoded string)
	 * @param string $post_request - post query (urlencoded string)
	 * @return string contents of file given by $url
	 */
	function url_get_contents( $url, $post_request='', $timeout=5, $cookie = null, $UA = "XML Sender" ) {
	    GLOBAL $_MOD_DIR;
	
		if( is_array($post_request) ){
			foreach($post_request As $key => $value){
				$tmp .= "{$key}={$value}&";
			} 
			$post_request = substr($tmp, 0, -1);
		}
	
	    if(extension_loaded("curl")){
	        return trim(UseCURLSocket( $url, $post_request, $timeout, $cookie, $UA ));
	    }elseif(!$post_request){
	        return trim(getRemoteUrl($url));
	    }else{
	        return trim(use_socket($url, $post_request, $timeout));
	    }
	}
	
	
	function use_socket($_request_host, $post_request, $timeout=5) {
	    if ($timeout) $socket = fsockopen($_request_host, 80, $errnum, $errstr, $timeout);
	    else $socket = fsockopen($_request_host, 80, $errnum, $errstr); 
	
	    $body = "";
	    if(!$socket) {
	       echo "Unable to connect to ".$_request_host.": $errnum $errstr<br>";
	        return false;
	    } else {
	        fputs($socket, $post_request);
	        $isHeader = true;
	        $blockSize = 0;
	        $header = "";
	        $body = "";
	        
	        //kadangi kartais nesuranda failo pabaigos,
	        //reikia daryti time out'a
	        if (function_exists('stream_set_timeout')){
		        stream_set_timeout($socket, $timeout);
		     	$status = socket_get_status($socket);
		     	
		        while (!feof($socket) && !$status['timed_out'] ) {
		            if($isHeader){
		                $line = fgets($socket, 1024); 
		                $header .= $line;
		                if (strstr($line, "Content-Length:")) {
		                    $blockSize = hexdec(trim(substr($line, strpos($line, ":")+1)));
		                }
		                if('' == trim($line)){
		                    $isHeader = false;
		                }
		            } else {
		                if($blockSize == 0){
		                    $line = fgets($socket, 1024);
		                    if($blockSizeHex = trim($line)){
		                        $blockSize = hexdec($blockSizeHex);
		                    }
		                } else {
		                    $line = fread($socket,$blockSize);
		                    $body .= $line;
		                    $readSize = strlen($line);
		                    if($readSize == $blockSize)
		                        $blockSize = 0;
		                    else
		                        $blockSize -= $readSize;
		                }
		            }
		            
		            $status = socket_get_status($socket);
		        }
	        }else{
	        	while (!feof($socket) ) {
		            if($isHeader){
		                $line = fgets($socket, 1024); 
		                $header .= $line;
		                if (strstr($line, "Content-Length:")) {
		                    $blockSize = hexdec(trim(substr($line, strpos($line, ":")+1)));
		                }
		                if('' == trim($line)){
		                    $isHeader = false;
		                }
		            } else {
		                if($blockSize == 0){
		                    $line = fgets($socket, 1024);
		                    if($blockSizeHex = trim($line)){
		                        $blockSize = hexdec($blockSizeHex);
		                    }
		                } else {
		                    $line = fread($socket,$blockSize);
		                    $body .= $line;
		                    $readSize = strlen($line);
		                    if($readSize == $blockSize)
		                        $blockSize = 0;
		                    else
		                        $blockSize -= $readSize;
		                }
		            }
		        }
	        }     
		     
	        fclose($socket);
	        return $body;
	    }
	}
	
	function UseCURLSocket( $url, $post_fields = '', $timeout=5, $cookie = null, $UA = "XML Sender"  ) {
		GLOBAL $curlHeaders;
		$curlHeaders = array();
		
	    $cu = curl_init();
	    curl_setopt($cu, CURLOPT_URL, 				$url); 
	    curl_setopt($cu, CURLOPT_SSL_VERIFYHOST, 	2); 
	    
	    if( $UA ){
	    	curl_setopt($cu, CURLOPT_USERAGENT, 		$UA);
	    }
	
	    curl_setopt($cu, CURLOPT_RETURNTRANSFER, 	1); 
	    curl_setopt($cu, CURLOPT_SSL_VERIFYPEER,    false);
	    @curl_setopt($cu, CURLOPT_FOLLOWLOCATION, 	true);
	    
	    if(strlen($post_fields) > 0) {
	        curl_setopt($cu, CURLOPT_POST, 1); 
	        curl_setopt($cu, CURLOPT_POSTFIELDS, $post_fields); 
	    }
	    
	    curl_setopt($cu, CURLOPT_HEADERFUNCTION,	'curlHeaderCallback');
	    curl_setopt($cu, CURLOPT_TIMEOUT, 			$timeout);
	    curl_setopt($cu, CURLOPT_CONNECTTIMEOUT, 	$timeout);
	    
     
	    $err_no = curl_errno($cu);
	    $succeeded  = $err_no == 0 ? true : false;
	    if (!$succeeded) {
	        $err_msg = curl_error($cu);
	        echo "cURL unable to connect to ".$url.": $err_no $err_msg<br>";
	    }elseif($cu){
	    	$output = curl_exec($cu);
	    } 
	
	    curl_close($cu);
	    return $output;
	}
	
	function use_direct_read( $url ) {
	    $buffer = "";
	    if($fp = fopen($url, "r")) {
	        while(!feof($fp)) {
	            $buffer .= fread($fp, 1024);
	        }
	        fclose($fp);
	    } else {
	        $buffer = false;
	    }
	    return $buffer;
	}
	
	// for php5 compatibility
	if ( !function_exists('http_build_query') ) {
	/**
	 * Builds http query string
	 * @param array $formdata some array to convert
	 * @param string $numberic_prefix prefix which is is be added to numeric
	 * array keys
	 * @return string http query string
	 */
	function http_build_query(&$formdata, $numeric_prefix='', $_array_prefix=NULL) {
	    $query = '';
	    foreach ( $formdata as $key => $val ) {
	        if ( is_array($val) ) {
	            $query .= ($query?'&':'');
	            if ( isset($_array_prefix) ) {
	                $query .= http_build_query($formdata[$key], $numeric_prefix,
	                        (is_int($_array_prefix)?$numeric_prefix:'').$_array_prefix.'['.urlencode($key).']');
	            } else 
	                $query .= http_build_query($formdata[$key], $numeric_prefix, urlencode($key));
	        } else {
	            $query .= ($query?'&':'').(is_int($_array_prefix)?$numeric_prefix:'').$_array_prefix;
	            if ( isset($_array_prefix) )
	                $query .= '['.urlencode($key).']='.urlencode($val);
	            else 
	                $query .= (is_int($key)?$numeric_prefix:'').urlencode($key).'='.urlencode($val);
	        }
	    }
	    return $query;
	}
	}
	
	
	function curlHeaderCallback($resURL, $strHeader) {
		GLOBAL $curlHeaders;
		$curlHeaders[] = trim($strHeader);
		
		return strlen($strHeader);
	}

	function getRemoteUrl($url)
{
	$url_parsed = parse_url($url);
	$host = $url_parsed["host"];
	$port = $url_parsed["port"];
	if ($port==0)
		$port = 80;
	$path = $url_parsed["path"];
	if ($url_parsed["query"] != "")
		$path .= "?".$url_parsed["query"];
	$out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
	$fp = fsockopen($host, $port, $errno, $errstr, 30);
	if ($fp) {
		fwrite($fp, $out);
		$body = false;
		while (!feof($fp)) {
			$s = fgets($fp, 1024);
			if ( $body )
				$in .= $s;
			if ( $s == "\r\n" )
				$body = true;
		}
		fclose($fp);
		return $in;
	} else return false;
}


?>

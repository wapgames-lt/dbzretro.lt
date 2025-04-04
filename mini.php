


		
		<script>

	function citata(user){
		document.getElementById("minichatzin").value += " "+user+": -> ";
	}	
	function veidukaii(user){
		document.getElementById("minichatzin").value += " "+user+": -> ";
	}	
	function reloadPage()
	{
		location.reload()
	}
    function loadChat(username)
    {
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
        }
		else
        {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            document.getElementById("myDiv2").innerHTML = xmlhttp.responseText;
        }
        };
        xmlhttp.open("GET", "minichat2.php?id=&username=" + username, true);
        xmlhttp.send();					
    }
			function minichatwrite()
            {
               
             
                	zin = document.getElementById("minichatzin").value;
				var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {	
                        document.getElementById("error").innerHTML = xmlhttp.responseText;
						setTimeout(function(){document.getElementById("error").innerHTML = "";},5000);
						document.getElementById("minichatzin").value = "";
                    }
                };
                xmlhttp.open("GET", "minichat.php?zinute=" + zin, true);
				xmlhttp.send();				
            }	
	</script>

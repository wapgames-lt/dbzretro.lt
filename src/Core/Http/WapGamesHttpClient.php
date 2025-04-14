<?php

declare(strict_types=1);

namespace LegacyDbz\Core\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final readonly class WapGamesHttpClient
{
    private Client $client;
    private string $siteUUID;
    private string $siteApiKey;

    public function __construct()
    {
        $this->client =  new Client();
        $this->siteUUID = getenv('WAP_GAMES_SITE_UUID');
        $this->siteApiKey = getenv('WAP_GAMES_API_KEY');

        if ($this->siteUUID === '' || $this->siteUUID === '0' || ($this->siteApiKey === '' || $this->siteApiKey === '0')) {
            throw new \InvalidArgumentException('Site UUID or API Key is missing. Check .env file.');
        }
    }

    public function postNew(string $title, string $content): array
    {
        $url = "https://wapgames.lt/api/v1/sites/{$this->siteUUID}/news?api_key={$this->siteApiKey}";

        $data = [
            'title' => $title,
            'content' => $content,
        ];

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        try {
            logInfo('Importing new to wapgames.lt', [
                'data' => $data,
                'headers' => $headers,
            ]);
            $response = $this->client->post($url, [
                'json' => $data,
                'headers' => $headers,
            ]);

            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (GuzzleException $e) {
            logError('WAP games request failed: ' . $e->getMessage());

            return [];
        }
    }
}

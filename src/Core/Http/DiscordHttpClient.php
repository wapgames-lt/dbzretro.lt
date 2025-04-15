<?php

declare(strict_types=1);

namespace LegacyDbz\Core\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final readonly class DiscordHttpClient
{
    private Client $client;
    private string $webhookUrl;
    private string $username;

    public function __construct()
    {
        $this->client = new Client();
        $this->webhookUrl = getenv('DISCORD_WEBHOOK_URL');
        $this->username = getenv('DISCORD_USERNAME');

        if ($this->webhookUrl === '' || $this->webhookUrl === '0') {
            throw new \InvalidArgumentException('Discord webhook URL is missing. Check your .env file.');
        }

        if ($this->username === '' || $this->username === '0') {
            throw new \InvalidArgumentException('Discord username is missing. Check your .env file.');
        }
    }

    public function sendMessage(string $message): void
    {
        $data = [
            'json' => [
                'content' => $message,
                'username' => $this->username,
            ]
        ];

        try {
            logInfo('Processing discord message.', $data);

            $response = $this->client->post($this->webhookUrl, $data);

            if ($response->getStatusCode() === 204) {
                logInfo('Discord webhook request succeeded with no content.');
                return;
            }

            $result = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            if ($response->getStatusCode() !== 204) {
                logInfo('Discord webhook request failed.', $result);
                return;
            }

            logInfo('Discord webhook request succeeded.', $result);

        } catch (GuzzleException $e) {
            logError('[Discord webhook]. Request failed with exception: ' . $e->getMessage());
        } catch (\JsonException $e) {
            logError('[Discord webhook]. Failed to decode JSON response: ' . $e->getMessage());
        } catch (\Exception $e) {
            logError('[Discord webhook]. An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
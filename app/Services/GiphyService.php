<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GiphyService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.giphy.com/v1/gifs/';
        $this->apiKey = env('GIPHY_API_KEY');
    }

    public function searchGifs($query, $limit = null, $offset = null)
    {
        $response = Http::get($this->baseUrl . 'search', [
            'api_key' => $this->apiKey,
            'q' => $query,
            'limit' => $limit,
            'offset' => $offset
        ]);

        return $response->json();
    }

    public function getGifById($id)
    {
        $response = Http::get($this->baseUrl . $id, [
            'api_key' => $this->apiKey
        ]);

        return $response->json();
    }

}

<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GiphyService;
use Illuminate\Support\Facades\Http;

class GiphyServiceTest extends TestCase
{
    protected $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new GiphyService();
    }

    public function testSearchGifsSuccess()
    {
        Http::fake([
            'https://api.giphy.com/v1/gifs/search*' => Http::response(['data' => []], 200),
        ]);

        $results = $this->service->searchGifs('cats');

        $this->assertIsArray($results);
        $this->assertArrayHasKey('data', $results);
    }

    public function testGetGifByIdSuccess()
    {
        Http::fake([
            'https://api.giphy.com/v1/gifs/123' => Http::response(['data' => []], 200),
        ]);

        $gif = $this->service->getGifById('123');

        $this->assertIsArray($gif);
        $this->assertArrayHasKey('data', $gif);
    }
}

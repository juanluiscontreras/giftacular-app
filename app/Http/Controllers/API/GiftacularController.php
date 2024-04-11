<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GiphyService;
use App\Services\InteractionLogService;
use App\Models\FavoriteGif;
use Illuminate\Validation\ValidationException;

class GiftacularController extends Controller
{
    protected $giphyService;
    protected $interactionLogService;

    public function __construct(GiphyService $giphyService, InteractionLogService $interactionLogService)
    {
        $this->middleware('auth:api');
        $this->giphyService = $giphyService;
        $this->interactionLogService = $interactionLogService;
    }

    public function searchGifs(Request $request)
    {
        try {
            $request->validate([
                'query' => 'required|string',
                'limit' => 'nullable|numeric',
                'offset' => 'nullable|numeric',
            ]);

            $results = $this->giphyService->searchGifs(
                $request->input('query'),
                $request->input('limit', 10),
                $request->input('offset', 0)
            );

            $this->logInteraction($request, $results);

            return response()->json($results, 200);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->validator->errors()], 422);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to search GIFs'], 500);
        }
    }

    public function getGifById(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
            ]);

            $gif = $this->giphyService->getGifById($request->id);

            $this->logInteraction($request, $gif);

            return response()->json($gif, 200);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->validator->errors()], 422);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to retrieve GIF by ID'], 500);
        }
    }

    public function saveFavoriteGif(Request $request)
    {
        try {
            $request->validate([
                'gif_id' => 'required|numeric',
                'alias' => 'required|string',
                'user_id' => 'exists:users,id',
            ]);

            $favoriteGif = FavoriteGif::create([
                'gif_id' => $request->input('gif_id'),
                'alias' => $request->input('alias'),
                'user_id' => $request->input('user_id'),
            ]);

            $this->logInteraction($request, $favoriteGif);

            return response()->json(['message' => 'Favorite GIF saved successfully'], 201);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->validator->errors()], 422);
        } catch (\Exception $exception) {
            // Return an error response with HTTP status code 500 (Internal Server Error) for other exceptions
            return response()->json(['error' => 'Failed to save favorite GIF'], 500);
        }
    }

    private function logInteraction(Request $request, $results)
    {
        $truncatedResponse = substr(json_encode($results), 0, 255); // Maximum length allowed in the interaction_log table

        $this->interactionLogService->logInteraction(
            $request->user()->id,
            'searchGifs',
            json_encode($request->all()),
            200,
            $truncatedResponse,
            $request->ip()
        );
    }
}

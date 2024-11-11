<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function complete(Request $request)
    {
        $prompt = $request->input('prompt');
        $completion = $this->openAIService->getCompletion($prompt);

        return response()->json(['completion' => $completion]);
    }
}

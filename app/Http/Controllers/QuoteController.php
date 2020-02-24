<?php

namespace App\Http\Controllers;

use App\Services\QuoteService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Quote Service
     * @var QuoteService
     */
    private $service;

    /**
     * QuoteController constructor.
     * @param QuoteService $quoteService
     */
    public function __construct(QuoteService $quoteService)
    {
        $this->service = $quoteService;
    }

    /**
     * Return a random quote.
     * @return \Illuminate\Http\JsonResponse
     */
    public function retrieveQuote(): JsonResponse
    {
        // We'll create a simple JSON body
        $response = [
            'quote' => $this->service->getRandomQuote(),
        ];

        // We'll add some custom headers to our response (so we can see what Kubernetes pod the request was served by and what time)
        $headers = [
            'X-Handled-By' => gethostname(),
            'X-Served-At' => Carbon::now()->toDateTimeString(),
        ];

        return response()->json($response, 200, $headers);
    }
}

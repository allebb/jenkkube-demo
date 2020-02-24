<?php

namespace Tests\Unit;

use App\Services\QuoteService;
use PHPUnit\Framework\TestCase;

class QuoteServiceTest extends TestCase
{

    protected $quoteService;

    public function setUp(): void
    {
        parent::setUp();
        $this->quoteService = new QuoteService();
    }

    public function testQuoteServiceHasQuotes()
    {
        $this->assertGreaterThan(0, $this->quoteService->getAllQuotes()->count());
    }

    public function testWeCanRetrieveASingleQuote()
    {
        $this->assertIsString($this->quoteService->getRandomQuote());
    }

    public function testAReturnedQuoteIsFromOurQuoteService()
    {
        $quote = $this->quoteService->getRandomQuote();
        $this->assertTrue($this->quoteService->getAllQuotes()->contains($quote));
    }
}

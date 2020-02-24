<?php


namespace Tests\Feature;

use Tests\TestCase;

class QuoteApiTest extends TestCase
{

    public function testApiEndpointCanBeReached()
    {
        $response = $this->get(TestCase::API_QUOTE_ENDPOINT);
        $response->assertStatus(200);
    }

    public function testApiReturnsAQuoteResponseFromOurService()
    {
        $response = $this->get(TestCase::API_QUOTE_ENDPOINT);
        $response->assertJsonStructure(['quote']);
    }

    public function testApiQuoteReturnsExpectedCustomHeaders()
    {
        $response = $this->get(TestCase::API_QUOTE_ENDPOINT);

        $this->assertTrue($response->headers->has('X-Handled-By'));
        $this->assertTrue($response->headers->has('X-Served-At'));

    }
}

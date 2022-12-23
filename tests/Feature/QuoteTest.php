<?php

namespace Tests\Unit;

use App\Models\Quote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateQuote()
    {
        $quote = Quote::create([
            'content' => 'The world is my ashtray.',
        ]);

        $this->assertEquals('The world is my ashtray.', $quote->content);
    }

    public function testCanFindQuoteById()
    {
        $quote = Quote::create([
            'content' => 'The world is my ashtray.',
        ]);

        $foundQuote = Quote::find($quote->id);

        $this->assertEquals($quote->id, $foundQuote->id);
    }
}

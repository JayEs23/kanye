<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Quote extends Model
{
    public function getRandomQuotes()
    {
        $client = new Client();
        $response = $client->get('https://api.kanye.rest/');
        $quotes = json_decode($response->getBody(), true);

        foreach ($quotes as $quote) {
            Quote::create([
                'text' => $quote['quote'],
                'author' => 'Kanye West',
            ]);
        }
    }
}

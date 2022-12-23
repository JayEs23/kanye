<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Quote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
    ];
    public function getRandomQuotes()
    {
        $client = new Client();
        $response = $client->get('https://api.kanye.rest/');
        $quotes = json_decode($response->getBody(), true);

        foreach ($quotes as $quote) {
            Quote::create([
                'content' => $quote['quote'],
            ]);
        }
    }
}

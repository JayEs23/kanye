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

    public static function createQuotes()
    {
        $client = new Client();
        for ($i = 0; $i < 100; $i++) {
            $response = $client->get('https://api.kanye.rest/');
            $quote = json_decode($response->getBody(), true);

            Quote::create([
                'content' => $quote['quote'],
            ]);
        }
    }
    public function getQuotes()
    {
        $quotes = Quote::inRandomOrder()->take(5)->get();
        return response()->json($quotes);
    }
}

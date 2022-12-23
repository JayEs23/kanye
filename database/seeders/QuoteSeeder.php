<?php

namespace Database\Seeders;

use App\Models\Quote;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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

}

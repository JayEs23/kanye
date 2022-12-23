<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function getRandomQuotes()
    {
        $quotes = Quote::inRandomOrder()->take(5)->get();
        return response()->json($quotes);
    }
}

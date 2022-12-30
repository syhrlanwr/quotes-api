<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return response()->json($quotes->random());
    }

    public function store(Request $request)
    {
        $quote = Quote::create($request->all());
        return response()->json($quote);
    }

    public function show($id)
    {
        $quote = Quote::find($id);
        return response()->json($quote);
    }

    public function update(Request $request, $id)
    {
        $quote = Quote::find($id);
        if ($quote->password == $request->password) {
            $quote->quote = $request->quote;
            $quote->author = $request->author;
            $quote->save();
            return response()->json($quote);
        } else {
            return response()->json(['error' => 'Wrong password']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $quote = Quote::where('id', $id)->first();
        if ($quote->password == $request->password) {
            $quote->delete();
            return response()->json(['success' => 'Quote deleted']);
        } else {
            return response()->json(['error' => 'Wrong password']);
        }
    }

    public function search(Request $request)
    {
        $quotes = Quote::where('quote', 'like', '%' . $request->search . '%')->get();
        return response()->json($quotes);
    }

    public function acak()
    {
        $quotes = Quote::all();
        $randomQuote = $quotes->random();
        return response()->json($randomQuote);
    }

    
}

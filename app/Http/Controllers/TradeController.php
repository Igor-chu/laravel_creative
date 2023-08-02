<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::all();

        return view('trades.index', compact('trades'));
    }

    public function create()
    {

        return view('trades.create');

    }

    public function store()
    {

        $validated = request()->validate([

            'ticker' => ['required', 'string', 'max:50'],

            'price' => ['required', 'string', 'max:50'],

            'description' => ['nullable', 'string', 'max:1000'],

        ]);

        Trade::create($validated);

        return redirect()->route('trade.index');

    }

    public function show(Trade $trade)
    {

        $trade = Trade::query()->find($trade->id);

        return view('trades.show', compact('trade'));

    }

    public function edit(Trade $trade)
    {

        return view('trades.edit', compact('trade'));

    }

    public function update(Trade $trade)
    {

        $validated = request()->validate([

            'ticker' => ['required', 'string', 'max:50'],

            'price' => ['required', 'string', 'max:50'],

            'description' => ['nullable', 'string', 'max:1000'],

        ]);


        $trade->update($validated);

        return redirect()->route('trade.show', $trade->id);

    }

    public function destroy(Trade $trade)
    {

        $trade->delete();

        return redirect()->route('trade.index');

    }
}

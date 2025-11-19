<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidRequest;

use App\Models\Advert;
use App\Models\Bid;

class BidController extends Controller
{
    public function store(StoreBidRequest $request)
    {
        // No need to make superfluous variables
        Bid::create($request->validated());

        // TODO: overweeg de find() method ipv where + first
        $advert = Advert::where('id', $request->advert_id)->first();

        return redirect()->route('adverts.page', $advert);
    }
}

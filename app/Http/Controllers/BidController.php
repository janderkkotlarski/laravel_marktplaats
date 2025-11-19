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

        // find(x) is easier and more direct than where('x', x)->first()
        $advert = Advert::find($request->advert_id);
        
        return redirect()->route('adverts.page', $advert);
    }
}

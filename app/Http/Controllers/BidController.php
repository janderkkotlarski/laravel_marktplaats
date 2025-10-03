<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBidRequest;

use App\Http\Controllers\AdvertController;

use App\Models\Advert;
use App\Models\Bid;

class BidController extends Controller
{
    public function store(StoreBidRequest $request)
    {
        $passed = $request->validated();

        $advert = Advert::where('id', $request->advert_id)->first();

        return redirect()->route('adverts.page', $advert);
    }
}

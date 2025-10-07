<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBidRequest;

use App\Http\Controllers\AdvertController;

use App\Models\Advert;
use App\Models\Bid;
use Symfony\Component\VarDumper\VarDumper;

class BidController extends Controller
{
    public function store(StoreBidRequest $request)
    {
        // var_dump($request->user_id);

        dd(0);

        // $passed = Bid::create($request->validated());

        $advert = Advert::where('id', $request->advert_id)->first();

        var_dump($advert->user_id);

        dd(0);

        return redirect()->route('adverts.page', $advert);
    }
}

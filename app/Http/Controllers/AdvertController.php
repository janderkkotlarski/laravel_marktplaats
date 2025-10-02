<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;

use App\Models\Advert;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $adverts = Advert::query();

        $adverts->orderBy('created_at', 'desc');

        $adverts = $adverts->get();

        return view('adverts.overview')->with(compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $user = Auth::user();

        return view('adverts.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertRequest $request)
    {
        $advert = Advert::create($request->validated());

        return redirect()->route('user.overview');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        $user = Auth::user();

        return view('adverts.edit')->with(compact(['user', 'advert']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertRequest $request, Advert $advert)
    {
        $updated = new Advert($request->validated());

        $advert->title = $updated->title;
        $advert->description = $updated->description;
        $advert->price = $updated->price;
        $advert->premium = $updated->premium;

        $advert->save();

        return redirect()->route('user.overview');
    }

    public function delete(Advert $advert)
    {
        return view('adverts.delete')->with(compact('advert'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        $advert->delete();

        return redirect()->route('user.overview');
    }
}

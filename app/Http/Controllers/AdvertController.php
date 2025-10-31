<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;

use App\Models\Advert;
use App\Models\Category;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $adverts = Advert::query();

        $adverts->orderBy('promoted', 'desc')->orderBy('promoted_at', 'desc')->orderBy('created_at', 'desc');

        $categories = Category::orderBy('id', 'asc')->get();

        if ($request->category_id != 0) {
            if ($request->category_id > 0) {
                // Add a category based query part 
                $adverts->orderBy('created_at', 'desc')->whereHas('categories', function($query) use($request) {
                    $query->where('categories.id', $request->category_id);
                });
            } else {
                // Selection of adverts without categories
                $adverts->doesntHave('categories');
            }
        }

        if (isset($request->search_term)) {
            $adverts->orderBy('created_at', 'desc')->where('title', 'LIKE', "%{$request->search_term}%")
            ->orwhere('description', 'LIKE', "%{$request->search_term}%");            
        }

        // paginate() is a get() function
        $adverts = $adverts->paginate(10);

        return view('adverts.overview')->with(compact(['adverts', 'categories', 'request']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $user = Auth::user();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('adverts.create')->with(compact(['user', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertRequest $request)
    {
        $advert = Advert::create($request->validated());        
        $advert->categories()->sync($request->category_id);

        return redirect()->route('user.overview');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {
        return view('adverts.show')->with(compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        $user = Auth::user();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('adverts.edit')->with(compact(['user', 'advert', 'categories']));
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
        $advert->promoted = $updated->promoted;
        $advert->promoted_at = $updated->promoted_at;

        $advert->save();

        $advert->categories()->sync($request->category_id);

        return redirect()->route('user.overview');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function promote(Advert $advert)
    {
        $user = Auth::user();

        return view('adverts.promote')->with(compact(['user', 'advert']));
    }

     public function promoted(Advert $advert)
    {
        // $user = Auth::user();

        $advert->promoted = 1;

        $advert->promoted_at = now();

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

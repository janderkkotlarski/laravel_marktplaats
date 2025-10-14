<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered; //handles the import

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Advert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = Advert::query();

        $adverts->orderBy('created_at', 'desc')->where('user_id', Auth::id());

        // paginate() is a get() function
        $adverts = $adverts->paginate(10);

        return view('user.overview', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user)); // Trigger email verification
        
        return view('user.notify')->with(compact('user'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

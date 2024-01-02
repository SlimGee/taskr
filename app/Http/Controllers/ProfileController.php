<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(): Renderable
    {
        return view('app.profile.show', [
            'user' => Auth::user(),
        ]);
    }
}

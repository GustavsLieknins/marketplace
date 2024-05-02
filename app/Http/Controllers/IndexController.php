<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


use App\Models\Listings;
use App\Models\User;

class IndexController extends Controller
{
    public function index(Request $request) {
        $listings = Listings::all();
        $phone = User::all();


        return view("index", ["listings" => $listings, "phone" => $phone]);
    }
}

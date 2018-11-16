<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Car;
use App\Models\Client;
use App\Models\Permission;
use App\Models\Profile;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Location $location, User $user, Client $client, Car $car, Permission $permission, Profile $profile)
    {
        $location = $location->count(); 
        $client = $client->count();
        $car = $car->count();
        $permission = $permission->count();
        $profile = $profile->count();
        $userName = auth()->user()->name;
        $userContador = $user->count();
        return view('home', compact('userContador', 'userName','location', 'client', 'car', 'profile', 'permission'));
    }
}

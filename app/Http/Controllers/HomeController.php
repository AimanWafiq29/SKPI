<?php

namespace App\Http\Controllers;

use App\Models\BuktiPrestasi;
use App\Models\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $buktis = BuktiPrestasi::where('user_id', auth()->user()->id)->get();
        return view('page.user.home',compact('user', 'buktis'));
    }
   
    public function admin()
    {
        $users = User::all();
        return view('page.admin.home',compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->type == 'admin')
        {
            return redirect()->route('admin.home');
        }
        else if(Auth::user()->type == 'employee')
        {
            return redirect()->route('Employee.customerAssignedToMe');
        }
        else
        {
            return redirect()->route('customer.InfoPage');
        }
    }
    public function customerInfoPage(){
        $user = User::findOrFail(Auth::user()->id);
        return view('customer.customerInfoPage',compact('user'));
    }
}

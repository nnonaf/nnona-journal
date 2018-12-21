<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalType;
use App\Customer;

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
    public function index()
    {
        $journal = JournalType::all();
        $customer = Customer::all();

        $data = [];
        $data["journals"] = $journal;
        $data["customers"] = $customer;
        
        return view('home')->with(['data' => $data]);
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      //getting journal according to post request 

      

           return response()->json($_POST);
       
    }
}

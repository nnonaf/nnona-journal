<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalType;
use App\Customer;
use App\Journals;
use Illuminate\Support\Facades\DB;


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
        
        return view('home')->with(['data' => $data,
        'title' =>"Journal title"
        
        ]);
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
       
      //getting journal according to post request 

      if(!empty($_POST["customer"]) && !empty($_POST["journalType"])){
         
        return response()->json($this->bySpecification($_POST["customer"],$_POST["journalType"]));

      }




      if(!empty($_POST["journalType"])){
        return response()->json($this->byJournalType($_POST["journalType"]));

      }

      if(!empty($_POST["customer"])){
        return response()->json($this->byCustomer($_POST["customer"]));

      }




     
       
    }

    private function byCustomer($customer){
        return DB::table('transactions')
      ->join('customer', 'transactions.customer_id', '=', 'customer.id')
      ->join('journalType', 'transactions.journalType_id', '=', 'journalType.id')
       ->select('customer.customerName', 'journalType.name','transactions.particular','transactions.amount')
      ->where([

        ['customer_id', '=',$customer],
       
      ])
      ->orderBy('transactions.id', 'desc')
      
      ->get()->toArray();


    }
    private function byJournalType($journalType){

        return DB::table('transactions')
      ->join('customer', 'transactions.customer_id', '=', 'customer.id')
      ->join('journalType', 'transactions.journalType_id', '=', 'journalType.id')
       ->select('customer.customerName', 'journalType.name','transactions.particular','transactions.amount')
      ->where([

      
        ['journalType_id', '=', $journalType]
      ])
      ->orderBy('transactions.id', 'desc')
      
      ->get()->toArray();

        
    }
    private function bySpecification($customer,$journalType){

        
      return DB::table('transactions')
      ->join('customer', 'transactions.customer_id', '=', 'customer.id')
      ->join('journalType', 'transactions.journalType_id', '=', 'journalType.id')
       ->select('customer.customerName', 'journalType.name','transactions.particular','transactions.amount')
      ->where([

        ['customer_id', '=',$customer],
        ['journalType_id', '=', $journalType]
      ])
      ->orderBy('transactions.id', 'desc')
      ->get()->toArray();

    }
}



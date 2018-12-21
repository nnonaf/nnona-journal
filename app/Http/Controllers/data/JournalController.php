<?php

namespace App\Http\Controllers\data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JournalType;
use App\Customer;
use App\Journals;


class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journal = JournalType::all();
        return view('journal')->with(['journal' => $journal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $customer = $_POST["customer"];
        $journalType = $_POST["journalType"];

        if(empty( $customer) || empty( $journalType)){
           
            header('Location: ' .url('/journal?error=1'));
            exit;
        }

        // SAVING OF CUSTOMER OR GENERATING CUSTOMER ID
         
        $newCustomer =  new Customer;
        $checkCustomer = Customer::where('customerName',strtolower($customer))->get();
        if(count($checkCustomer) === 0){
             
            $newCustomer->customerName = strtolower($customer);
            $newCustomer->user_id = auth()->user()->id;
            $checkCustomer =  $newCustomer->save();
        }
          
       

        // getting customer's id
         
        if(count($checkCustomer) == 1){
            $savedCustomer = Customer::where('customerName',strtolower($customer))->get();
        }

        foreach ($savedCustomer as $customer) {
            $customer =  $customer->id;
        }
         

        //saving the transaction
          $name = 1;
       
        if(isset($_POST["count"])){
            for($i = 0 ; $i  <  $_POST["count"]; ++$i){
                $name = $name +  $i;   
                $goods = "goods_".$name;
                $amount = "amount_".$name;
                // saving only none empty fileds
                              
                if(!empty($_POST[$goods]) && !empty($_POST[$amount])){
                    $this->saveJournal(auth()->user()->id,$customer,$_POST[$goods],$journalType,$_POST[$amount]);
                }

            }
           
      
        }else{

            if(!empty($_POST["goods_1"]) && !empty($_POST["amount_1"])){
              
               $see = $this->saveJournal(auth()->user()->id,$customer,$_POST["goods_1"],$journalType,$_POST["amount_1"]);
                             
            }
           
  

        }

        return back()->withInput();
   
        
    }

    private function saveJournal($user_id,$customer,$particular,$journalType, $amount){

           $journal = new Journals;
           $journal->user_id = $user_id;
           $journal->customer_id = $customer;
           $journal->particular = $particular;
           $journal->journalType_id = $journalType;
           $journal->amount = $amount;

           return $journal->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

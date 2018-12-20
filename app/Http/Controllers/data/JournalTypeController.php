<?php

namespace App\Http\Controllers\data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JournalType;


class JournalTypeController extends Controller


{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $journal = JournalType::all();
        return view('settings')->with(['journal' => $journal]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTypeOfJournal = $request->message;
        if($newTypeOfJournal === null){
            return response()->json(false);

        }

        //saving the new journal 

        $newJournal = new JournalType;

        //checking if name is already exiting  before saving
        $checkJournal = JournalType::where('name',strtolower($request->message))->get();
     

        if(count($checkJournal) === 0){
            $newJournal->name = strtolower($request->message);
            $newJournal->user_id = auth()->user()->id;
            $save =  $newJournal->save();
        }
           return response()->json(true);
       
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
        $deleteJournal = $request->message;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $journal = JournalType::find($id);
        $journal->delete();
        return response()->json(true);
    }
}

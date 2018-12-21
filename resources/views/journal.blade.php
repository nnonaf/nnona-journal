@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Journal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <form  method="POST" action="{{ url('journal') }}">
                    @csrf
                        <div class="container">
                            <div id="journalForm"></div>
                            <div class="row">
                                <div class="col-8">
                                
                                <input type="text"  name="customer" class="form-control" placeholder="customer name" required>
                                    <label for="inputState"> <small>Customer's Name</small></label>
                                </div>
                                <div class="col-4">
                                
                                    
                                    <select id="inputState"  name="journalType" class="form-control" required>
                                        <option></option>
                                        @if(count($journal) > 0)


                                                @for($i = 0; $i < count($journal); ++$i )
                                                    <option  value="{{$journal[$i]->id}}">{{ucwords($journal[$i]->name)}}</option>

                                                @endfor
                                            @else

                                            @endif
                                    </select>
                                    <label for="inputState"><small>Select Journla</small></label>
                                    
                                
                                </div>
                            </div>
                            <hr>
                            <hr>
                            
                            <div class="row" id="addNew">
                                <div class="col-8">
                                
                                    <input type="text" name="goods_1" class="form-control" placeholder="" required>
                                    <label for="inputState"> <small>Goods</small></label>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="amount_1" class="form-control" placeholder="N20000" required>
                                    <label for="inputState"> <small>Amount</small></label>
                                    
                                                                    
                                </div>
                                  {{--  <div class="col-8">
                                
                                    <input type="text"  name="goods_2" class="form-control" placeholder="">
                                    <label for="inputState"> <small>Goods</small></label>
                                </div>
                                <div class="col-4">
                                    <input type="number"  name="amount_2" class="form-control" placeholder="N20000">
                                    <label for="inputState"> <small>Amount</small></label>
                                    
                                                                    
                                </div>  --}}
                                 {{--  <div id="addNew" ></div>  --}}
                            </div>
                           
                            
                          <hr>
                          <div class="row">
                                <div class="col-10">
                                   <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                </div>
                                <div class="col-2">
                                    <button type="button"  onclick="addNewSlip()" class="btn btn-secondary btn-sm">Add</button>
                                </div>
                           </div>

                                    
                         
                        </div>
                     </form>   

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

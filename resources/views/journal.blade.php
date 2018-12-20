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
                   <form>
                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                
                                <input type="text" class="form-control" placeholder="First name">
                                    <label for="inputState"> <small>Customer's Name</small></label>
                                </div>
                                <div class="col-4">
                                
                                    
                                    <select id="inputState" class="form-control">
                                        <option></option>
                                        @if(count($journal) > 0)


                                                @for($i = 0; $i < count($journal); ++$i )
                                                    <option  value="{{ucwords($journal[$i]->name)}}">{{ucwords($journal[$i]->name)}}</option>

                                                @endfor
                                            @else

                                            @endif
                                    </select>
                                    <label for="inputState"><small>Select Journla</small></label>
                                    
                                
                                </div>
                            </div>
                            <hr>
                            <hr>
                            
                            <div class="row">
                                <div class="col-8">
                                
                                    <input type="text" class="form-control" placeholder="">
                                    <label for="inputState"> <small>Goods</small></label>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="N20000">
                                    <label for="inputState"> <small>Amount</small></label>
                                    
                                                                    
                                </div>
                            </div>





                          <hr>
                          <button type="button" class="btn btn-secondary btn-sm">Submit</button>
                         




                        </div>
                     </form>   

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <div class="container">
                            <form   id="idForm">
                             {{--  @csrf  --}}
                            <div class="row">
                                <div class="col-6">
                                 <select id="inputState"  name="journalType" class="form-control">
                                        <option></option>
                                         @if(count($data["journals"]) > 0)


                                                @for($i = 0; $i < count($data["journals"]); ++$i )
                                                    <option  value="{{$data['journals'][$i]->id}}">{{ucwords($data["journals"][$i]->name)}}</option>

                                                @endfor
                                            @else

                                            @endif
                                    </select>
                                    <label for="inputState"> <small>Customer's Name</small></label>
                                </div>
                                <div class="col-6">
                                
                                    
                                    <select id="inputState"  name="customer" class="form-control">
                                        <option></option>
                                        @if(count($data["journals"]) > 0)


                                                @for($i = 0; $i < count($data["customers"]); ++$i )
                                                    <option  value="{{$data['customers'][$i]->id}}">{{ucwords($data["customers"][$i]->name)}}</option>

                                                @endfor
                                            @else

                                            @endif
                                       
                                    </select>
                                    <label for="inputState"><small>Select Journla</small></label>
                                    
                                
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-10">
                                   {{--  <button type="submit" class="btn btn-outline-secondary">Submit</button>  --}}
                                </div>
                                <div class="col-2">
                                    <button type="submit"  class="btn btn-secondary btn-sm">Get</button>
                                </div>
                           </div>

                          </form> 

                            <hr>
                            </div>

                   <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Particulars</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                         <td>the Bird</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                         <td>the Bird</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                         <td>the Bird</td>
                        </tr>
                    </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

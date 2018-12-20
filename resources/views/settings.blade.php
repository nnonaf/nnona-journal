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

                    <div id="myDIV" class="header">
                    <h3>Add new Journal</h3>
                    <input type="text" id="myInput" placeholder="Add a new journal">
                    <span onclick="newElement()" class="addBtn">Add</span>
                    </div>

                    <ul class="myul" id="myUL">
                        @if(count($journal) > 0)


                            @for($i = 0; $i < count($journal); ++$i )
                                    <li class="delete"  onclick="deletJournal({{$journal[$i]->id}})">{{ucwords($journal[$i]->name)}}</li>
                                

                            @endfor
                        @else

                        @endif
                   
                    </ul>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

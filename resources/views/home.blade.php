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

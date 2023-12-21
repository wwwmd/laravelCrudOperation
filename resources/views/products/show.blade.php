@extends('layouts.app')

 @section('main')
 <div class="container">
                    
    <div class="row justify-content-center">
    <div class="col-md-6 mt-4">
    <div class="card p-3 bg-secondary m-auto" style="width:400px;">
                        <div class="d-flex justify-content-between">
                                            <div class="h2 text-light pb-3">Employee Details :</div>
                                            <div>
                                                <a href="/" class="btn btn-primary">Back</a>
                                            </div>
                                        </div>
 <h4 class="d-inline text-light">Name : <b>{{$product->name}}</b></h4>
 <h4 class="d-inline text-light">Email : <b>{{$product->email}}</b></h4>
 <h4 class="d-inline text-light">Address : <b>{{$product->description}}</b></h4>
 <img src="/products/{{$product->image}}" alt="show image" width="100%" class="rounded">

</div>

</div>

</div>
     </div>
 @endsection
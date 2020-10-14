@extends('layouts.showallproduct.mainlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($products as $product)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="text-align: center; vertical-align:center;">
                                <img style="width:50%" src="{{ asset('/images/backend_images/products/large/'.$product->image)}}">
                                <h4>{{$product->product_name}}</h4>
                                <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-default get">View</a>
                                </td>
                                
                            </tr>
                            <div id="myModal{{$product->id}}" class="modal hide">
                                <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h2 style="text-align: center;">{{$product->product_name}} Full Details</h2>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                  <p>Product ID: &nbsp&nbsp  {{$product->id}} </p>
                                  <p>Category Name: &nbsp&nbsp  {{$product->category_name}} </p>
                                  {{-- <p>Product Name: &nbsp&nbsp  {{$product->product_name}} </p> --}}
                                  <p>Product Code: &nbsp&nbsp  {{$product->product_code}} </p>
                                  <p>Product Color: &nbsp&nbsp  {{$product->product_color}} </p>
                                  <p>Product Price: &nbsp&nbsp  {{$product->price}} </p>
                                  <p>Product Description: &nbsp&nbsp  {{$product->description}} </p>
                                </div>
                            </div>
                        </tbody>
                    </table>
                     <hr>
                    @endforeach
                    

                   
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
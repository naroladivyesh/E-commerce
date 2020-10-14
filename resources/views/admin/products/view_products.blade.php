@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
        <h1>View Products</h1>
        @if (Session::has('message_success'))         
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <strong>{{  session('message_success')   }}</strong>
                    </div>
        @endif
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Productss</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Category Name</th>                    
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Price</th>
                    <th>Image</th>                     
                    <th>ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                            <tr class="gradeU">
                                
                                <td>{{$product->id}}</td>
                                <td>{{$product->category_id}}</td> 
                                <td>{{$product->category_name}}</td>                                                           
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{$product->product_color}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    @if (!empty($product->image))
                                    <img src="{{ asset('/images/backend_images/products/large/'.$product->image)}}" style="width:60px;">
                                    @endif
                                </td>
                                <td class="center">
                                  <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                                  |<a href="{{ url ('/admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                  |<a href="{{ url ('/admin/add-attributes/'.$product->id)}}" class="btn btn-success btn-mini">Add</a>
                                  |<a rel="{{$product->id}}" rel1="delete-product"  href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
                                <p>Product Name: &nbsp&nbsp  {{$product->product_name}} </p>
                                <p>Product Code: &nbsp&nbsp  {{$product->product_code}} </p>
                                <p>Product Color: &nbsp&nbsp  {{$product->product_color}} </p>
                                <p>Product Price: &nbsp&nbsp  {{$product->price}} </p>
                                <p>Product Description: &nbsp&nbsp  {{$product->description}} </p>
                              </div>
                            </div>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  

@endsection
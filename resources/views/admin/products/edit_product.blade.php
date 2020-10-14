@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Update Products</a> </div>
      <h1>Update Products</h1>
        @if (Session::has('message_error'))         
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong>{{  session('message_error')   }}</strong>
            </div>
        @endif     
        @if (Session::has('message_success'))         
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong>{{  session('message_success')   }}</strong>
            </div>
        @endif
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">  
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit Product</h5>
               
            </div>
            <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url ('/admin/edit-product/'.$productDetails->id)}}" name="edit_product" id="edit_product" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="control-group">
                    <label class="control-label">Under Category</label>
                    {{-- <div class="controls">
                      <select name="category_id" id="category_id" style="width: 220px" >
                        @foreach ($categories_dropdown as $catdown)
                          <option value="{{ $productDetails->category_id }}" @if ($productDetails->category_id == $catdown->id) selected @endif>{{ $catdown->name }}</option>
                        @endforeach  
                      </select>
                    </div> --}}
                    <div class="controls">
                      <select name="category_id" id="category_id" style="width: 220px">
                        <?php echo $categories_dropdown; ?>
                      </select>
                    </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">Product Name</label>
                  <div class="controls">
                    <input type="text" name="product_name" id="product_name" value="{{ $productDetails->product_name}}" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Product Code</label>
                  <div class="controls">
                    <input type="text" name="product_code" id="product_code" value="{{ $productDetails->product_code}}" >
                  </div>
              </div>
                <div class="control-group">
                    <label class="control-label">Product Color</label>
                    <div class="controls">
                      <input type="text" name="product_color" id="product_color" value="{{ $productDetails->product_color}}" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                      <textarea name="description" id="discription" > {{ $productDetails->description}} </textarea>
                    </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Price</label>
                  <div class="controls">
                    <input type="text" name="price" id="price" value="{{ $productDetails->price}}" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Product Image</label>
                  <div class="controls">
                    <input type="file" name="image" id="image"  >
                    <input type="hidden"name="current_image" value="{{ $productDetails->image}}">
                    @if (!empty($productDetails->image))
                    <img src="{{asset('/images/backend_images/products/small/'.$productDetails->image)}}" alt="Not Available" style="width: 40px;"> | <a href="{{url('/admin/delete-product-image/'.$productDetails->id)}}">Delete</a>
                    @endif
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Edit Product" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
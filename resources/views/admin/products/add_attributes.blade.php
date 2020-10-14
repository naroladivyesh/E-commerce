@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Products Attributes</a> </div>
        <h1>Add Products Attributes</h1>
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
                <h5>Add Product Attributes</h5>
                
                </div>
                <div class="widget-content nopadding">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url ('/admin/add-attributes/'.$productDetails->id)}}" name="add_attribute" id="add_attribute" >
                    {{ csrf_field() }}
                   
                    <input type="hidden" name="product_id" value="{{$productDetails->id}}">
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <label class="control-label"><strong>{{ $productDetails->product_name}}</strong></label>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Code</label>
                        <label class="control-label"><strong>{{ $productDetails->product_code}}</strong></label>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <label class="control-label"><strong>{{ $productDetails->product_color}}</strong></label>
                    </div>
                   
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="field_wrapper">
                            <div class="add-attributes">
                                
                                <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px; " required/>
                                <input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px; " required/>
                                <input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px; " required/>
                                <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px; " required/>
                                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{url('/images/backend_images/add.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                    <input type="submit" value="Add Attributes" class="btn btn-success">
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>

        {{-- ///////////*****************************************************************************************************88888////////////////////////
            ghdgfhgfhd.////////////////
            ////////////////////////////////
            ///////////////////////////////////
            ////////////////////////////////////////
            ///////////////////////////////////////////////
            ///////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////
              
            
            --}}
        <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>View Attributes</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>Attributes ID</th>
                        <th>SKU</th>
                        <th>Size</th>                    
                        <th>Price</th>
                        <th>Stock</th>
                        <th>ACTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($productDetails->attributes as $attribute)
                                <tr class="gradeU">
                                    
                                    <td>{{$attribute->id}}</td>
                                    <td>{{$attribute->sku}}</td> 
                                    <td>{{$attribute->size}}</td>                                                           
                                    <td>{{$attribute->price}}</td>
                                    <td>{{$attribute->stock}}</td>
                                    
                                    <td class="center">
                                      <a rel="{{$attribute->id}}" rel1="delete-attributes"  href="javascript:" class="btn btn-danger btn-mini deleteAttribute">Delete</a>
                                    </td>
                                </tr>
                                
                                  
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
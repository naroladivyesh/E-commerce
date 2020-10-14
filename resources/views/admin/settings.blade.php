@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Settings</a> <a href="#" class="current">Validation</a> </div>
            <h1>Admin Setting</h1>
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
        {{-- <div class="row-fluid">
            <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Form validation</h5>
                </div>
                <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                    <label class="control-label">Your Name</label>
                    <div class="controls">
                        <input type="text" name="required" id="required">
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Your Email</label>
                    <div class="controls">
                        <input type="text" name="email" id="email">
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Date (only Number)</label>
                    <div class="controls">
                        <input type="text" name="date" id="date">
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">URL (Start with http://)</label>
                    <div class="controls">
                        <input type="text" name="url" id="url">
                    </div>
                    </div>
                    <div class="form-actions">
                    <input type="submit" value="Validate" class="btn btn-success">
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div> --}}
        {{-- <div class="row-fluid">
            <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Numeric validation</h5>
                </div>
                <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="#" name="number_validate" id="number_validate" novalidate="novalidate">
                    <div class="control-group">
                    <label class="control-label">Minimal Salary</label>
                    <div class="controls">
                        <input type="text" name="min" id="min" />
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Maximum Salary</label>
                    <div class="controls">
                        <input type="text" name="max" id="max" />
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Only digit</label>
                    <div class="controls">
                        <input type="text" name="number" id="number" />
                    </div>
                    </div>
                    <div class="form-actions">
                    <input type="submit" value="Validate" class="btn btn-success">
                    </div>
                </form>
                </div>
            </div>
            </div> --}}
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Update Password</h5>
                        </div>
                        
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url ('/admin/update-pwd')}}" name="password_validate" id="password_validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Current Password</label>
                                <div class="controls">
                                <input type="password" name="current_pwd" id="current_pwd" />
                                <span class="chkPwd"></span>
                            </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New Password</label>
                                <div class="controls">
                                <input type="password" name="new_pwd" id="new_pwd" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm Password</label>
                                <div class="controls">
                                <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Update Password" class="btn btn-success">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       </div> 
    </div>
</div>
@endsection


@extends('apps.layout.master')
@section('title','Shop/Branch')
@section('breadcrumb','Shop/Branch')
@section('breadcrumb_page','Shop/Branch')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Shop/Branch Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('shop-update/'.$data->id)}}"
	                	@else
	                	action="{{url('shop-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Branch Name</td>
	                                 <td><input type="text" class="form-control" name="branch_name" @if(isset($data)) value="{{$data->branch_name}}" @endif autofocus></td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td><input type="text" name="email" @if(isset($data)) value="{{$data->email}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Mobile</td>
	                                 <td><input type="text" name="phone_no" @if(isset($data)) value="{{$data->phone_no}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Address</td>
	                                 <td><textarea class="form-control" rows="5" name="address" id="comment">@if(isset($data)) {{$data->address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(isset($data)) value="Update" @else value="Save" @endif >
	                                  <input type="reset" class="btn btn-default" value="Cancel">
	                                 </td>
	                               </tr>
	                            </tbody>
	                         </table>
	                      </div>
	                </div>
	                                  
	                
	                </form>
	            </fieldset>
	             </div>
	          </div>
	       </div>
	    </div>
	 </div>
	</div>
@endsection
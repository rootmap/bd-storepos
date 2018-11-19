@extends('apps.layout.master')
@section('title','Customer')
@section('breadcrumb','Customer')
@section('breadcrumb_page','Customer')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Customer Info :</legend>
	               <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('customer-update/'.$data->id)}}"
	                	@else
	                	action="{{url('customer-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                	@if(!empty($data))<input type="hidden" name="eximage" value="{{$data->photo}}"> @endif
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Name</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->name}}" @endif name="name" autofocus></td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td>
	                                 	@if(!empty($data))
	                                 	<input type="text" name="email" readonly="" value="{{$data->email}}" class="form-control">
	                                 	@else
	                                 	<input type="text" name="email" class="form-control">
	                                 	@endif
	                                 </td>
	                               </tr>
	                               <tr>
	                                 <td>Mobile</td>
	                                 <td><input type="text" @if(!empty($data)) value="{{$data->phone}}" @endif name="phone" class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Address</td>
	                                 <td><textarea class="form-control" name="address" rows="5" id="comment">@if(!empty($data)) {{$data->address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="update" @endif value="Save">
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
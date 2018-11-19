@extends('apps.layout.master')
@section('title','New Vendor')
@section('breadcrumb','New Vendor')
@section('breadcrumb_page','New Vendor')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">New Vendor Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	@if(!empty($data))
	                		action="{{url('vendor-update/'.$data->id)}}"
	                	@else
	                	action="{{url('vendor-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Name</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->name}}" @endif name="name" autofocus></td>
	                               </tr>
	                               <tr>
	                                 <td>Contact Person</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->contact_person}}" @endif name="contact_person"></td>
	                               </tr>
	                               <tr>
	                                 <td>Contact Number</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->contact_number}}" @endif name="contact_number"></td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->email}}" @endif name="email"></td>
	                               </tr>
	                               <tr>
	                                 <td>Website</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->website}}" @endif name="website"></td>
	                               </tr>
	                               <tr>
	                                 <td>Address</td>
	                                 <td><textarea class="form-control" rows="5" id="comment" name="address"> @if(!empty($data)) {{$data->address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" value="Save">
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
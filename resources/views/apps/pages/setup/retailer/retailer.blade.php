@extends('apps.layout.master')
@section('title','New Retailer')
@section('breadcrumb','New Retailer')
@section('breadcrumb_page','New Retailer')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">New Retailer Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	@if(!empty($data))
	                		action="{{url('retailer-update/'.$data->id)}}"
	                	@else
	                	action="{{url('retailer-add')}}"
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
	                                 <td>Retailer Id</td>
	                                 <td><input type="text" class="form-control" name="retailer_id" @if(!empty($data)) value="{{$data->retailer_id}}" @endif value="{{time()}}"></td>
	                               </tr>
	                               <tr>
	                                 <td>Contact Number</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->phone}}" @endif name="phone"></td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td><input type="email" class="form-control" @if(!empty($data)) value="{{$data->email}}" @endif name="email"></td>
	                               </tr>
	                               <tr>
	                                 <td>Present Address</td>
	                                 <td><textarea class="form-control" rows="5" id="comment" name="present_address"> @if(!empty($data)) {{$data->present_address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td>Permanent Address</td>
	                                 <td><textarea class="form-control" rows="5" id="comment" name="permanent_address"> @if(!empty($data)) {{$data->permanent_address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td>National No</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->national_id_no}}" @endif name="national_id_no"></td>
	                               </tr>
	                               <tr>
	                                 <td>Passport No</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data)) value="{{$data->passport_id_no}}" @endif name="passport_id_no"></td>
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
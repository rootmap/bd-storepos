@extends('apps.layout.master')
@section('title','Company Info')
@section('breadcrumb','Company')
@section('breadcrumb_page','Company')

@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Company Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('company_info-update/'.$data->id)}}"
	                	@else
	                	action="{{url('company_info-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                	@if(!empty($data))<input type="hidden" name="eximage" value="{{$data->logo}}"> @endif
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Store ID</td>
	                                 <td><input type="text" class="form-control" name="store_id" @if(!empty($data))value="{{$data->store_id}}" @endif readonly=""></td>
	                               </tr>
	                               <tr>
	                                 <td>Company Name</td>
	                                 <td><input type="text" class="form-control" name="company_name" @if(!empty($data))value="{{$data->company_name}}" @endif autofocus></td>
	                               </tr>
	                               <tr>
	                                 <td>Logo</td>
	                                 <td>
	                                 	@if(!empty($data))
	                                 		<img src="{{url('upload/setup/'.$data->logo)}}" width="200">
	                                 	@endif
	                                 	<input type="file" class="file-upload" name="logo"/>
            						 </td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data))value="{{$data->email}}" @endif name="email" ></td>
	                               </tr>
	                               <tr>
	                                 <td>Mobile</td>
	                                 <td><input type="text" class="form-control" @if(!empty($data))value="{{$data->phone_no}}" @endif name="phone_no"></td>
	                               </tr>
	                               <tr>
	                                 <td>Address</td>
	                                 <td><textarea class="form-control" rows="3" name="address" id="comment">@if(!empty($data)){{$data->address}} @endif</textarea></td>
	                               </tr>
	                               <tr>
	                                 <td>Vat No</td>
	                                 <td><input type="text" name="vat_no" @if(!empty($data))value="{{$data->vat_no}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Company Reg. No</td>
	                                 <td><input type="text" @if(!empty($data))value="{{$data->company_reg_no}}" @endif name="company_reg_no" class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(!empty($data))value="Update" @endif value="Save">
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
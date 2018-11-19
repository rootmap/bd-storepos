@extends('apps.layout.master')
@section('title','Home')
@section('breadcrumb','User')
@section('breadcrumb_page','User')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">User Info :</legend>
	               <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('user-update/'.$data->id)}}"
	                	@else
	                	action="{{url('user-add')}}"
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
	                                 <td>Photo</td>
	                                 <td>
	                                 	@if(!empty($data))
	                                 		<img src="{{url('upload/setup/user/'.$data->photo)}}" width="100">
	                                 	@endif
	                                 	<input type="file" name="photo" class="file-upload"/>
            						 </td>
	                               </tr>
	                               <tr>
	                                 <td>User Role</td>
	                                 <td>
	                                 	@if(!empty($data))
	                                 		@if($data->user_type =='Cashier')
	                                 			<select class="form-control" name="user_type">
		                                          <option value="Cashier">Cashier</option>
		                                          <option value="Branch Admin">Branch Admin</option>
		                                          <option value="Shop Admin">Shop Admin</option>
		                                       </select>
	                                 		@elseif($data->user_type =='Branch Admin')
	                                 			<select class="form-control" name="user_type">
		                                          <option value="Branch Admin">Branch Admin</option>
		                                          <option value="Cashier">Cashier</option>
		                                          <option value="Shop Admin">Shop Admin</option>
		                                       </select>
	                                 		@else
	                                 			<select class="form-control" name="user_type">
		                                          <option value="Shop Admin">Shop Admin</option>
		                                          <option value="Branch Admin">Branch Admin</option>
		                                          <option value="Cashier">Cashier</option>
		                                       </select>
	                                 		@endif
	                                 	@else
	                                 	<select class="form-control" name="user_type">
                                          <option readonly>Select User Role</option>
                                          <option value="Cashier">Cashier</option>
                                          <option value="Branch Admin">Branch Admin</option>
                                          <option value="Shop Admin">Shop Admin</option>
                                       </select>
                                       @endif
	                                 </td>
	                               </tr>
	                               <tr>
	                                 <td>Password</td>
	                                 <td>
	                                 	<input type="password" name="password" class="form-control"/>
            						 </td>
	                               </tr>
	                               <tr>
	                                 <td>Confirm Password</td>
	                                 <td>
	                                 	<input type="password" name="password_confirm" class="form-control"/>
            						 </td>
	                               </tr>
	                               <tr>
	                                 <td></td>
	                                 <td>
	                                 	<label><input type="checkbox" value="1" @if(!empty($data->is_lock)==1) checked="checked" @endif name="is_lock" ><span style="margin-left: 10px;margin-right: 15px;">Is Lock</span></label>
	                                 	<label><input type="checkbox" @if(!empty($data->is_active)==1) checked="checked" @endif value="1" name="is_active"><span style="margin-left: 10px;">Is Active</span></label>
            						 </td>
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
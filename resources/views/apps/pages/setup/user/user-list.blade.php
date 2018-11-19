@extends('apps.layout.master')
@section('title','User List')
@section('breadcrumb','User List')
@section('breadcrumb_page','User List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">User List :</legend>
	                <form method="post" action="">
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table">
	                            <thead style="background-color: #ededed">
	                               <tr>
	                                 <th>#</th>
	                                 <th>Name</th>
	                                 <th>Email</th>
	                                 <th>Photo</th>
	                                 <th>Mobile Number</th>
	                                 <th>User Role</th>
	                                 <th>Action</th>
	                               </tr>
	                             </thead>
	                            <tbody>
	                            	@if(isset($data))
	                            	@foreach($data as $row)
	                               <tr>
	                                 <td>{{$row->id}}</td>
	                                 <td>{{$row->name}}</td>
	                                 <td>{{$row->email}}</td>
	                                 <td>
	                                 	<img src="{{url('upload/setup/user/'.$row->photo)}}" width="50">
	                                 </td>
	                                 <td>{{$row->phone}}</td>
	                                 <td>{{$row->user_type}}</td>
	                                 <td>
	                                 	<a href="{{url('user/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                                 	
	                                 </td>
	                               </tr>
	                               @endforeach
	                               @endif
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
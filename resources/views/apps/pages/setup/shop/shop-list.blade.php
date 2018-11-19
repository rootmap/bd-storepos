@extends('apps.layout.master')
@section('title','Shop/Branch List')
@section('breadcrumb','Shop/Branch List')
@section('breadcrumb_page','Shop/Branch List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Shop/Branch List :</legend>
	                <form method="post" action="">
	                <div class="col-md-10 col-md-offset-1" >
	                   <div class="table-responsive" >
	                         <table class="table">
	                            <thead style="background-color: #ededed">
	                               <tr>
	                                 <th>#</th>
	                                 <th>Branch Name</th>
	                                 <th>Email</th>
	                                 <th>Mobile Number</th>
	                                 <th>Address</th>
	                                 <th>Action</th>
	                               </tr>
	                             </thead>
	                            <tbody>
	                               @if(isset($data))
	                               @foreach($data as $row)
	                               <tr>
	                                 <td>{{$row->id}}</td>
	                                 <td>{{$row->branch_name}}</td>
	                                 <td>{{$row->email}}</td>
	                                 <td>{{$row->phone_no}}</td>
	                                 <td>{{$row->address}}</td>
	                                 <td>
	                                 	<a href="{{url('shop/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                                 	<a href="{{url('shop/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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

@section('css')

@endsection
@extends('apps.layout.master')
@section('title','Customer List')
@section('breadcrumb','Customer List')
@section('breadcrumb_page','Customer List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Customer List :</legend>
	                <form method="post" action="">
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table id="tableData" class="table table-bordered table-striped">
	                            <thead style="background-color: #ededed">
	                               <tr>
	                                 <th>#</th>
	                                 <th>Name</th>
	                                 <th>Email</th>
	                                 <th>Mobile Number</th>
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
	                                 <td>{{$row->phone}}</td>
	                                 <td>
	                                 	<a href="{{url('customer/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                                 	 <a href="{{url('customer/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
@section('js')
  @include('apps.include.datatable')
@endsection
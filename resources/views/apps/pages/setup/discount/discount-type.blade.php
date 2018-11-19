@extends('apps.layout.master')
@section('title','Discount Type')
@section('breadcrumb','Discount Type')
@section('breadcrumb_page','Discount Type Management')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	       	<div class="col-md-7" >
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Discount Type Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('discount-type-update/'.$data->id)}}"
	                	@else
	                	action="{{url('discount-type-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Name</td>
	                                 <td><input type="text" @if(!empty($data)) value="{{$data->name}}" @endif name="name" class="form-control" autofocus></td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="Update" @endif value="Save">
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
	             <div class="col-md-5">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Discount List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>
                                          <a href="{{url('discount-type/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('discount-type/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                       </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                 </tbody>
                              </table>
                            </form>
                          </div>
                     </fieldset>
                  </div>
	          </div>
	       </div>
	    </div>
	 </div>
	</div>
@endsection
@extends('apps.layout.master')
@section('title','Tender')
@section('breadcrumb','Tender')
@section('breadcrumb_page','Tender')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
           <div class="col-md-6" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Tender Name:</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                              
                              @if(!empty($data))
                                action="{{url('tender-update/'.$data->id)}}"
                              @else
                              action="{{url('tender-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed;">
                                  <tbody class="text-center">
                                     <tr>
                                       <td>Name </td>
                                       <td><input type="text" name="name" placeholder="Tender Name" @if(!empty($data)) value="{{$data->name}}" @endif  class="form-control"></td>
                                     </tr>
                                     <tr>
                                       <td colspan="2">
                                       	<input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="Update" @endif value="Save">
                                       	<input type="reset" class="btn btn-default btn-raised" value="Cancle">
                                       </td>
                                     </tr>
                                  </tbody>
                              </table>
                            </form>
                          </div>
    	               </fieldset>
                  </div>
                  <div class="col-md-5 col-md-offset-1">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Tender List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
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
                                          <a href="{{url('tender/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('tender/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
	</div>
@endsection

@section('js')
	@include('apps.include.datatable')
@endsection
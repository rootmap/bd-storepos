@extends('apps.layout.master')
@section('title','Vendor List')
@section('breadcrumb','Vendor List')
@section('breadcrumb_page','Vendor List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
              <div class="col-md-12">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Vendor List:</legend>
                          <div class="table-responsive" >
                           
                              <table id="tableData" class="table table-bordered table-striped" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Contact Person</th>
                                       <th>Contact Number</th>
                                       <th>Email</th>
                                       <th>Website</th>
                                       <th>Address</th>
                                       <th>Action</th>
                                     </tr>
                                   </thead>
                                  <tbody>
                                    @if(isset($data))
                                    @foreach($data as $row)
                                     <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->contact_person}}</td>
                                       <td>{{$row->contact_number}}</td>
                                       <td>{{$row->email}}</td>
                                       <td>{{$row->website}}</td>
                                       <td>{{$row->address}}</td>
                                       <td>
                                        <a href="{{url('vendor/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{url('vendor/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                       </td>
                                     </tr>
                                     @endforeach
                                     @endif
                                  </tbody>
                              </table>
                            
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
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{url('theme/js/paging.js')}}"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableData').paging({limit:15});
    });
</script>
@endsection
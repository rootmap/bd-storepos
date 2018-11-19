@extends('apps.layout.master')
@section('title','Retailer List')
@section('breadcrumb','Retailer List')
@section('breadcrumb_page','Retailer List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
              <div class="col-md-12">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Retailer List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Retailer Id</th>
                                       <th>Contact Number</th>
                                       <th>Email</th>
                                       <th>Present Address</th>
                                       <th>National No</th>
                                       <th>Passport No</th>
                                       <th>Action</th>
                                     </tr>
                                   </thead>
                                  <tbody>
                                     @if(isset($data))
                                     @foreach($data as $row)
                                     <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->retailer_id}}</td>
                                       <td>{{$row->phone}}</td>
                                       <td>{{$row->email}}</td>
                                       <td>{{$row->present_address}}</td>
                                       <td>{{$row->national_id_no}}</td>
                                       <td>{{$row->passport_id_no}}</td>
                                       <td>
                                        <a href="{{url('retailer/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{url('retailer/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{url('theme/js/paging.js')}}"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableData').paging({limit:15});
    });
</script>
@endsection
@extends('apps.layout.master')
@section('title','Gift Voucher')
@section('breadcrumb','Gift Voucher')
@section('breadcrumb_page','Gift Voucher')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
           <div class="col-md-5" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Gift Voucher info:</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                    
                              @if(!empty($data))
                                action="{{url('gift_voucher-update/'.$data->id)}}"
                              @else
                              action="{{url('gift_voucher-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed">
	                            <tbody>
                                  <tr>
	                                 <td>Gift Voucher Name</td>
	                                 <td><input type="text" class="form-control" name="gift_voucher_name"  @if(!empty($data)) value="{{$data->gift_voucher_name}}" @endif ></td>
	                               </tr>
                                  <tr>
                                    <td>Gift Voucher Code</td>
                                    <td><input type="text" class="form-control" name="gift_voucher_code" @if(!empty($data)) value="{{$data->gift_voucher_code}}" @endif ></td>
                                  </tr>
                                  <tr>
                                    <td>Amount</td>
                                    <td><input type="text" class="form-control" name="amount" @if(!empty($data)) value="{{$data->amount}}" @endif ></td>
                                  </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="update" @endif value="Save">
	                                  <input type="reset" class="btn btn-default" value="Cancel">
	                                 </td>
	                               </tr>
	                            </tbody>
	                         </table>
                            </form>
                          </div>
    	               </fieldset>
                  </div>
                  <div class="col-md-7">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Gift Voucher List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Gift Voucher Name</th>
                                       <th>Gift Voucher Code</th>
                                       <th>Amount</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->gift_voucher_name}}</td>
                                       <td>{{$row->gift_voucher_code}}</td>
                                       <td>{{$row->amount}}</td>
                                       <td style="width: 100px;">
                                          <a href="{{url('gift_voucher/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('gift_voucher/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
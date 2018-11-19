@extends('apps.layout.master')
@section('title','Sales Void')
@section('breadcrumb','Sales Void')
@section('breadcrumb_page','Sales Void')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
          <div class="col-md-5" >
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Sales Void Info:</legend>
	                <form enctype="multipart/form-data" method="post" 
                              
                              @if(!empty($data))
                                action="{{url('sales_void-update/'.$data->id)}}"
                              @else
                              action="{{url('sales_void-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Customer Name</td>
	                                 <td>
	                                 	<select class="form-control" name="customer_id">
                                          <option readonly>Select Customer</option>
                                          @if(isset($cus))
                                          @foreach($cus as $row)

                                            <option
                                            @if(isset($data)) 
                                                @if($data->customer_id==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                             value="{{$row->id}}">{{$row->name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
	                                 </td>
	                               </tr>
	                               <tr>
                                   <td>Sales Invoice ID</td>
                                   <td><input type="text" @if(isset($data)) value="{{$data->invoice_id}}" @endif class="form-control" name="invoice_id"></td>
                                 </tr>
                                 <tr>
                                    <td>Sales Amount</td>
                                    <td><input type="text" @if(isset($data)) value="{{$data->quantity}}" @endif class="form-control" name="quantity"></td>
                                  </tr>
                                 <tr>
                                    <td>Return Amount</td>
                                    <td><input type="text" @if(isset($data)) value="{{$data->quantity}}" @endif class="form-control" name="quantity"></td>
                                  </tr>
                                 <tr>
                                    <td>Sales Return Note</td>
                                    <td><input type="text" @if(isset($data)) value="{{$data->quantity}}" @endif class="form-control" name="quantity"></td>
                                  </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(isset($data)) value="Update" @endif value="Save">
	                                  <input type="reset" class="btn btn-default" value="Cancel">
	                                 </td>
	                               </tr>
	                            </tbody>
	                         </table>
                            </form>
	            </fieldset>
	             </div>
	             <div class="col-md-7">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Stock Out List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Customern Name</th>
                                       <th>Barcode</th>
                                       <th>Product Name</th>
                                       <th>Quantity</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->customername}}</td>
                                       <td>{{$row->barcode}}</td>
                                       <td>{{$row->proname}}</td>
                                       <td>{{$row->quantity}}</td>
                                       <td>
                                          <a href="{{url('stock_out/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('stock_out/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
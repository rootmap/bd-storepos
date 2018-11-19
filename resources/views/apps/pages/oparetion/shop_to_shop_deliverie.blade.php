@extends('apps.layout.master')
@section('title','Shop to Shop Deliverie')
@section('breadcrumb','Shop to Shop Deliverie')
@section('breadcrumb_page','Shop to Shop Deliverie')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
           <div class="col-md-5" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Shop to Shop Deliverie info:</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                    
                              @if(!empty($data))
                                action="{{url('shop_to_shop_deliverie-update/'.$data->id)}}"
                              @else
                              action="{{url('shop_to_shop_deliverie-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed">
	                            <tbody>
                                  <tr>
                                    <td>From Shop</td>
                                    <td>
                                       <select class="form-control" name="from_shop_id">
                                          <option readonly>Select Old Shop</option>
                                          @if(isset($ShopInfo))
                                          @foreach($ShopInfo as $row)
                                            <option
                                            @if(isset($data)) 
                                                @if($data->from_shop_id==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                            value="{{$row->id}}">{{$row->branch_name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
                                    </td>
                                  </tr>
                                 <tr>
                                   <td>To Shop</td>
                                   <td>
                                    <select class="form-control" name="to_shop_id">
                                          <option readonly>Select New Shop</option>
                                          @if(isset($ShopInfo))
                                          @foreach($ShopInfo as $row)
                                            <option
                                            @if(isset($data)) 
                                                @if($data->to_shop_id ==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                            value="{{$row->id}}">{{$row->branch_name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
                                   </td>
                                 </tr>
                                 <tr>
                                   <td>barcode</td>
                                   <td><input type="text" @if(isset($data)) value="{{$data->barcode}}" @endif class="form-control" name="barcode"></td>
                                 </tr>
                                 <tr>
                                   <td>Product Id</td>
                                   <td>
                                       <select class="form-control" name="product_id">
                                          <option readonly>Select Product</option>
                                          @if(isset($pro))
                                          @foreach($pro as $row)

                                            <option
                                            @if(isset($data)) 
                                                @if($data->product_id==$row->id) 
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
                                    <td>Quantity</td>
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
                          </div>
    	               </fieldset>
                  </div>
                  <div class="col-md-7">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Shop to Shop Deliverie List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>From Shop</th>
                                       <th>To Shop</th>
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
                                       <td>{{$row->from_shop_name}}</td>
                                       <td>{{$row->to_shop_name}}</td>
                                       <td>{{$row->barcode}}</td>
                                       <td>{{$row->proname}}</td>
                                       <td>{{$row->quantity}}</td>
                                       <td>
                                          <a href="{{url('shop_to_shop_deliverie/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('shop_to_shop_deliverie/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
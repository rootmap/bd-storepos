@extends('apps.layout.master')
@section('title','Product List')
@section('breadcrumb','Product List')
@section('breadcrumb_page','Product List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
              <div class="col-md-12">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Product List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
                                       <th>Brand Name</th>
                                       <th>Model Name</th>
                                       <th>Barcode</th>
                                       <th>Product Name</th>
                                       <th>Quantity In Stock</th>
                                       <th>Price</th>
                                       <th>Cost</th>
                                       <th>IMEI</th>
                                       <th>Product Added</th>
                                       <th>Total Price</th>
                                       <th>Total Cost</th>
                                       <th style="width: 100px;">Action</th>
                                     </tr>
                                   </thead>
                                  <tbody>
                                    @if(isset($data))
                                    @foreach($data as $row)
                                     <tr>
                                       <td>{{$row->brand_name}}</td>
                                       <td>{{$row->model_name}}</td>
                                       <td>{{$row->barcode}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->quantity}}</td>
                                       <td>{{$row->price}}</td>
                                       <td>{{$row->cost}}</td>
                                       <td>{{$row->imei}}</td>
                                       <td>{{$row->created_at}}</td>
                                       <td>
                                        <?php 
                                          echo $totalprice = ($row->quantity * $row->price);
                                        ?>
                                        </td>
                                       <td>
                                        <?php 
                                          echo $totalcost = ($row->quantity * $row->cost);
                                        ?>
                                       </td>
                                       <td>
                                        <a href="{{url('product/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{url('product/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
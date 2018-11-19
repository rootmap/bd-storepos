@extends('apps.layout.master')
@section('title','Product ')
@section('breadcrumb','Product')
@section('breadcrumb_page','Product')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	       	@include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Add Product Info :</legend>
	                <form enctype="multipart/form-data" method="post" 
	                	
	                	@if(!empty($data))
	                		action="{{url('product-update/'.$data->id)}}"
	                	@else
	                	action="{{url('product-add')}}"
	                	@endif
	                	>
	                	{{ csrf_field() }}
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Brand Name</td>
	                                 <td>
	                                 	<select id="brand" class="form-control" name="brand_id">
                                          <option readonly>Select Brand Name</option>
                                          @if(isset($brand))
                                          @foreach($brand as $row)
                                             <option 
                                             @if(isset($data)) 
                                                @if($data->brand_id==$row->id) 
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
	                                 <td>Model Name</td>
	                                 <td>
	                                 	<select id="model" class="form-control" name="model_id">
                                          <option readonly>Select Brand Name</option>
                                          
                                       </select>
	                                 </td>
	                               </tr>
	                               <tr>
	                                 <td>Barcode</td>
	                                 <td><input type="text" name="barcode" class="form-control" @if(!empty($data)) value="{{$data->barcode}}" @endif ></td>
	                               </tr>
	                               <tr>
	                                 <td>Product Name</td>
	                                 <td><input type="text" name="name" @if(!empty($data)) value="{{$data->name}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Quantity In Stock</td>
	                                 <td><input type="number" name="quantity" @if(!empty($data)) value="{{$data->quantity}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Price Per Item</td>
	                                 <td><input type="number" name="price" @if(!empty($data)) value="{{$data->price}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Cost Per Item</td>
	                                 <td><input type="number" name="cost" @if(!empty($data)) value="{{$data->cost}}" @endif class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>IMEI</td>
	                                 <td><input type="text" name="imei" @if(!empty($data)) value="{{$data->imei}}" @endif class="form-control"></td>
	                               </tr>
	                               
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" value="Save">
	                                  <input type="reset" class="btn btn-default btn-raised" value="Cancel">
	                                 </td>
	                               </tr>
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
<script>
        $(document).ready(function () {

@if(isset($data))
    @if(!empty($data->model_id))
        var loadingscid = '<option value="0">Loading Please Wait...</option>';
        $("#model").html(loadingscid);
        $.post("{{url('product/ajax/modelData')}}", {'div':'{{$data->brand_id}}', '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
            //console.log(cdata);
            var loadingscid = '<option value="0">Please Select Brand</option>';
            $.each(divdata, function (index, val) {
                //console.log(val);
                var selText='';
                if(val.id=={{$data->model_id}})
                {
                    selText='selected="selected"';
                }
                loadingscid += '<option '+selText+' value="' + val.id + '">' + val.name + '</option>';
            });
            var getlength = divdata.length;
            if (getlength == 0)
            {
                var loadingscid = '<option value="0">Please Select Another Brand</option>';
                $("#model").html(loadingscid);
            } else
            {
                $("#model").html(loadingscid);
            }
        });
    @endif
@endif

            $("#brand").click(function () {

		    var div = $(this).val();
		    if (div == null || div == 0)
		    {
		        var loadingscid = '<option value="0">Please Select Brand</option>';
		        $("#model").html(loadingscid);
		    } else
		    {
		        var loadingscid = '<option value="0">Loading Please Wait...</option>';
		        $("#model").html(loadingscid);
		        $.post("{{url('product/ajax/modelData')}}", {'div': div, '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
		            //console.log(cdata);
		            var loadingscid = '<option value="0">Please Select Model</option>';
		            $.each(divdata, function (index, val) {
		                //console.log(val);
		                loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
		            });
		            var getlength = divdata.length;
		            //console.log(getlength);
		            if (getlength == 0)
		            {
		                var loadingscid = '<option value="0">Please Select Another Brand</option>';
		                $("#model").html(loadingscid);
		            } else
		            {
		                $("#model").html(loadingscid);
		            }
		        });
		    }
		});
        });


    </script>
@endsection
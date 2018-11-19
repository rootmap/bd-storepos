@extends('apps.layout.master')
@section('title','Sales')
@section('breadcrumb','Sales')
@section('breadcrumb_page','Sales')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Sales Info:</legend>
	                
	                <div class="col-md-8" >
	                   <div class="table-responsive" >
	                   	<span id="pageMSG"></span>
	                         <form method="post" action="javascript:loadCartProBar();">
		                         <table class="table custable" style="background-color: #ededed">
		                         	<input type="hidden" name="imei" value="" id="imei">
		                         	<input type="hidden" name="brand" value="" id="brand">
		                         	<input type="hidden" name="model" value="" id="model">
		                         	<input type="hidden" name="pro_id" value="" id="pro_id">
		                            <tbody>
		                               <tr>
		                                 <td>Barcode</td>
		                                 <td><input type="text" id="Invalue" name="barcode" class="form-control" autofocus></td>
		                                 <td><button type="button" id="barcode" class="barcode btn btn-default btn-raised" ><i class="fa fa-barcode" aria-hidden="true"></i> Load Product</button></td>
		                                 <td>Qty</td>
		                                 <td><input type="text" id="qty" name="quantity" class="form-control"></td>
		                               </tr>
		                               <tr>
		                                 <td>Product Name</td>
		                                 <td><input type="text" id="product_name"  readonly="readonly" name="product_name" class="form-control" ></td>
		                                 <td>&nbsp;</td>
		                                 <td>Price</td>
		                                 <td><input type="text" id="price" name="price" readonly="" class="form-control"></td>
		                               </tr>
		                               <tr>
		                                 <td>In Stoke</td>
		                                 <td><input id="stoke"  readonly="readonly" name="stoke" type="text" class="form-control"></td>
		                                 <td>&nbsp;</td>
		                                 <td colspan="2" align="center">
		                                 	<button type="button" id="ajaxCart" class="btn btn-info btn-raised" >
		                                 	<i class="fa fa-cart"></i> Add To Cart
		                                 	</button>
		                                 	<button type="submit" style="display: none; opacity: 0;" class="btn btn-default btn-raised" >
		                                 	<i class="fa fa-cart"></i> Load Product
		                                 	</button>
		                                  	<input type="reset" style="width: 80px;" class="btn btn-warning" value="Cancel">
		                                 </td>
		                               </tr>
		                            </tbody>
		                         </table>
	                         </form>
	                         <?php // echo "<pre>"; print_r($cart); ?>
	                         <table class="table" id="removetable">
	                            <thead style="background-color: #ededed">
	                               <tr>
	                                 <th>Barcode</th>
	                                 <th>Product Name</th>
	                                 <th>IMEI</th>
	                                 <th>Brand</th>
	                                 <th>Model</th>
	                                 <th>Qty</th>
	                                 <th>Price</th>
	                                 <th>Total</th>
	                                 <th>Action</th>
	                               </tr>
	                             </thead>
	                            <tbody id="dataCart">
	                            	@if(isset($cart->items))
	                            		@if(count($cart->items)>0)
	                            			@foreach($cart->items as $itm)
	                            				<?php //print_r($itm); ?>
	                            				<?php 
	                            				$total=$itm['qty']*$itm['item']->price;
	                            				//$pro=$itm

	                            				?>
	                            				<tr id="{{$itm['item']->id}}">
	                            					<td>{{$itm['item']->barcode}}
	                            						<input type="hidden" name="pro_id[]" value="{{$itm['item']->id}}">
	                            					</td>
	                            					<td>{{$itm['item']->name}}</td>
	                            					<td>{{$itm['item']->imei}}</td>
	                            					<td>{{$itm['item']->brand_name}}</td>
	                            					<td>{{$itm['item']->model_name}}</td>
	                            					<td>
	                            						<input onkeyup="changeCartRowQuantity({{$itm['item']->id}});"  onkeydown="changeCartRowQuantity({{$itm['item']->id}});"  name="quantityTxt[]" onchange="changeCartRowQuantity({{$itm['item']->id}});" class="quantityTxt" style="width:50px;" type="number" name="edit_quantity" value="{{$itm['qty']}}">
	                            					</td>
	                            					<td>{{$itm['item']->price}}</td>
	                            					<td>
	                            						<span class="productTotal">{{$total}}</span>
	                            					</td>
	                            					<td>
	                            						<button class="btn btn-danger deleterow" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
	                            					</td>
	                            				</tr>
	                            			@endforeach
	                            		@endif
	                            	@endif	                               
	                            </tbody>
	                         </table>
	                      </div>
	                </div>
	                <div class="col-md-4">
	                   <table class="table" style="background-color: #ededed">
	                      <thead style="background-color: #ededed">
                           <tr>
                           	<th colspan="2" style="color: #EA341F; text-align: center">Stock Panel</th>
                           </tr>
                           <tr>
                           	 <th>Brand</th>
                             <th>Total Product</th>
                           </tr>
                         </thead>
	                      <tbody>
	                         @if(isset($stock))
	                         @foreach($stock as $row)
	                         <tr>
	                           <td>{{$row->brand_name}}</td>
	                           <td>{{$row->total}}</td>
	                         </tr>
	                         @endforeach
	                         @endif
	                      </tbody>
	                   </table>
	                   <table class="table" style="background-color: #ededed">
	                      <tbody id="pureSumCart">
	                          <tr>
	                           <td>Total Qty</td>
	                           <td valign="middle" style="">/</td>
	                           <td>Total Items</td>
	                         </tr>
	                         <tr>
	                           <td><input readonly="readonly" value="0" type="text" class="form-control"></td>
	                           <td valign="middle" style="">/</td>
	                           <td><input readonly="readonly" value="0" type="text" class="form-control"></td>
	                         </tr> 
	                         <tr>
	                           <td>Tax Rate(%)</td>
	                           <td>
	                           		<input  type="text" value="{{$tax_rate}}" readonly="readonly" id="tax_rate" placeholder="Set Amount"  class="form-control">
	                           	</td>
	                           	<td><input  type="text" value="0" readonly="readonly" id="tax_amount" placeholder="Set Amount"  class="form-control"></td>
	                         </tr>
	                         <tr>
	                           <td>Discount Type</td>
	                           <td>
	                           		<select class="form-control" id="discount_type" name="discount_type">
	                           			<option selected="selected" value="0">No Discount</option>
	                           			<option @if($discount_type==1) selected="selected" @endif value="1">Percentage %</option>
	                           			<option @if($discount_type==2) selected="selected" @endif  value="2">Fixed Amount</option>
	                           		</select>
	                           	</td>
	                           	<td><input  type="text" value="{{$discount_rate}}" id="disc_amount_set" placeholder="Set Amount"  class="form-control no-discount fix_amount"></td>
	                         </tr>

	                         <tr class="no-discount">
	                           <td>Dis. Amount</td>
	                           <td colspan="2"><input type="text" id="disc_calc_amount" readonly="readonly" value="0" placeholder="Discount Amount" class="form-control  no-discount"></td>
	                           
	                         </tr>


	                         
	                         <tr>
	                           <td>Sub Total</td>
	                           <td colspan="2"><input value="0"  readonly="readonly"  type="text" id="sub_total_aft_disc" class="form-control"></td>
	                         </tr>
	                         <tr>
	                           <td>Select Customer</td>
	                           <td colspan="2">
	                           		<select class="form-control" name="customer_id" id="customer_id">
	                           			<option value="0">Select Customer</option>
	                           			<option value="A00">Add New Customer</option>
	                           			@if(count($cus)>0)
	                           				@foreach($cus as $cp)
	                           					<option 
	                           					 @if($cart->customerID==$cp->id)
	                           					 	selected="selected" 
	                           					 @endif 
	                           					 value="{{$cp->id}}">{{$cp->name}}</option>
	                           				@endforeach
	                           			@endif
	                           		</select>
	                           	</td>
	                         </tr>
	                         <tr class="new_customer">
	                           <td>Customer Name </td>
	                           <td colspan="2"><input type="text" name="customer_name"  id="customer_name" class="form-control"></td>
	                         </tr>
	                         <tr class="new_customer">
	                           <td>Customer Phone</td>
	                           <td colspan="2"><input type="text" name="customer_phone" id="customer_phone" class="form-control"></td>
	                         </tr>
	                         <tr class="new_customer">
	                           <td>Customer Email</td>
	                           <td colspan="2"><input type="text" name="customer_email" id="customer_email" class="form-control"></td>
	                         </tr>
	                         <tr class="new_customer">
	                           <td>Customer Address</td>
	                           <td colspan="2"><input type="text" name="customer_address" id="customer_address" class="form-control"></td>
	                         </tr>

	                         <tr>
	                           <td>Payment Type</td>
	                           <td colspan="2">
	                           		<select class="form-control" id="payment_method" name="payment_method">
	                           			<option value="0">Select Payment Method</option>
	                           			@if(isset($tender))
	                           				@foreach($tender as $tn)
	                           					<option 
	                           					 @if($cart->paymentMethodID==$tn->id)
	                           					 	selected="selected" 
	                           					 @endif
	                           					value="{{$tn->id}}">{{$tn->name}}</option>
	                           				@endforeach
	                           			@endif
	                           		</select>
	                           	</td>
	                         </tr>


	                         
	                         <tr class="cash">
	                           <td>Cash Received</td>
	                           <td colspan="2"><input id="cash_received" type="text" class="form-control"></td>
	                         </tr>
	                         <tr class="cash">
                             	<td>Change Amount</td>
                            	 <td colspan="2"><input type="text" id="change_amount" name="cus_phone" class="form-control"></td>
                             </tr>
                             

                             <tr class="card">
	                           <td>Card Number</td>
	                           <td colspan="2"><input  id="card_number" type="text" class="form-control"></td>
	                         </tr>
	                         <tr class="card">
	                           <td>Card Holder Name</td>
	                           <td colspan="2"><input id="card_holder_name" type="text" class="form-control"></td>
	                         </tr>
	                         <tr class="card">
	                           <td>Card Type</td>
	                           <td colspan="2">
	                           		<select class="form-control" name="card_type" id="card_type">
	                           			<option value="0">Select Card Type</option>
	                           			<option value="1">Visa</option>
	                           			<option value="2">Master</option>
	                           			<option value="3">Platinum</option>
	                           			<option value="4">Nexus</option>
	                           		</select>
	                           </td>
	                         </tr>
	                         <tr class="card">
	                           <td>Expire Date</td>
	                           <td colspan="2"><input id="expire_date" type="text" class="form-control"></td>
	                         </tr>
	                         <tr class="card">
	                           <td>Card Payment Amount</td>
	                           <td colspan="2"><input id="card_payment_amount" type="text" class="form-control"></td>
	                         </tr>

	                         <tr class="mobile">
	                           <td>Mobile Banking Number</td>
	                           <td colspan="2"><input id="mobile_banking_number" type="text" class="form-control"></td>
	                         </tr>	                         

	                         <tr class="mobile">
	                           <td>Mobile Receive Amount</td>
	                           <td colspan="2"><input id="mobile_receive_amount" type="text" class="form-control"></td>
	                         </tr>

	                         <tr class="mobile">
	                           <td>Transaction ID</td>
	                           <td colspan="2"><input id="mobile_transaction_id" type="text" class="form-control"></td>
	                         </tr>	                         

	                         <tr class="mobile">
	                           <td>Change Amount</td>
	                           <td colspan="2"><input id="mobile_change_amount" type="text" class="form-control"></td>
	                         </tr>

                             <tr>
                             	<td>Care By</td>
                             	<td colspan="2"><input type="text" readonly="readonly" value="{{Auth::user()->name}}" id="careby" name="care_by" class="form-control"></td>
                             </tr>
	                         
	                         <tr>
	                           <td colspan="3" class="text-center">
	                           	 <a href="{{url('sales')}}" class="btn btn-danger">Clear POS</a>
	                           	 <button type="button"  id="save_invoice_print" class="btn btn-info">Save &amp; Print</button>
	                           	 <button type="button" id="save_invoice" class="btn btn-success">Save</button>
	                           </td>
	                         </tr>
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
@endsection

@section('css')
<style type="text/css">
	.custable input{width: 150px;}
</style>
@endsection
@section('js')
<script type="text/javascript">
	var productJson=<?php echo json_encode($pro); ?>;
	function loadingOrProcessing(sms)
    {
        var strHtml='';
            strHtml+='<div class="alert alert-icon-right alert-info alert-dismissible fade in mb-2" role="alert">';
            strHtml+='      <i class="icon-spinner10 spinner"></i> '+sms;
            strHtml+='</div>';

            return strHtml;

    }

    function warningMessage(sms)
    {
        var strHtml='';
            strHtml+='<div class="alert alert-icon-left alert-danger alert-dismissible fade in mb-2" role="alert">';
            strHtml+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            strHtml+='<span aria-hidden="true">×</span>';
            strHtml+='</button>';
            strHtml+=sms;
            strHtml+='</div>';
            return strHtml;
    }

    function successMessage(sms)
    {
        var strHtml='';
            strHtml+='<div class="alert alert-icon-left alert-success alert-dismissible fade in mb-2" role="alert">';
            strHtml+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            strHtml+='<span aria-hidden="true">×</span>';
            strHtml+='</button>';
            strHtml+=sms;
            strHtml+='</div>';
            return strHtml;
    }
    </script>
<script>

	function loadCartProBar()
	{
		console.log("Action Perform");
		$('.barcode').click();
		$('#ajaxCart').click();
	}

	function convertNumbersToDec(numB)
	{
		var nn=Number(numB).toFixed(2);
		return nn;
	}

	function initiateDiscount()
	{
		var discSet=$("#disc_amount_set").val();
		var getDiscType=$("#discount_type").val();
     		//var discSet=$(this).val();
 		var totalRow=$("#pureSumCart").find("tr:eq(1)").find("td:eq(2)").children('input').val();
 		


 		var discAmount=0;
 		if(convertNumbersToDec(discSet)>0)
 		{
     		if(getDiscType==1)
     		{
     			discAmount=convertNumbersToDec((totalRow*discSet)/100);
     		}
     		else if(getDiscType==2)
     		{
     			discAmount=convertNumbersToDec(discSet);
     		}
 		}

 		$("#disc_calc_amount").val(discAmount);
	}

    $(document).ready(function (barcodedata) { 

    	

    	calculateRowSum();

     	$(".no-discount").hide();
     	@if($discount_type>0) 
    		$(".no-discount").show();
    	@endif
     	$(".new_customer").hide();

     	$(".cash").hide();
     	$(".card").hide();
     	$(".mobile").hide();
     	$("#payment_method").change(function(){
     		$(".cash").hide();
         	$(".card").hide();
         	$(".mobile").hide();

     		var pm=$(this).val();
     		if(pm==1){ $(".cash").show(); }
     		else if(pm==2){ $(".card").show(); }
     		else if(pm==3){ $(".mobile").show(); }
     		else if(pm==4){ $(".mobile").show(); }
     		else if(pm==5){ $(".mobile").show(); }
     		else if(pm==6){ $(".mobile").show(); }
     		else if(pm==7){ $(".mobile").show(); }

     		var pm=$(this).val();
     		if(pm=="0")
     		{
     			$("#pageMSG").html(warningMessage("Please select a payment method."));
     		}
     		else
     		{
     			//************************ Request proced start *******************************//
	     		var AddPOSUrl="{{url('cart/payment/select')}}";
	     		var dataArray={'_token':"{{csrf_token()}}",'payment_id':pm};
	     		ajaxRequest(AddPOSUrl,dataArray,"Customer New ID Saved to POS");
	     		//************************ Request proced end *******************************//
     		}
     	});

     	@if(!empty($cart->customerID))
		 	@if($cart->customerID=="A00")
		 		$(".new_customer").show();
		 	@endif
		@endif 

     	@if(!empty($cart->paymentMethodID))
		 	var pm="{{$cart->paymentMethodID}}";
		 	if(pm==1){ $(".cash").show(); }
     		else if(pm==2){ $(".card").show(); }
     		else if(pm==3){ $(".mobile").show(); }
     		else if(pm==4){ $(".mobile").show(); }
     		else if(pm==5){ $(".mobile").show(); }
     		else if(pm==6){ $(".mobile").show(); }
     		else if(pm==7){ $(".mobile").show(); }
		@endif


        $("#customer_id").change(function(){
         	var cusID=$(this).val();
         	if(cusID=="A00")
         	{
         		$(".new_customer").show();
         	}
         	else
         	{
         		$(".new_customer").hide();
         	}
    	});

     	$("#discount_type").change(function(){
     		//$(".no-discount").show();
     		var disc=$(this).val();
     		if(disc==0)
     		{
     			$(".no-discount").hide();
     		}
     		else
     		{
     			$(".no-discount").show();
     		}

     		calculateRowSum();

     		var disc_amount_set=$("#disc_amount_set").val();
     		var discount_amount=convertNumbersToDec(disc_amount_set);
     		//************************ Request proced start *******************************//
     		var AddPOSUrl="{{url('cart/change/discount-type')}}";
     		var dataArray={'_token':"{{csrf_token()}}",'discount_type':disc,'discount_amount':discount_amount};
     		ajaxRequest(AddPOSUrl,dataArray,"Requested changes from discount type");
     		//************************ Request proced end *******************************//

     	});     	

     	$("#customer_id").change(function(){
     		//$(".no-discount").show();
     		var customer_id=$(this).val();
     		if(customer_id=="A00")
     		{
     			$("#pageMSG").html(successMessage("Please add new customer info."));
     		}
     		else if(customer_id=="0")
     		{
     			$("#pageMSG").html(warningMessage("Please select a customer"));
     		}
     		else
     		{
     			//************************ Request proced start *******************************//
	     		var AddPOSUrl="{{url('cart/customer/old')}}";
	     		var dataArray={'_token':"{{csrf_token()}}",'customer_id':customer_id};
	     		ajaxRequest(AddPOSUrl,dataArray,"Customer New ID Saved to POS");
	     		//************************ Request proced end *******************************//
     		}
     		

     	});



     	$("#disc_amount_set").keyup(function(){
     		

     		calculateRowSum();

     	});
	     
	               

        $('.barcode').click(function () {
            var code = $('#Invalue').val();

            if(code.length==0)
			{
				// alert('Please Type a Barcode No.!!!');
				$("#pageMSG").html(warningMessage("Please Type a Barcode No.!!!"));
				return false;
			}
			var productFound=0;
			$.each(productJson,function(rindex,row){
				if(row.barcode==code)
				{
					console.log(row); 
					$("#qty").val(1);
	            	$("#stoke").val(row.quantity);
	            	$("#price").val(row.price);
	            	$("#product_name").val(row.name);
	            	//$("#rate").val(row.cost);
	            	$("#imei").val(row.imei);
	            	$("#brand").val(row.brand_name);
	            	$("#model").val(row.model_name);
	            	$("#pro_id").val(row.id);
	            	productFound=1;
				}
			});

			if(productFound==0)
			{
				// alert('Please Type a Barcode No.!!!');
				$("#pageMSG").html(warningMessage("Please Type a Correct Barcode No.!!!"));
				return false;
			}
        });

        //Ajax Cart
        $('#ajaxCart').click(function () {
            var barcode=$.trim($("input[name=barcode]").val());
            var product_name=$.trim($("input[name=product_name]").val());
            var qty=$.trim($("input[name=quantity]").val());
            var price=$.trim($("input[name=price]").val());
            var rate=$.trim($("input[name=rate]").val());
            var cus_phone=$.trim($("input[name=cus_phone]").val());
            var pro_id=$.trim($("input[name=pro_id]").val());
            var imei=$.trim($("input[name=imei]").val());
            var brand=$.trim($("input[name=brand]").val());
            var model=$.trim($("input[name=model]").val());



			if (barcode.length > 0) 
				{
			    	
			    	var ExQuantity=$("#dataCart tr[id="+pro_id+"]").find("td:eq(5)").children('input').val();

			    	if(ExQuantity)
			    	{
			    		console.log(ExQuantity);
			    		

	                    var NewQuantity=(ExQuantity-0)+(1-0);
				    	var total = NewQuantity * price;
				    	// alert(NewQuantity);
				    	$("#dataCart tr[id="+pro_id+"]").find("td:eq(5)").children('input').val(NewQuantity);
				    	$("#dataCart tr[id="+pro_id+"]").find("td:eq(7)").children("span").html(total); 

				    	//------------------------Ajax POS Start-------------------------//
				        var AddPOSUrl="{{url('cart/add-cart-product')}}";
				        $.ajax({
				            'async': false,
				            'type': "POST",
				            'global': false,
				            'dataType': 'json',
				            'url': AddPOSUrl,
				            'data': {'_token':"{{csrf_token()}}",'pid':pro_id},
				            'success': function (data) {
				                //tmp = data;
				                console.log("Adding To Cart : "+data);
				            }
				        });
				        //------------------------Ajax POS End---------------------------//
			    	}
			    	else
			    	{
			    		
	                    var NewQuantity=1;
				    	var total = NewQuantity * price;
				    	// alert(NewQuantity);

				    	var strHTML='<tr id="'+pro_id+'"><td>'+barcode+'<input type="hidden" name="pro_id[]" value="'+pro_id+'"></td><td>'+product_name+'</td><td>'+imei+'</td><td>'+brand+'</td><td>'+model+'</td><td><input onkeyup="changeCartRowQuantity('+pro_id+');"  onkeydown="changeCartRowQuantity('+pro_id+');"  name="quantityTxt[]" onchange="changeCartRowQuantity('+pro_id+');" class="quantityTxt" style="width:50px;" type="number" name="edit_quantity" value="'+NewQuantity+'"></td><td>'+price+'</td><td><span class="productTotal">'+total+'</span></td><td><button class="btn btn-danger deleterow" type="button"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>';
				    	

				    	$("#dataCart").append(strHTML);

			    	    //------------------------Ajax POS Start-------------------------//
				        var AddPOSUrl="{{url('cart/add-cart-product')}}";
				        $.ajax({
				            'async': false,
				            'type': "POST",
				            'global': false,
				            'dataType': 'json',
				            'url': AddPOSUrl,
				            'data': {'_token':"{{csrf_token()}}",'pid':pro_id},
				            'success': function (data) {
				                //tmp = data;
				                console.log("Adding To Cart : "+data);
				            }
				        });
				        //------------------------Ajax POS End---------------------------//
			    	}
			    	
			    	
			    	calculateRowSum();
                
				        
			    }
			    else
			    {
	            	$("#pageMSG").html(warningMessage("Invalid Barcode, Please Type a Valid Barcode No.!!!"));
					return false;
            	}
            // alert(code);


            
        });

        $("#save_invoice").click(function(){
        	
        	var customer_id=$("#customer_id").val();
        	var customer_name=$("#customer_name").val();
        	var customer_phone=$("#customer_phone").val();
        	var customer_email=$("#customer_email").val();
        	var customer_address=$("#customer_address").val();

        	var payment_id=$("#payment_method").val();
        	var cash_received=$("#cash_received").val();
        	var change_amount=$("#change_amount").val();
        	var card_number=$("#card_number").val();
        	var card_holder_name=$("#card_holder_name").val();
        	var card_type=$("#card_type").val();
        	var expire_date=$("#expire_date").val();
        	var card_payment_amount=$("#card_payment_amount").val();

        	var mobile_banking_number=$("#mobile_banking_number").val();
        	var mobile_receive_amount=$("#mobile_receive_amount").val();
        	var mobile_transaction_id=$("#mobile_transaction_id").val();
        	var mobile_change_amount=$("#mobile_change_amount").val();

        	var dataArray={'_token':"{{csrf_token()}}",'customer_id':customer_id,'customer_name':customer_name,'customer_phone':customer_phone,'customer_email':customer_email,'customer_address':customer_address,'payment_id':payment_id,'cash_received':cash_received,'change_amount':change_amount,'card_number':card_number,'card_holder_name':card_holder_name,'card_type':card_type,'expire_date':expire_date,'mobile_banking_number':mobile_banking_number,'mobile_receive_amount':mobile_receive_amount,'mobile_transaction_id':mobile_transaction_id,'mobile_change_amount':mobile_change_amount,'card_payment_amount':card_payment_amount};

        		console.log(dataArray);

        	    //************************ Request proced start *******************************//
	     		var AddPOSUrl="{{url('cart/invoice/create')}}";
	     		ajaxRequestInvoice(AddPOSUrl,dataArray,"Saving invoice Data & Genarating Invoice.");
	     		//************************ Request proced end *******************************//
	     		
        });

        $("#save_invoice_print").click(function(){
        	
        	var customer_id=$("#customer_id").val();
        	var customer_name=$("#customer_name").val();
        	var customer_phone=$("#customer_phone").val();
        	var customer_email=$("#customer_email").val();
        	var customer_address=$("#customer_address").val();

        	var payment_id=$("#payment_method").val();
        	var cash_received=$("#cash_received").val();
        	var change_amount=$("#change_amount").val();
        	var card_number=$("#card_number").val();
        	var card_holder_name=$("#card_holder_name").val();
        	var card_type=$("#card_type").val();
        	var expire_date=$("#expire_date").val();
        	var card_payment_amount=$("#card_payment_amount").val();

        	var mobile_banking_number=$("#mobile_banking_number").val();
        	var mobile_receive_amount=$("#mobile_receive_amount").val();
        	var mobile_transaction_id=$("#mobile_transaction_id").val();
        	var mobile_change_amount=$("#mobile_change_amount").val();

        	var dataArray={'_token':"{{csrf_token()}}",'print':1,'customer_id':customer_id,'customer_name':customer_name,'customer_phone':customer_phone,'customer_email':customer_email,'customer_address':customer_address,'payment_id':payment_id,'cash_received':cash_received,'change_amount':change_amount,'card_number':card_number,'card_holder_name':card_holder_name,'card_type':card_type,'expire_date':expire_date,'mobile_banking_number':mobile_banking_number,'mobile_receive_amount':mobile_receive_amount,'mobile_transaction_id':mobile_transaction_id,'mobile_change_amount':mobile_change_amount,'card_payment_amount':card_payment_amount};

        		console.log(dataArray);

        	    //************************ Request proced start *******************************//
	     		var AddPOSUrl="{{url('cart/invoice/create')}}";
	     		ajaxRequestInvoice(AddPOSUrl,dataArray,"Saving invoice Data & Genarating Invoice.");
	     		//************************ Request proced end *******************************//
	     		
        });
        

    });

	function ajaxRequestInvoice(url,requestArray,consoleTest)
	{
		//------------------------Ajax POS Start-------------------------//
        //var AddPOSUrl="'cart/add-cart-product')}}";
        //{'_token':"csrf_token()}}",'pid':pro_id}
        $("#pageMSG").html(loadingOrProcessing("Saving your invoice, Please wait...!!!."));
        var AddPOSUrl=url;
        $.ajax({
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'json',
            'url': AddPOSUrl,
            'data': requestArray,
            'success': function (data) {
                //tmp = data;
                console.log(consoleTest+" : "+data);
                if(data==1)
	     		{
	     			$("#pageMSG").html(successMessage("Invoice Saved Successfully."));
	     			setTimeout(function(){ 
	     				window.location.reload();
	     			}, 3000);
	     		}
	     		else
	     		{
	     			$("#pageMSG").html(warningMessage("Failed, Please reload & try again."));
	     		}
            }
        });
        //------------------------Ajax POS End---------------------------//
	}

	function ajaxRequest(url,requestArray,consoleTest)
	{
		//------------------------Ajax POS Start-------------------------//
        //var AddPOSUrl="'cart/add-cart-product')}}";
        //{'_token':"csrf_token()}}",'pid':pro_id}

        var AddPOSUrl=url;
        $.ajax({
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'json',
            'url': AddPOSUrl,
            'data': requestArray,
            'success': function (data) {
                //tmp = data;
                console.log(consoleTest+" : "+data);
                return data;
            }
        });
        //------------------------Ajax POS End---------------------------//
	}

	function changeCartRowQuantity(rowindex)
	{
		//console.log(rowindex);
		var ExQuantity=$("#dataCart tr[id="+rowindex+"]").find("td:eq(5)").children('input').val();
		var price=$("#dataCart tr[id="+rowindex+"]").find("td:eq(6)").html();
		var NewQuantity=ExQuantity;
		if(NewQuantity<1)
		{
			NewQuantity=1;
		}
    	var total = NewQuantity * price;
    	// alert(NewQuantity);
    	$("#dataCart tr[id="+rowindex+"]").find("td:eq(5)").children('input').val(NewQuantity);
    	$("#dataCart tr[id="+rowindex+"]").find("td:eq(7)").children("span").html(total);

    	calculateRowSum();

 		//************************ Request proced start *******************************//
 		var AddPOSUrl="{{url('cart/pos/change-quantity')}}";
 		var dataArray={'_token':"{{csrf_token()}}",'quantity':NewQuantity,'pid':rowindex};
 		ajaxRequest(AddPOSUrl,dataArray,"Updating Pos Quantity By Product ID");
 		//************************ Request proced end *******************************//


	}

	

    function calculateRowSum()
    {
    	/*var qty=$(fid).val();
    	var row=$(fid).parent().parent();
    	var price = $(row).find("td:eq(6)").html();
    	var total=qty*price;
    	$(row).find("td:eq(7)").html(total);
    	console.log(price);*/

    	var qtTR=$("#dataCart tr");
    	var totalQuantity=0;
    	var totalRow=0;
    	$.each(qtTR,function(ind,row){
    		//console.log(ind,row);
    		var rowQuantity=$(row).find("td:eq(5)").children('input').val();
    		//console.log(rowQuantity);
    		if(rowQuantity)
    		{
    			var rowtot=$(row).find("td:eq(7)").children("span").html();
    			//console.log('row tot',rowtot);
    			totalQuantity+=convertNumbersToDec(rowQuantity)-0;
    			totalRow+=convertNumbersToDec(rowtot)-0;
    		}
    		
    	});


    	$("#pureSumCart").find("tr:eq(1)").find("td:eq(0)").children('input').val(totalQuantity);
    	$("#pureSumCart").find("tr:eq(1)").find("td:eq(2)").children('input').val(totalRow);

    	var tax_rate=$("#tax_rate").val();
    	var calcTax=0;
    	if(tax_rate>0)
    	{
    		calcTax=convertNumbersToDec((totalRow*tax_rate)/100);
    		$("#tax_amount").val(calcTax);
    	}

    	initiateDiscount();

    	var discountCalc=convertNumbersToDec($("#disc_calc_amount").val());

    	var subTotal=((totalRow-0)+(calcTax-0))-discountCalc;

    	$("#sub_total_aft_disc").val(subTotal);

    	console.log(totalQuantity,totalRow);

    }

    $("#cash_received").keyup(function(){
    	var cashrec=convertNumbersToDec($(this).val());
    	var subTotal=convertNumbersToDec($("#sub_total_aft_disc").val());
    	var changeAmount=0;
    	if(cashrec>subTotal)
    	{
    		var changeAmountd=convertNumbersToDec(cashrec-subTotal);
    		if(changeAmountd>0)
    		{
    			changeAmount=changeAmountd;
    		}
    	}
    	$("#change_amount").val(changeAmount);
    });

    $('#removetable').on('click', '.deleterow', function () {
        $(this).parents('tr').remove();
        calculateRowSum();
    });
</script>
@endsection

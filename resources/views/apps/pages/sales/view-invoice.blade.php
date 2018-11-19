@extends('apps.layout.master')
@section('title','View Invoice')
@section('breadcrumb','Sales / Invoice / View Sales Invoice')
@section('breadcrumb_page','Sales / Invoice / View Sales Invoice')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">View Sales Invoice</legend>
	                <form method="post" action="">
	                <div class="col-md-12" >
	                   


						    <div class="row">
						        <div class="col-xs-12">
						        	<div class="invoice-title">
						    			<h3>Order # INV-{{$invoice->id}}</h3>
						    		</div>
						    		<hr>
						    		<div class="row">
						    			<div class="col-xs-6">
						    				<address>
						    				<strong>Billed To:</strong><br>
						    					{{$invoice->customer_name}}<br>
						    					{{$customerInfo->phone}}<br>
						    					{{$customerInfo->address}}<br>
						    				</address>
						    			</div>
						    			<div class="col-xs-6 text-right">
						    				<img alt="{{$storeInfo->company_name}}" width="206" height="103" src="{{url('upload/setup/'.$storeInfo->logo)}}">
						    			</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-xs-6">
						    				<address>
						    					<strong>Payment Method:</strong><br>
						    					{{$invoice->tender_name}}<br><br>
						    					<strong>Order Created :</strong><br>
						    					{{date('M d, Y',strtotime($invoice->created_at))}}
						    				</address>
						    			</div>
						    			<div class="col-xs-6 text-right" style="margin-bottom: 20px;">
						    				<div style="display: block; margin-bottom: 20px; padding-top: 20px;">
						    					<table align="right" style="width: 196px;">
						    						<tr>
						    							<td align="left"><b>Order ID</b></td>
						    							<td align="left">INV-{{$invoice->id}}</td>
						    						</tr>
						    						<tr>
						    							<td align="left"><b>Discount</b></td>
						    							<td align="left">@if($invoice->discount_type==1)
						    									{{$invoice->discount_rate}}%
						    							   @elseif($invoice->discount_type==2)
						    							   		tk. {{$invoice->discount_rate}}
						    							   @endif</td>
						    						</tr>
						    						<tr>
						    							<td align="left"><b>Tax Rate</b></td>
						    							<td align="left">{{$invoice->tax_rate}}%</td>
						    						</tr>
						    					</table>
						    					
						    					<br>
						    					<br>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						    </div>
						    
						    <div class="row">
						    	<div class="col-md-12">
						    		<div class="panel panel-default">
						    			<div class="panel-heading">
						    				<h3 class="panel-title"><strong>Order summary</strong></h3>
						    			</div>
						    			<div class="panel-body">
						    				<div class="table-responsive">
						    					<table class="table table-condensed">
						    						<thead>
						                                <tr>
						        							<td><strong>Item</strong></td>
						        							<td class="text-center"><strong>Price</strong></td>
						        							<td class="text-center"><strong>Quantity</strong></td>
						        							<td class="text-right"><strong>Totals</strong></td>
						                                </tr>
						    						</thead>
						    						<tbody>
						    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
						    							<?php 
						    							$subtotal=0;
						    							?>
						    							@if(isset($invoice_product))
							    							@foreach($invoice_product as $row)
								    							<tr>
								    								<td>(PRO-{{$row->product_id}}) {{$row->product_name}}</td>
								    								<td class="text-center">Tk. {{$row->price}}</td>
								    								<td class="text-center">{{$row->quantity}}</td>
								    								<td class="text-right">Tk. {{$row->total_price}}</td>
								    							</tr>
								    							<?php $subtotal+=$row->total_price; ?>
							    							@endforeach
						    							@endif
						                                
						    							<tr>
						    								<td class="thick-line"></td>
						    								<td class="thick-line"></td>
						    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
						    								<td class="thick-line text-right">Tk. {{$subtotal}}</td>
						    							</tr>
						    							<tr>
						    								<td class="no-line"></td>
						    								<td class="no-line"></td>
						    								<td class="no-line text-center"><strong>Tax ({{$invoice->tax_rate}}%)</strong></td>
						    								<td class="no-line text-right">Tk. {{$invoice->total_tax}}</td>
						    							</tr>
						    							<tr>
						    								<td class="no-line"></td>
						    								<td class="no-line"></td>
						    								<td class="no-line text-center"><strong>Discount 
						    									@if($invoice->discount_type==1)
																	({{$invoice->discount_rate}}%)
						    									@endif
						    									
						    								</strong></td>
						    								<td class="no-line text-right">Tk. {{$invoice->discount_amount}}</td>
						    							</tr>
						    							<tr>
						    								<td class="no-line"></td>
						    								<td class="no-line"></td>
						    								<td class="no-line text-center"><strong>Total</strong></td>
						    								<td class="no-line text-right">Tk. {{$invoice->total_amount}}</td>
						    							</tr>
						    						</tbody>
						    					</table>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
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

@section('css')
	<style type="text/css">
		.invoice-title h2, .invoice-title h3 {
		    display: inline-block;
		}

		.table > tbody > tr > .no-line {
		    border-top: none;
		}

		.table > thead > tr > .no-line {
		    border-bottom: none;
		}

		.table > tbody > tr > .thick-line {
		    border-top: 2px solid;
		}
	</style>
@endsection
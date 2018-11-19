@extends('apps.layout.master')
@section('title','Invoice List')
@section('breadcrumb','Sales/Invoice List')
@section('breadcrumb_page','Sales/Invoice List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Sales/Invoice List :</legend>
	                <form method="post" action="">
	                <div class="col-md-10 col-md-offset-1" >
	                   <div class="table-responsive" >
	                         <table class="table">
	                            <thead style="background-color: #ededed">
	                               <tr>
	                                 <th>#</th>
	                                 <th>Customer Name</th>
	                                 <th>Tender</th>
	                                 <th>Tax</th>
	                                 <th>Discount</th>
	                                 <th>Total Cost</th>
	                                 <th>Invoice Total</th>
	                                 <th>Profit</th>
	                                 <th>Action</th>
	                               </tr>
	                             </thead>
	                            <tbody>
	                               @if(isset($data))
	                               @foreach($data as $row)
	                               <tr>
	                                 <td>INV-{{$row->id}}</td>
	                                 <td>{{$row->customer_name}}</td>
	                                 <td>{{$row->tender_name}}</td>
	                                 <td>Tk. {{$row->total_tax}}({{$row->tax_rate}}%)</td>
	                                 <td>Tk. {{$row->discount_amount}}</td>
	                                 <td>Tk. {{$row->total_cost}}</td>
	                                 <td>Tk. {{$row->total_amount}}</td>
	                                 <td>Tk. {{$row->total_profit}}</td>
	                                 <td>
	                                 	<a href="{{url('sales/payment/history/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-money" aria-hidden="true"></i></a>
	                                 	<a href="{{url('sales/detail/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-file" aria-hidden="true"></i></a>
	                                 </td>
	                               </tr>
	                               @endforeach
	                               @endif
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

@section('css')

@endsection
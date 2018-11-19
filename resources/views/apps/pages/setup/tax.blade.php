@extends('apps.layout.master')
@section('title','Tax Management')
@section('breadcrumb','Tax Management')
@section('breadcrumb_page','Tax Management')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
           <div class="col-md-6" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Tax Name:</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                              
                              @if(!empty($data))
                                action="{{url('tax-update/'.$data->id)}}"
                              @else
                              action="{{url('tax-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed;">
                                  <tbody class="text-center">
                                     <tr>
                                       <td>Name </td>
                                       <td><input type="text" name="name" placeholder="Tax Name" @if(!empty($data)) value="{{$data->name}}" @endif  class="form-control"></td>
                                     </tr>
                                     <tr>
                                       <td>Rate (%) </td>
                                       <td><input type="text" name="rate_amount" placeholder="Tax Rate" @if(!empty($data)) value="{{$data->rate_amount}}" @endif  class="form-control"></td>
                                     </tr>
                                     <tr>
                                       <td colspan="2">
                                       	<input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="Update" @endif value="Save">
                                       	<input type="reset" class="btn btn-default btn-raised" value="Cancle">
                                       </td>
                                     </tr>
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
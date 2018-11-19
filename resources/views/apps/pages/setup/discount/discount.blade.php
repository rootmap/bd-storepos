@extends('apps.layout.master')
@section('title','Discount')
@section('breadcrumb','Discount')
@section('breadcrumb_page','Discount')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
            @include('apps.include.msg')
           <div class="col-md-5" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Discount :</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                     
                           @if(!empty($data))
                              action="{{url('discount-update/'.$data->id)}}"
                           @else
                           action="{{url('discount-add')}}"
                           @endif
                           >
                           {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Discount Type</td>
	                                 <td>
	                                 	<select class="form-control" name="discount_type_id">
                                          <option readonly>Select Discount Management</option>
                                          @if(isset($dis))
                                          @foreach($dis as $row)
                                             <option value="{{$row->id}}">{{$row->discount_types_name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
	                                 </td>
	                               </tr>
	                               <tr>
	                                 <td>Name</td>
	                                 <td><input type="text" name="name" class="form-control"></td>
	                               </tr>
	                               <tr>
	                                 <td>Price</td>
	                                 <td><input type="text" name="price" class="form-control"></td>
	                               </tr>
                                  <tr>
                                    <td></td>
                                       <td>
                                          <label><input type="checkbox"  value="2" name="is_active"><span style="margin-left: 10px;">Is Active</span></label>
                                  </td>
                                  </tr>

	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" value="Save">
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
                <legend class="scheduler-border">Discount List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Discount Type</th>
                                       <th>Name</th>
                                       <th>Price</th>
                                       <th>Active</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->discount_types_name}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->price}}</td>
                                       <td>
                                          <?php 
                                             if($row->is_active=='2')
                                             {
                                                echo 'Active';
                                             }
                                             else
                                             {
                                                echo 'Inactive';
                                             }  
                                          ?>
                                                   
                                          </td>
                                       <td>
                                          <a href="" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
@extends('apps.layout.master')
@section('title','Brand')
@section('breadcrumb','Brand')
@section('breadcrumb_page','Brand')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
            @include('apps.include.msg')
           <div class="col-md-5" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Brand info :</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                     
                           @if(!empty($data))
                              action="{{url('brand-update/'.$data->id)}}"
                           @else
                           action="{{url('brand-add')}}"
                           @endif
                           >
                           {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               
	                               <tr>
	                                 <td>Name</td>
	                                 <td><input type="text" @if(!empty($data)) value="{{$data->name}}" @endif name="name" class="form-control"></td>
	                               </tr>
	                               <tr>
                                    <td></td>
                                       <td>
                                          <label><input type="checkbox"  
                                            <?php 
                                             if(!empty($data->is_active)=='2')
                                             {
                                                echo 'checked="checked"';
                                             }
                                             else
                                             {
                                                echo 'value="2"';
                                             }  
                                          ?>

                                            name="is_active"><span style="margin-left: 10px;">Is Active</span></label>
                                  </td>
                                  </tr>

	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" @if(!empty($data)) value="Update" @endif value="Save">
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
                <legend class="scheduler-border">Brand List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Active</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->name}}</td>
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
                                          <a href="{{url('brand/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{url('brand/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
@extends('apps.layout.master')
@section('title','Shop To Shop User Transfer')
@section('breadcrumb','Shop To Shop User Transfer')
@section('breadcrumb_page','Shop To Shop User Transfer')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
          @include('apps.include.msg')
           <div class="col-md-5" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">Shop To Shop User Transfer :</legend>
                          <div class="table-responsive" >
                            <form enctype="multipart/form-data" method="post" 
                    
                              @if(!empty($data))
                                action="{{url('shopToshopTrns-update/'.$data->id)}}"
                              @else
                              action="{{url('shopToshopTrns-add')}}"
                              @endif
                              >
                              {{ csrf_field() }}
                              <table class="table" style="background-color: #ededed;">
                                  <tbody class="text-center">
                                     <tr>
                                       <td>User Name </td>
                                       <td>
                                          <select class="form-control" name="user_id">
                                              <option readonly>Select User Name</option>
                                              @if(isset($StoreUser))
                                              @foreach($StoreUser as $row)
                                                <option
                                                @if(isset($data)) 
                                                    @if($data->user_id==$row->id) 
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
                                       <td>Old Shop Name </td>
                                       <td>
                                        <select class="form-control" name="old_shop_id">
                                            <option readonly>Select Old Shop Name</option>
                                            @if(isset($ShopInfo))
                                            @foreach($ShopInfo as $row)
                                              <option
                                              @if(isset($data)) 
                                                  @if($data->old_shop_id==$row->id) 
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
                                       <td>New Shop Name </td>
                                       <td>
                                          <select class="form-control" name="new_shop_id">
                                            <option>Select New Shop Name</option>
                                            @if(isset($ShopInfo))
                                            @foreach($ShopInfo as $row)
                                              <option
                                              @if(isset($data)) 
                                                  @if($data->new_shop_id==$row->id) 
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
                                       <td colspan="2">
                                       	<input type="submit" class="btn btn-default btn-raised" @if(isset($data)) value="Update" @endif value="Save">
                                       	<input type="reset" class="btn btn-default btn-raised" value="Cancle">
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
                <legend class="scheduler-border">Shop To Shop User Transfer List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>User Name</th>
                                       <th>New Shop Name</th>
                                       <th>Old Shop Name</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(isset($json))
                                    @foreach($json as $row)
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->username}}</td>
                                       <td>{{$row->new_shop_name}}</td>
                                       <td>{{$row->old_shop_name}}</td>
                                       <td>
                                          <a href="{{url('shopToshopTrns/edit/'.$row->id)}}" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{url('shopToshopTrns/delete/'.$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
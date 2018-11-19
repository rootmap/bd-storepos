@extends('apps.layout.master')
@section('title','User Role')
@section('breadcrumb','User Role')
@section('breadcrumb_page','User Role')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
           <div class="col-md-6" >
	            <fieldset class="scheduler-border">
	              <legend class="scheduler-border">User Role :</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table class="table" style="background-color: #ededed;">
                                  <tbody class="text-center">
                                     <tr>
                                       <td>User Type </td>
                                       <td><input type="text" placeholder="User Type Name" class="form-control"></td>
                                     </tr>
                                     <tr>
                                       <td colspan="2">
                                       	<input type="submit" class="btn btn-default btn-raised" value="Save">
                                       	<input type="reset" class="btn btn-default btn-raised" value="Cancle">
                                       </td>
                                     </tr>
                                  </tbody>
                              </table>
                            </form>
                          </div>
    	               </fieldset>
                  </div>
                  <div class="col-md-5 col-md-offset-1">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">User Role List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table class="table" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
                                       <th>Name</th>
                                       <th>Action</th>
                                     </tr>
                                   </thead>
                                  <tbody>
                                     <tr>
                                       <td>Demo Cashier</td>
                                       <td>
                                        <a href="" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
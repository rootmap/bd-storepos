@extends('apps.layout.master')
@section('title','Home')
@section('breadcrumb','User')
@section('breadcrumb_page','User')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">User Info :</legend>
	                <form method="post" action="">
	                <div class="col-md-8 col-md-offset-2" >
	                   <div class="table-responsive" >
	                         <table class="table" style="background-color: #ededed">
	                            <tbody>
	                               <tr>
	                                 <td>Name</td>
	                                 <td>Md. Fakhrul Islam Talukder</td>
	                               </tr>
	                               <tr>
	                                 <td>Email</td>
	                                 <td>fakhrulislamtalukder@gmail.com</td>
	                               </tr>
	                               <tr>
	                                 <td>Mobile</td>
	                                 <td>01977136045</td>
	                               </tr>
	                               <tr>
	                                 <td>Address</td>
	                                 <td>20/2, mdpur ltd 1</td>
	                               </tr>
	                               <tr>
	                                 <td>Photo</td>
	                                 <td>
	                                 	<img src="{{url('theme/images/fahad.JPG')}}" width="200">
            						 </td>
	                               </tr>
	                               <tr>
	                                 <td>User Role</td>
	                                 <td>Demo Cashier</td>
	                               </tr>
	                               <tr>
	                                 <td colspan="5" class="text-center">
	                                  <input type="submit" class="btn btn-default btn-raised" value="Edit Profile">
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
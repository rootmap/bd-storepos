@extends('apps.layout.master')
@section('title','Setup')
@section('breadcrumb','Company Info')
@section('breadcrumb_page','Setup')
@section('content')
<div class="content">
 <div class="container">
    <div class="row">
       <div class="col-md-12">
          <fieldset class="scheduler-border">
              <legend class="scheduler-border">Basic Info:</legend>
                <form method="post" action="">
                  <div class="col-md-12" >
                     <div class="table-responsive" >
                           <table class="table" style="background-color: #ededed">
                              <tbody>
                                 <tr>
                                   <td>Company Name</td>
                                   <td><input type="text" class="form-control" autofocus></td>
                                   <td>&nbsp;</td>
                                   <td>Logo</td>
                                   <td><input type="file" class="form-control-file" ></td>
                                 </tr>
                                 <tr>
                                   <td>Address</td>
                                   <td><textarea class="form-control" rows="2" id="comment"></textarea></td>
                                   <td>&nbsp;</td>
                                   <td>Email</td>
                                   <td><input type="email" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Phone Number</td>
                                   <td><input type="text" class="form-control"></td>
                                   <td>&nbsp;</td>
                                   <td>Vat No</td>
                                   <td><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Company Reg. No</td>
                                   <td><input type="text" class="form-control"></td>
                                   <td>&nbsp;</td>
                                   <td>Store ID</td>
                                   <td><input type="text" class="form-control" readonly=""></td>
                                 </tr>
                                 <tr>
                                   <td colspan="5" class="text-center">
                                    <input type="submit" class="btn btn-default btn-raised" value="Save">
                                    <input type="reset" class="btn btn-default" value="Cancel">
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
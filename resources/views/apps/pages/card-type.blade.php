@extends('apps.layout.master')
@section('title','Home')
@section('breadcrumb','Search')
@section('breadcrumb_page','Search Items')
@section('content')
<div class="content">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
                 <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Basic Info:</legend>
                    <form method="post" action="">
                       <div class="col-md-7 col-md-offset-3"  style="background-color: #ededed; padding: 15px;">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Card Type</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="card-type">
                              <option >Select Your Card Type</option>            
                              <option value="bKash">bKash</option>                                 
                              <option value="DBBL">DBBL mobile banking</option>
                              <option value="UCash">UCash</option>
                              <option value="mCash">IBBL (mCash)</option>
                              <option value="IFIC">IFIC mobile banking</option>
                              <option value="MyCash">MBL (MyCash)</option>
                              <option value="Telecash">Telecash</option>
                              <option value="Bank">Bank Account</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group showDiv" id="Mobile" style="display: none">
                          <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Mobile Number">
                          </div>
                        </div>
                        <div class="showDiv" id="Bank" style="display: none">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Bank Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Account Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Account Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Account Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Account Number">
                            </div>
                          </div>
                        </div>
                          
                          <div class="form-group">
                            {{-- <label for="inputEmail3" class="col-sm-3 control-label">Account Number</label> --}}
                            <div class="col-sm-9 text-center" style="margin-top: 10px;">
                              <input type="submit" class="btn btn-default btn-raised" value="Save">
                               <input type="reset" class="btn btn-default" value="Cancel">
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
@endsection

@section('css')
<style type="text/css">
  .form-group{
   margin-bottom: 40px;
  }
</style>
@endsection
@section('js')
<script>
    $(function() {
      $('#card-type').change(function(){

         if ($("#card-type").val() == "bKash") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "DBBL") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "UCash") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "mCash") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "IFIC") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "MyCash") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else if ($("#card-type").val() == "Telecash") {
          $('.showDiv').hide();
          $('#Mobile').show();
         }
         else {
          $('.showDiv').hide();
          $('#Bank').show();
         }
      });
    });
  </script>
@endsection
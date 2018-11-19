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
                       <div class="col-md-6 col-md-offset-3" >
                          <div class="table-responsive" >
                             <table class="table" style="background-color: #ededed;">
                                <tbody class="text-center">
                                   <tr>
                                     <td>Search</td>
                                     <td><input type="text" class="form-control"></td>
                                   </tr>
                                   <tr>
                                     <td colspan="2"><input type="submit" class="btn btn-default btn-raised" value="Find"></td>
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
@endsection
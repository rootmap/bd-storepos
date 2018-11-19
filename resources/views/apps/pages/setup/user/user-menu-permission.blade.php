@extends('apps.layout.master')
@section('title','User Menu Permission')
@section('breadcrumb','User Menu Permission')
@section('breadcrumb_page','User Menu Permission')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
	          <fieldset class="scheduler-border">
	              <legend class="scheduler-border">User Permission :</legend>
	                <form method="post" action="">
                       <div class="col-md-6 col-md-offset-3" >
                          <div class="table-responsive" >
                             <table class="table" style="background-color: #ededed;">
                                <tbody class="text-center">
                                   <tr>
                                     <td>User Type </td>
                                     <td>
                                     	<select class="form-control" id="card-type">
			                              <option >Select User Type</option>            
			                              <option value="cashier">Cashier</option>                                 
			                              <option value="admin">Admin</option>
			                            </select>
			                        </td>
                                   </tr>
                                   <tr>
                                   	<td>Select Permission</td>
                                   	<td>
                                   		<div id="treeview_container" class="hummingbird-treeview h-scroll-large">
										   <!-- <div id="treeview_container" class="hummingbird-treeview"> -->
										   <ul id="treeview" class="hummingbird-base">
										      <li>
										         <i class="fa fa-minus"></i> <label> <input id="node-0" data-id="custom-0" type="checkbox"> node-0</label>
										         <ul style="display: block;">
										            <li>
										               <i class="fa fa-plus"></i> <label> <input id="node-0-1" data-id="custom-1" type="checkbox">  node-0-1</label>
										               <ul>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-1-1" data-id="custom-1-1" type="checkbox"> node-0-1-1</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-1-1" data-id="custom-1-1-1" type="checkbox"> node-0-1-1-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-1-2" data-id="custom-1-1-2" type="checkbox"> node-0-1-1-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-1-3" data-id="custom-1-1-3" type="checkbox"> node-0-1-1-3</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="double1" data-id="custom-1-1-3" type="checkbox">  node-0-1-1-3</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="double2" data-id="custom-1-1-3" type="checkbox">  node-0-1-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-1-2" data-id="custom-1-2" type="checkbox"> node-0-1-2</label>
										                     <ul>
										                        <li style="color: rgb(200, 200, 200);"><label> <input class="hummingbirdNoParent" id="node-0-1-2-1" data-id="custom-1-2-1" type="checkbox" disabled=""> node-0-1-2-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-2-2" data-id="custom-1-2-2" type="checkbox"> node-0-1-2-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-2-3" data-id="custom-1-2-3" type="checkbox"> node-0-1-2-3</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="double3" data-id="custom-1-1-3" type="checkbox">  node-0-1-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-1-3" data-id="custom-1-3" type="checkbox"> node-0-1-3</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-3-1" data-id="custom-1-3-1" type="checkbox"> node-0-1-3-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-3-2" data-id="custom-1-3-2" type="checkbox"> node-0-1-3-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-3-3" data-id="custom-1-3-3" type="checkbox"> node-0-1-3-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-1-4" data-id="custom-1-4" type="checkbox"> node-0-1-4</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-4-1" data-id="custom-1-4-1" type="checkbox"> node-0-1-4-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-4-2" data-id="custom-1-4-2" type="checkbox"> node-0-1-4-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-1-4-3" data-id="custom-1-4-3" type="checkbox"> node-0-1-4-3</label></li>
										                     </ul>
										                  </li>
										               </ul>
										            </li>
										            <li>
										               <i class="fa fa-plus"></i> <label> <input id="node-0-2" data-id="custom-2" type="checkbox">  node-0-2</label>
										               <ul>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-2-1" data-id="custom-2-1" type="checkbox"> node-0-2-1</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-1-1" data-id="custom-2-1-1" type="checkbox"> node-0-2-1-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-1-2" data-id="custom-2-1-2" type="checkbox"> node-0-2-1-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-1-3" data-id="custom-2-1-3" type="checkbox"> node-0-2-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-2-2" data-id="custom-2-2" type="checkbox"> node-0-2-2</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-2-1" data-id="custom-2-2-1" type="checkbox"> node-0-2-2-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-2-2" data-id="custom-2-2-2" type="checkbox"> node-0-2-2-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-2-3" data-id="custom-2-2-3" type="checkbox"> node-0-2-2-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-2-3" data-id="custom-2-3" type="checkbox"> node-0-2-3</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-3-1" data-id="custom-2-3-1" type="checkbox"> node-0-2-3-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-3-2" data-id="custom-2-3-2" type="checkbox"> node-0-2-3-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-3-3" data-id="custom-2-3-3" type="checkbox"> node-0-2-3-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-2-4" data-id="custom-2-4" type="checkbox"> node-0-2-4</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-4-1" data-id="custom-2-4-1" type="checkbox"> node-0-2-4-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-4-2" data-id="custom-2-4-2" type="checkbox"> node-0-2-4-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-2-4-3" data-id="custom-2-4-3" type="checkbox"> node-0-2-4-3</label></li>
										                     </ul>
										                  </li>
										               </ul>
										            </li>
										            <li>
										               <i class="fa fa-plus"></i> <label> <input id="node-0-3" data-id="custom-3" type="checkbox">  node-0-3</label>
										               <ul>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-3-1" data-id="custom-3-1" type="checkbox"> node-0-3-1</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-1-1" data-id="custom-3-1-1" type="checkbox"> node-0-3-1-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-1-2" data-id="custom-3-1-2" type="checkbox"> node-0-3-1-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-1-3" data-id="custom-3-1-3" type="checkbox"> node-0-3-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-3-2" data-id="custom-3-2" type="checkbox"> node-0-3-2</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-2-1" data-id="custom-3-2-1" type="checkbox"> node-0-3-2-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-2-2" data-id="custom-3-2-2" type="checkbox"> node-0-3-2-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-2-3" data-id="custom-3-2-3" type="checkbox"> node-0-3-2-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-3-3" data-id="custom-3-3" type="checkbox"> node-0-3-3</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-3-1" data-id="custom-3-3-1" type="checkbox"> node-0-3-3-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-3-2" data-id="custom-3-3-2" type="checkbox"> node-0-3-3-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-3-3" data-id="custom-3-3-3" type="checkbox"> node-0-3-3-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-3-4" data-id="custom-3-4" type="checkbox"> node-0-3-4</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-4-1" data-id="custom-3-4-1" type="checkbox"> node-0-3-4-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-4-2" data-id="custom-3-4-2" type="checkbox"> node-0-3-4-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-3-4-3" data-id="custom-3-4-3" type="checkbox"> node-0-3-4-3</label></li>
										                     </ul>
										                  </li>
										               </ul>
										            </li>
										            <li>
										               <i class="fa fa-plus"></i> <label> <input id="node-0-4" data-id="custom-4" type="checkbox">  node-0-4</label>
										               <ul>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-4-1" data-id="custom-4-1" type="checkbox"> node-0-4-1</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-1-1" data-id="custom-4-1-1" type="checkbox"> node-0-4-1-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-1-2" data-id="custom-4-1-2" type="checkbox"> node-0-4-1-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-1-3" data-id="custom-4-1-3" type="checkbox"> node-0-4-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-4-2" data-id="custom-4-2" type="checkbox"> node-0-4-2</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-2-1" data-id="custom-4-2-1" type="checkbox"> node-0-4-2-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-2-2" data-id="custom-4-2-2" type="checkbox"> node-0-4-2-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-2-3" data-id="custom-4-2-3" type="checkbox"> node-0-4-2-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-4-3" data-id="custom-4-3" type="checkbox"> node-0-4-3</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-3-1" data-id="custom-4-3-1" type="checkbox"> node-0-4-3-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-3-2" data-id="custom-4-3-2" type="checkbox"> node-0-4-3-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-3-3" data-id="custom-4-3-3" type="checkbox"> node-0-4-3-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-4-4" data-id="custom-4-4" type="checkbox"> node-0-4-4</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-4-1" data-id="custom-4-4-1" type="checkbox"> node-0-4-4-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-4-2" data-id="custom-4-4-2" type="checkbox"> node-0-4-4-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-4-4-3" data-id="custom-4-4-3" type="checkbox"> node-0-4-4-3</label></li>
										                     </ul>
										                  </li>
										               </ul>
										            </li>
										            <li>
										               <i class="fa fa-plus"></i> <label> <input id="node-0-5" data-id="custom-5" type="checkbox">  node-0-5</label>
										               <ul>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-5-1" data-id="custom-5-1" type="checkbox"> node-0-5-1</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-1-1" data-id="custom-5-1-1" type="checkbox"> node-0-5-1-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-1-2" data-id="custom-5-1-2" type="checkbox"> node-0-5-1-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-1-3" data-id="custom-5-1-3" type="checkbox"> node-0-5-1-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-5-2" data-id="custom-5-2" type="checkbox"> node-0-5-2</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-2-1" data-id="custom-5-2-1" type="checkbox"> node-0-5-2-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-2-2" data-id="custom-5-2-2" type="checkbox"> node-0-5-2-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-2-3" data-id="custom-5-2-3" type="checkbox"> node-0-5-2-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-5-3" data-id="custom-5-3" type="checkbox"> node-0-5-3</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-3-1" data-id="custom-5-3-1" type="checkbox"> node-0-5-3-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-3-2" data-id="custom-5-3-2" type="checkbox"> node-0-5-3-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-3-3" data-id="custom-5-3-3" type="checkbox"> node-0-5-3-3</label></li>
										                     </ul>
										                  </li>
										                  <li>
										                     <i class="fa fa-plus"></i> <label> <input id="node-0-5-4" data-id="custom-5-4" type="checkbox"> node-0-5-4</label>
										                     <ul>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-4-1" data-id="custom-5-4-1" type="checkbox"> node-0-5-4-1</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-4-2" data-id="custom-5-4-2" type="checkbox"> node-0-5-4-2</label></li>
										                        <li><label> <input class="hummingbirdNoParent" id="node-0-5-4-3" data-id="custom-5-4-3" type="checkbox"> node-0-5-4-3</label></li>
										                     </ul>
										                  </li>
										               </ul>
										            </li>
										         </ul>
										      </li>
										      <li>
										         <i class="fa fa-plus"></i> <label> <input id="node-1" data-id="custom-1" type="checkbox"> node-1</label>
										         <ul>
										            <li><label> <input class="hummingbirdNoParent" id="node-1-1" data-id="custom-1-1" type="checkbox">  node-1-1</label></li>
										            <li><label> <input class="hummingbirdNoParent" id="node-1-2" data-id="custom-1-2" type="checkbox">  node-1-2</label></li>
										            <li><label> <input class="hummingbirdNoParent" id="node-1-3" data-id="custom-1-3" type="checkbox">  node-1-3</label></li>
										            <li><label> <input class="hummingbirdNoParent" id="node-1-4" data-id="custom-1-4" type="checkbox">  node-1-4</label></li>
										            <li><label> <input class="hummingbirdNoParent" id="node-1-5" data-id="custom-1-5" type="checkbox">  node-1-5</label></li>
										         </ul>
										      </li>
										   </ul>
										</div>
										<button class="btn btn-primary" id="checkAll">Check All</button>
										<button class="btn btn-primary" id="uncheckAll">Uncheck All</button>
										<button class="btn btn-danger" id="checkNode">Check Node 0-2-2</button>
										</div>
                                   	</td>
                                   </tr>
                                   <tr>
                                     <td colspan="2">
                                     	<input type="submit" class="btn btn-default btn-raised" value="Save">
                                     	<input type="reset" class="btn btn-default btn-raised" value="Cancle">
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

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('theme/css/hummingbird-treeview-1.3.css')}}">
@endsection
@section('js')
<script type="text/javascript" src="{{url('theme/js/hummingbird-treeview-1.3.js')}}"></script>
<script>
$("#treeview").hummingbird();
$( "#checkAll" ).click(function() {
  $("#treeview").hummingbird("checkAll");
});
$( "#uncheckAll" ).click(function() {
  $("#treeview").hummingbird("uncheckAll");
});
$( "#collapseAll" ).click(function() {
  $("#treeview").hummingbird("collapseAll");
});
$( "#checkNode" ).click(function() {
  $("#treeview").hummingbird("checkNode",{attr:"id",name: "node-0-2-2",expandParents:false});
});
</script>
@endsection
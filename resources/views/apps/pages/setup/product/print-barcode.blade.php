@extends('apps.layout.master')
@section('title','Print Barcode From Product List')
@section('breadcrumb','Print Barcode From Product List')
@section('breadcrumb_page','Print Barcode From Product List')
@section('content')
<div class="content">
	 <div class="container">
	    <div class="row">
	       <div class="col-md-12">
              <div class="col-md-12">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Print Barcode From Product List:</legend>
                          <div class="table-responsive" >
                            <form method="post" action="">
                              <table id="tableData" class="table table-bordered table-striped" style="background-color: #ededed;">
                                  <thead style="background-color: #ededed">
                                     <tr>
                                       <th>Barcode</th>
                                       <th>Product Name</th>
                                       <th>Quantity In Stock</th>
                                       <th>Price</th>
                                       <th>Cost</th>
                                       <th>Product Added</th>
                                       <th>Total Price</th>
                                       <th>Total Cost</th>
                                       <th>Action</th>
                                     </tr>
                                   </thead>
                                  <tbody>
                                     <tr>
                                       @if(isset($data))
                                    @foreach($data as $row)
                                     <tr>
                                       <td>{{$row->barcode}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->quantity}}</td>
                                       <td>{{$row->price}}</td>
                                       <td>{{$row->cost}}</td>
                                       <td>{{$row->created_at}}</td>
                                       <td>
                                        <?php 
                                          echo $totalprice = ($row->quantity * $row->price);
                                        ?>
                                        </td>
                                       <td>
                                        <?php 
                                          echo $totalcost = ($row->quantity * $row->cost);
                                        ?>
                                       </td>
                                       <td>
                                        <button type="button" data-product-barcode="{{$row->barcode}}"  data-product="{{$row->id}}" class="btn btn-primary exampleModal_pro">
                  										  Print Barcode
                  										</button>
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

	<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content"> 
          <form action="{{url('print-barcode')}}" method="POST">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Print Barcode</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
  		        <table class="table" style="background-color: #ededed;">
                  <tbody class="text-center">
                     <tr>
                       <td>Quantity </td>
                       <td>

                          <input type="text" name="quantity" class="form-control">
                          <input type="hidden" name="pid" value="0">
                          <input type="hidden" name="pid_barcode" value="0">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                       </td>
                     </tr>
                  </tbody>
              </table>
           
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Print Bracode</button>
		      </div>
           </form>
		    </div>
		  </div>
		</div>
@endsection

@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{url('theme/js/paging.js')}}"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableData').paging({limit:15}); 
        $(".exampleModal_pro").click(function(){
            var pid=$(this).attr("data-product");
            var pid_barcode=$(this).attr("data-product-barcode");
            $("#exampleModal").modal('show');
            $("input[name=pid]").val(pid);
            $("input[name=pid_barcode]").val(pid_barcode);
        });
    });
</script>
@endsection
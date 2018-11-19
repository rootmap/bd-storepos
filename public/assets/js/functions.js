$(function(){
	$("body").on('click','#productList tbody .edit_product',function(event){
		event.preventDefault();
		var $button = $(this);
		var product_id = $button.attr('data');
		$.ajax({
			method:'POST',
			url:'editProduct.php',
			dataType:'json',
			data:{
				product_id:product_id,
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$(".modal#edit_product_modal").modal('show');
					$("#edit_product_modal #product_name").val(response.product_name);
					$("#edit_product_modal #stock_quantity").val(response.stock_quantity);
					$("#edit_product_modal #price_per_item").val(response.price_per_item);
					$("#edit_product_modal #product_id").val(response.product_id);
					$("#edit_product_modal #cost_per_item").val(response.cost_per_item);
                                        $("#edit_product_modal #product_priority").val(response.product_priority);
				}
				console.log(response);
			}
		})
	});
});
$(function(){
	$("body").on('click','#customers tbody .edit_customer',function(event){
		event.preventDefault();
		var $button = $(this);
		var customer_id = $button.attr('data');
		$.ajax({
			method:'POST',
			url:'customer_edit.php',
			dataType:'json',
			data:{
				customer_id:customer_id,
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$(".modal#edit_product_modal").modal('show');
					$("#edit_product_modal #customer_name").val(response.customer_name);
					$("#edit_product_modal #customer_address").val(response.customer_address);
					$("#edit_product_modal #customer_phone").val(response.customer_phone);
					$("#edit_product_modal #customer_id").val(response.customer_id);
					$("#edit_product_modal #customer_email").val(response.customer_email);
				}
				console.log(response);
			}
		})
	});
});
function loadProductTable(){
	$.ajax({
		url:"loadProductTable.php",
		method:'POST',
		dataType:'json',
		success:function(response){
			$("table#productList tbody").html(response.html);
		}
	});
}

function loadInvoiceTable(){
	$.ajax({
		url:"loadInvoiceTable.php",
		method:'POST',
		dataType:'json',
		success:function(response){
			$("table#invoiceList tbody").html(response.html);
		}
	});
}

function invoiceDetails(invid){
	var url = "invoice_detail.php?invoiceid="+invid;
	window.location=url;
}

function invoiceEditDetails(invid){
	var url = "invoice_edit_detail.php?invoiceid="+invid;
	window.location=url;
}

function deleteProduct(pid){
	var url = "deleteProduct.php?product_id="+pid;
	$.post(url,loadProductPage);
}

function deleteInvoice(invid){
	var url = "deleteInvoice.php?invoice_id="+invid;
	$.post(url,loadInvoicePage);
}

function deleteVariance(vid){
	$.ajax({
		url:"deleteVariance.php",
		method:'POST',
		data:'varianceid='+vid,
		success:function(response){
			$("table#invoiceList tbody").html(response);
		}
	});
}
function deleteStockInvoice(stockid){
	$.ajax({
		url:"deleteStockInvoice.php",
		method:'POST',
		data:'stockinvoiceid='+stockid,
		success:function(response){
			$("table#invoiceList tbody").html(response);
		}
	});
}

function OneStepUpProduct(pid,priority){
	$.ajax({
		url:"priority.php",
		method:'POST',
		data:'pid='+pid+'&priority='+priority+'&status=min',
		success:function(response){
                    loadProductTable();
		}
	});
}

function OneStepDownProduct(pid,priority){
	$.ajax({
		url:"priority.php",
		method:'POST',
		data:'pid='+pid+'&priority='+priority+'&status=plus',
		success:function(response){
                    loadProductTable();
		}
	});
}


function loadInvoicePage(response){
	alert(response);
	loadInvoiceTable();
}

function loadProductPage(response){
	alert(response);
	loadProductTable();
}
$(function(){
	$("#product_edit_form").submit(function(event) {
      /* stop form from submitting normally */
		event.preventDefault();
		var $form = $( this ),
		url = $form.attr( 'action' );
		$.ajax({
			url:url,
			method:'POST',
			dataType:'json',
			data:{
				product_id: $('#product_edit_form #product_id').val(),
				product_name: $('#product_edit_form #product_name').val(),
				stock_quantity: $('#product_edit_form #stock_quantity').val(),
				price_per_item: $('#product_edit_form #price_per_item').val(),
				cost_per_item: $('#product_edit_form #cost_per_item').val(),
                                product_priority: $('#product_edit_form #product_priority').val()
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$("#message").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.success+'</p></div>');
					$("#product_edit_form")[0].reset();
					$(".modal#edit_product_modal").modal('hide');
					loadProductTable();
				}
			}
		});
	});
	$("#customer_edit_form").submit(function(event) {
      /* stop form from submitting normally */
		event.preventDefault();
		var $form = $( this ),
		url = $form.attr( 'action' );
		$.ajax({
			url:url,
			method:'POST',
			dataType:'json',
			data:{
				customer_id: $('#customer_edit_form #customer_id').val(),
				customer_name: $('#customer_edit_form #customer_name').val(),
				customer_address: $('#customer_edit_form #customer_address').val(),
				customer_phone: $('#customer_edit_form #customer_phone').val(),
				customer_email: $('#customer_edit_form #customer_email').val()
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$("#message").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.success+'</p></div>');
					$("#customer_edit_form")[0].reset();
					$(".modal#edit_product_modal").modal('hide');
				}
			}
		});
	});
	$("#create_product_form").submit(function(event) {
      /* stop form from submitting normally */
		event.preventDefault();
		var $form = $( this ),
		url = $form.attr( 'action' );
		$.ajax({
			url:url,
			method:'POST',
			dataType:'json',
			data:{
				product_name: $('#create_product_form #product_name').val(),
				stock_quantity: $('#create_product_form #stock_quantity').val(),
				price_per_item: $('#create_product_form #price_per_item').val(),
				cost_per_item: $('#create_product_form #cost_per_item').val(),
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$("#message").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.success+'</p></div>');
					$("#create_product_form")[0].reset();
					loadProductTable();
				}
			}
		});
	});
	$("#create_customer_form").submit(function(event) {
      /* stop form from submitting normally */
		event.preventDefault();
		var $form = $( this ),
		url = $form.attr( 'action' );
		$.ajax({
			url:url,
			method:'POST',
			dataType:'json',
			data:{
				customer_name: $('#create_customer_form #customer_name').val(),
				customer_address: $('#create_customer_form #customer_address').val(),
				customer_phone: $('#create_customer_form #customer_phone').val(),
				customer_email: $('#create_customer_form #customer_email').val(),
			},
			success:function(response){
				if(response.error){
					$("#message").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.error+'</p></div>');
				}else{
					$("#message").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p>'+response.success+'</p></div>');
					$("#create_customer_form")[0].reset();
				}
			}
		});
	});
});

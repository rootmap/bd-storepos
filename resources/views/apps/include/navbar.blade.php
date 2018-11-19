<div class="top_menu">
   <div class="container">
      <div class="row">
         <div class="col-md-12 ">
           <div id="cssmenu">
            <ul>
               <li>
                  <a href='{{url('home')}}'>
                     <img class="img-responsive dropbtn " src="{{url('theme/images/home.png')}}" alt="image home"> <br>
                     <span>Home</span>
                  </a>
               </li>
               <li class='has-sub'>
                  <a href='{{url('setup')}}'>
                     <img class="img-responsive dropbtn " src="{{url('theme/images/setup.png')}}" alt="image home"> <br>
                     <span>Setup</span>
                  </a>
                  <ul>
                     <li class='has-sub'><a href='{{url('profile')}}'><span>Profile </span></a></li>
                     <li class='has-sub'><a href='{{url('password-reset')}}'><span>Change Password </span></a></li>
                     <li class='has-sub'><a href='{{url('company_info')}}'><span>Company Info </span></a></li>
                     <li class='has-sub'><a href='{{url('shop')}}'><span>Shop Info </span></a>
                        <ul>
                           <li><a href='{{url('shop')}}'><span>Add New Shop</span></a></li>
                           <li class='last'><a href='{{url('shop-list')}}'><span>Shop List</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>User Info</span></a>
                        <ul>
                           {{-- <li><a href='{{url('user-role')}}'><span>User Role</span></a></li> --}}
                           <li><a href='{{url('user')}}'><span>Add New User</span></a></li>
                           <li><a href='{{url('user-list')}}'><span>User List</span></a></li>
                           <li><a href='{{url('user-menu-permission')}}'><span>User Menu Permission</span></a></li>
                           <li class='last'><a href='{{url('shopToshopTrns')}}'><span>Shop To Shop User Trs.</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>System Setting</span></a>
                        <ul>
                           <li><a href='{{url('tender')}}'><span>Tender Management</span></a></li>
                           <li><a href='{{url('tax')}}'><span>Vat/Tax Management</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>Product Management</span></a>
                        <ul>
                           <li><a href='{{url('brand')}}'><span>Add New Brand</span></a></li>
                           <li><a href='{{url('model')}}'><span>Add New Model</span></a></li>
                           <li><a href='{{url('product')}}'><span>Add New Product</span></a></li>
                           <li><a href='{{url('product-list')}}'><span>Product List</span></a></li>
                           <li><a href='{{url('print-barcode')}}'><span>Print Bar Code</span></a></li>
                        </ul>
                     </li>
                     
                     <li class='has-sub'><a href='#'><span>Discount Management</span></a>
                        <ul>
                           <li><a href='{{url('discount-type')}}'><span>Discount Type Management</span></a></li>
                           <li><a href='{{url('discount')}}'><span>Add New Discount</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>Retailer / Vendor Setup</span></a>
                        <ul>
                           <li class='has-sub'><a href=''><span>Retailer Management</span></a>
                              <ul>
                                 <li><a href='{{url('retailer')}}'><span>Add New Retailer</span></a></li>
                                 <li class="last"><a href='{{url('retailer-list')}}'><span>Manage Retailer</span></a></li>
                              </ul>
                           </li>
                           <li class='has-sub'><a href=''><span>Vendor Management</span></a>
                              <ul>
                                 <li><a href='{{url('vendor')}}'><span>Add New Vendor</span></a></li>
                                 <li class="last"><a href='{{url('vendor-list')}}'><span>Manage Vendor</span></a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class='has-sub'>
                  <a href='#'>
                     <img class="img-responsive " src="{{url('theme/images/clock.png')}}" alt="image clock"><br>
                     <span>Oparetion</span>
                  </a>
                  <ul>
                     <li class='has-sub'><a href='{{url('shop_receiving')}}'><span>Shop Receiving</span></a></li>
                     <li class='has-sub'><a href='{{url('stock_return_to_cs')}}'><span>Stock Return To CS</span></a></li>
                     <li class='has-sub'><a href='{{url('shop_to_shop_deliverie')}}'><span>Shop To Shop Delivery</span></a></li>
                     <li class='has-sub'><a href='{{url('shop_to_shop_receving')}}'><span>Shop To Shop Receving</span></a></li>
                     <li class='has-sub'><a href='{{url('gift_voucher')}}'><span>Gift Voucher</span></a></li>
                     <li class='has-sub'><a href='#'><span>Retail Stock In / Out</span></a>
                        <ul>
                           <li><a href='{{url('stock_in')}}'><span>Stockout for Sale</span></a></li>
                           <li class="last"><a href='{{url('stock_out')}}'><span>Return to Stock</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class='has-sub'><a href=''>
                     <img class="img-responsive " src="{{url('theme/images/sales.png')}}" alt="image clock"><br>
                     <span>Sales</span>
                  </a>
                  <ul>
                     <li class='has-sub'><a href='{{url('sales')}}'><span>Add New Sales</span></a></li>
                     <li class='has-sub'><a href='{{url('sales-list')}}'><span>Sales List</span></a></li>
                     <li class='has-sub'><a href='#'><span>Customer Management</span></a>
                        <ul>
                           <li><a href='{{url('customer')}}'><span> Add New Customer</span></a></li>
                           <li class="last"><a href='{{url('customer-list')}}'><span>Customer List </span></a></li>
                        </ul>
                     </li>

                  </ul>
               </li>
               <li><a href='{{url('sales_void')}}'>
                     <img class="img-responsive " src="{{url('theme/images/box.png')}}" alt="image clock"><br>
                     <span>Sales Void</span>
                  </a>
               </li>
               <li class='has-sub'><a href='#'>
                     <img class="img-responsive " src="{{url('theme/images/chart.png')}}" alt="image clock"><br>
                     <span>Report</span>
                  </a>
                  <ul>
                     <li class='has-sub'><a href='#'><span>Reprint</span></a>
                        <ul>
                           <li><a href='#'><span>Stock Return To CS</span></a></li>
                           <li><a href='#'><span>Stock Receive From Shop</span></a></li>
                           <li><a href='#'><span>Shop To Shop Deliver</span></a></li>
                           <li><a href='#'><span>Shop To Shop Receive</span></a></li>
                           <li><a href='#'><span>Invoice</span></a></li>
                           <li><a href='#'><span>Receive Gift Card</span></a></li>
                           <li><a href='#'><span>Gift Vaucher Transfer</span></a></li>
                           <li><a href='#'><span>Gift Voucher Transfer Rcv</span></a></li>
                           <li class='last'><a href='#'><span>Gift Voucher Sales</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>Sales Void Statistic</span></a></li>
                     <li class='has-sub'><a href='#'><span>Stock Report</span></a>
                        <ul>
                           <li><a href='#'><span>Model Wise Stock Report</span></a></li>
                           <li><a href='#'><span>All Stock Report</span></a></li>
                           <li class='last'><a href='#'><span>Gift Voucher Stock Report</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>Sales Report</span></a>
                        <ul>
                           <li><a href='{{url('sales/invoice')}}'><span>Invoice Wise Sales</span></a></li>
                           <li><a href='#'><span>Item Wise Sales</span></a></li>
                           <li><a href='#'><span>Model Wise Sales Report</span></a></li>
                           <li class='last'><a href='#'><span>Sales Attendance</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'><span>Customer Report</span></a></li>
                     <li class='has-sub'><a href='#'><span>Product Incentive Report</span></a></li>
                     <li class='has-sub'><a href='#'><span>Gift Voucher Sales Report</span></a></li>
                  </ul>
               </li>
               <li class='last'><a href='{{url('search')}}'>
                     <img class="img-responsive " src="{{url('theme/images/note.png')}}" alt="image clock"><br>
                     <span>Search</span>
                  </a>
               </li>
            </ul>
            </div>

       </div>
      </div>
   </div>
</div>
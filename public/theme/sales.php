<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      
      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/mainmenu.css">
      <title>POS</title>
   </head>
   <body>
      <!-- navbar start here -->
      <!-- <div class="col-md-12 section-menu"> -->
      <?php include('include/navbar.php');?>
      <!-- ../navbar end./ -->
      <!-- second part -->
      <div class="home-part">
         <div class="container">
            <div class="row">
               <div class="col-md-10">
                     <div class="barcum">
                        <ol class="breadcrumb">
                           <li><a href=""><i class="fa fa-home"></i></a></li>
                           <li><a href=""> Sales </a></li>
                        </ol>
                     </div>
               </div>
               <div class="col-md-2">
                  <div class="logout">
                     <a href=""><i class="fa fa-sign-out"></i> Logout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ../second part/ -->
      <div class="comp">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="col-md-9">
                     <div class="heading-title">
                       <i class="fa fa-file-text-o" aria-hidden="true"></i> <strong>Sales</strong>
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div class="comImg">
                      <img src="images/skeletonit.png">
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- content Start-->
      <div class="content">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Basic Info:</legend>
                        <form method="post" action="">
                        <div class="col-md-8" >
                           <div class="table-responsive" >
                                 <table class="table" style="background-color: #ededed">
                                    <tbody>
                                       <tr>
                                         <td>Barcode</td>
                                         <td><input type="text" class="form-control" autofocus></td>
                                         <td>&nbsp;</td>
                                         <td>Qty</td>
                                         <td><input type="text" class="form-control"></td>
                                       </tr>
                                       <tr>
                                         <td>Rate</td>
                                         <td><input type="text" class="form-control"></td>
                                         <td>&nbsp;</td>
                                         <td>In Stoke</td>
                                         <td><input type="text" class="form-control"></td>
                                       </tr>
                                       <tr>
                                         <td>Customer Mobile</td>
                                         <td><input type="text" class="form-control"></td>
                                         <td>&nbsp;</td>
                                         <td>Name</td>
                                         <td><input type="text" class="form-control"></td>
                                       </tr>
                                       <tr>
                                         <td>Care By</td>
                                         <td><input type="text" class="form-control"></td>
                                         <td>&nbsp;</td>
                                         <td>Name</td>
                                         <td><input type="text" class="form-control"></td>
                                       </tr>
                                       <tr>
                                         <td colspan="5" class="text-center">
                                          <input type="submit" class="btn btn-default btn-raised" value="Save">
                                          <input type="reset" class="btn btn-default" value="Cancel">
                                         </td>
                                       </tr>
                                    </tbody>
                                 </table>

                                 <table class="table">
                                    <thead style="background-color: #ededed">
                                       <tr>
                                         <th>Barcode</th>
                                         <th>IMEI</th>
                                         <th>Brand</th>
                                         <th>Model</th>
                                         <th>Qty</th>
                                         <th>Price</th>
                                         <th>Total</th>
                                       </tr>
                                     </thead>
                                    <tbody>
                                       <tr>
                                         <td>No Data Added</td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                              </div>
                        </div>
                        <div class="col-md-4">
                           <table class="table" style="background-color: #ededed">
                              <tbody>
                                 <tr>
                                   <td style="color: #EA341F; text-align: center">Stock Panel</td>
                                 </tr>
                                 <tr>
                                   <td>CS</td>
                                   <td>0</td>
                                 </tr>
                                 <tr>
                                   <td>CS</td>
                                   <td>0</td>
                                 </tr>
                                 <tr>
                                   <td>CS</td>
                                   <td>0</td>
                                 </tr>
                                 <tr>
                                   <td>CS</td>
                                   <td>0</td>
                                 </tr>
                              </tbody>
                           </table>
                           <table class="table" style="background-color: #ededed">
                              <tbody>
                                 <tr>
                                   <td colspan="3">Total Qty / Total Items</td>
                                 </tr>
                                 <tr>
                                   <td><input type="text" class="form-control"></td>
                                   <td style="">/</td>
                                   <td><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Total Price</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Discount %</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Dis. Amount</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Sub Total</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Credit Card Chage</td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Net. Amount</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>GC Pay</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td>Card Pay</td>
                                   <td colspan="2">
                                       <select class="form-control">
                                          <option>1</option>
                                          <option>1</option>
                                          <option>1</option>
                                       </select>
                                   </td>
                                 </tr>
                                 <tr>
                                   <td >Card No</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td >Card Pay</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td >Cash Amount</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td >Cash Pay</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td >Return Amount</td>
                                   <td colspan="2"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3" class="text-center">
                                    <input type="submit" class="btn btn-default btn-raised" value="Exchange">
                                     <input type="submit" class="btn btn-default btn-raised" value="Save">
                                     <input type="reset" class="btn btn-default" value="Cancel">
                                   </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>                      
                        
                        </form>
                    </fieldset>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- content End-->

      <?php include('include/footer.php');?>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      
      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="bootstrap3/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>
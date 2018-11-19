<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('apps.pages.auth.login');
});

//cart pos
Route::post('cart/add-cart-product', 'CartController@getAddToCart');
Route::get('cart/json', 'CartController@getCart');
Route::get('cart/clear', 'CartController@clearCart');
Route::post('cart/change/discount-type', 'CartController@changeDiscountType');
Route::post('cart/pos/change-quantity', 'CartController@changeCartQuantity');
Route::post('cart/customer/old', 'CartController@changeCartCustomer');
Route::post('cart/payment/select', 'CartController@changePaymentMethod');
Route::post('cart/invoice/create', 'CartController@cartCreateInvoice');

// CompanyInfo
Route::get('company_info', 'CompanyInfoController@index');
Route::post('company_info-add', 'CompanyInfoController@store');
Route::post('company_info-update/{id}', 'CompanyInfoController@update');
// ShopInfo
Route::get('shop','ShopInfoController@index');
Route::post('shop-add', 'ShopInfoController@store');
Route::post('shop-update/{id}', 'ShopInfoController@update');
Route::get('shop-list', 'ShopInfoController@shopList');
Route::get('shop/edit/{id}', 'ShopInfoController@show');
Route::get('shop/delete/{id}', 'ShopInfoController@destroy');
// User
Route::get('user','StoreUserController@index');
Route::post('user-add', 'StoreUserController@store');
Route::post('user-update/{id}', 'StoreUserController@update');
Route::get('user-list', 'StoreUserController@userList');
Route::get('user/edit/{id}', 'StoreUserController@show');
// tender
Route::get('tender','TenderController@index');
Route::post('tender-add', 'TenderController@store');
Route::get('tender/edit/{id}', 'TenderController@show');
Route::post('tender-update/{id}', 'TenderController@update');
Route::get('tender/delete/{id}', 'TenderController@destroy');

// Vat Tax
Route::get('tax','VatController@index');
Route::post('tax-add', 'VatController@store');
Route::get('tax/edit/{id}', 'VatController@show');
Route::post('tax-update/{id}', 'VatController@update');
Route::get('tax/delete/{id}', 'VatController@destroy');
// Brand
Route::get('brand','BrandController@index');
Route::post('brand-add', 'BrandController@store');
Route::get('brand/edit/{id}', 'BrandController@show');
Route::post('brand-update/{id}', 'BrandController@update');
Route::get('brand/delete/{id}', 'BrandController@destroy');
// Model
Route::get('model','BrandModelController@index');
Route::post('model-add', 'BrandModelController@store');
Route::get('model/edit/{id}', 'BrandModelController@show');
Route::post('model-update/{id}', 'BrandModelController@update');
Route::get('model/delete/{id}', 'BrandModelController@destroy');
// Product
Route::get('product','ProductController@index');
Route::post('product/ajax/modelData','ProductController@modelData');
Route::post('product-add', 'ProductController@store');
Route::post('product-update/{id}', 'ProductController@update');
Route::get('product-list', 'ProductController@shopList');
Route::get('product/edit/{id}', 'ProductController@show');
Route::get('product/delete/{id}', 'ProductController@destroy');
Route::get('print-barcode', 'ProductController@BarCode');
Route::post('print-barcode', 'ProductController@BarCodePrint');
// discount-type
Route::get('discount-type','DiscountTypeController@index');
Route::post('discount-type-add', 'DiscountTypeController@store');
Route::get('discount-type/edit/{id}', 'DiscountTypeController@show');
Route::post('discount-type-update/{id}', 'DiscountTypeController@update');
Route::get('discount-type/delete/{id}', 'DiscountTypeController@destroy');
// Discount
Route::get('discount','DiscountController@index');
Route::post('discount-add', 'DiscountController@store');
Route::get('discount/edit/{id}', 'DiscountController@show');
Route::post('discount-update/{id}', 'DiscountController@update');
Route::get('discount/delete/{id}', 'DiscountController@destroy');
// Retailer
Route::get('retailer','RetailerController@index');
Route::post('retailer-add', 'RetailerController@store');
Route::get('retailer/edit/{id}', 'RetailerController@show');
Route::post('retailer-update/{id}', 'RetailerController@update');
Route::get('retailer/delete/{id}', 'RetailerController@destroy');
Route::get('retailer-list', 'RetailerController@RetailerList');
// Vendor
Route::get('vendor','VendorController@index');
Route::post('vendor-add', 'VendorController@store');
Route::get('vendor/edit/{id}', 'VendorController@show');
Route::post('vendor-update/{id}', 'VendorController@update');
Route::get('vendor/delete/{id}', 'VendorController@destroy');
Route::get('vendor-list', 'VendorController@VendorList');
// shop_receiving
Route::get('shop_receiving','ShopReceivingController@index');
Route::post('shop_receiving-add', 'ShopReceivingController@store');
Route::get('shop_receiving/edit/{id}', 'ShopReceivingController@show');
Route::post('shop_receiving-update/{id}', 'ShopReceivingController@update');
Route::get('shop_receiving/delete/{id}', 'ShopReceivingController@destroy');
// stock_return_to_cs
Route::get('stock_return_to_cs','StockReturnToCSController@index');
Route::post('stock_return_to_cs-add', 'StockReturnToCSController@store');
Route::get('stock_return_to_cs/edit/{id}', 'StockReturnToCSController@show');
Route::post('stock_return_to_cs-update/{id}', 'StockReturnToCSController@update');
Route::get('stock_return_to_cs/delete/{id}', 'StockReturnToCSController@destroy');
// shop_to_shop_deliverie
Route::get('shop_to_shop_deliverie','ShopToShopDeliveryController@index');
Route::post('shop_to_shop_deliverie-add', 'ShopToShopDeliveryController@store');
Route::get('shop_to_shop_deliverie/edit/{id}', 'ShopToShopDeliveryController@show');
Route::post('shop_to_shop_deliverie-update/{id}', 'ShopToShopDeliveryController@update');
Route::get('shop_to_shop_deliverie/delete/{id}', 'ShopToShopDeliveryController@destroy');
// shop_to_shop_receving
Route::get('shop_to_shop_receving','ShopToShopReceiveController@index');
Route::post('shop_to_shop_receving-add', 'ShopToShopReceiveController@store');
Route::get('shop_to_shop_receving/edit/{id}', 'ShopToShopReceiveController@show');
Route::post('shop_to_shop_receving-update/{id}', 'ShopToShopReceiveController@update');
Route::get('ShopToShopReceiveController/delete/{id}', 'ShopToShopReceiveController@destroy');
// gift_voucher
Route::get('gift_voucher','GiftVoucherController@index');
Route::post('gift_voucher-add', 'GiftVoucherController@store');
Route::get('gift_voucher/edit/{id}', 'GiftVoucherController@show');
Route::post('gift_voucher-update/{id}', 'GiftVoucherController@update');
Route::get('gift_voucher/delete/{id}', 'GiftVoucherController@destroy');
// stock_in
Route::get('stock_in','StockInController@index');
Route::post('stock_in-add', 'StockInController@store');
Route::get('stock_in/edit/{id}', 'StockInController@show');
Route::post('stock_in-update/{id}', 'StockInController@update');
Route::get('stock_in/delete/{id}', 'StockInController@destroy');
// Customer
Route::get('customer','CustomerController@index');
Route::post('customer-add', 'CustomerController@store');
Route::post('customer-update/{id}', 'CustomerController@update');
Route::get('customer-list', 'CustomerController@userList');
Route::get('customer/edit/{id}', 'CustomerController@show');
Route::get('customer/delete/{id}', 'CustomerController@destroy');
Route::get('customer-list', 'CustomerController@CustomerList');
// stock_out
Route::get('stock_out','StockOutController@index');
Route::post('stock_out-add', 'StockOutController@store');
Route::get('stock_out/edit/{id}', 'StockOutController@show');
Route::post('stock_out-update/{id}', 'StockOutController@update');
Route::get('stock_out/delete/{id}', 'StockOutController@destroy');
// shopToshopTrns
Route::get('shopToshopTrns','ShopToShopUserTransferController@index');
Route::post('shopToshopTrns-add', 'ShopToShopUserTransferController@store');
Route::get('shopToshopTrns/edit/{id}', 'ShopToShopUserTransferController@show');
Route::post('shopToshopTrns-update/{id}', 'ShopToShopUserTransferController@update');
Route::get('shopToshopTrns/delete/{id}', 'ShopToShopUserTransferController@destroy');
// sales
Route::get('sales','SalesController@index');
Route::post('Sales/loadedProduct','SalesController@loadedProduct');
Route::get('sales/invoice','SalesController@show');
Route::get('sales/detail/{salesid}','SalesController@InvoiceShow');

// shopToshopTrns
Route::get('sales_void','SalesVoidController@index');
Route::post('sales_void-add', 'SalesVoidController@store');
Route::get('sales_void/edit/{id}', 'SalesVoidController@show');
Route::post('sales_void-update/{id}', 'SalesVoidController@update');
Route::get('sales_void/delete/{id}', 'SalesVoidController@destroy');

Route::get('/password-reset', function () {
    return view('apps.pages.password-reset');
});
Route::post('/home', function () {
    return view('apps.pages.index');
});
Route::get('/home', function () {
    return view('apps.pages.index');
});
Route::get('/search', function () {
    return view('apps.pages.search');
});


Route::get('/card-type', function () {
    return view('apps.pages.card-type');
});
Route::get('/setup', function () {
    return view('apps.pages.setup');
});


Route::get('/user-menu-permission', function () {
    return view('apps.pages.user-menu-permission');
});



Route::get('profile', function () {
    return view('apps.pages.profile');
});


Auth::routes();
Route::get('logout', 'CompanyInfoController@logout');
//Route::get('/home', 'HomeController@index')->name('home');

<?php
namespace App;
use App\Product;
class Cart {
     public $items = null;
    public $totalQty = 0;
    public $invoiceID = null;
    public $totalPrice = 0;
    public $TaxRate = 0;
    public $totalTax = 0;
    public $paid = 0;
    public $discount_type =0;
    public $sales_discount =0;
    public $discountTotal =0;
    public $paymentMethodID =0;
    public $customerID =0;
    public $AllowCustomerPayBill =0;

    public function __construct($oldCart) {



        if ($oldCart) {

            if(empty($oldCart->invoiceID))
            {
                $this->invoiceID=time();
            }
            else
            {
                $this->invoiceID=$oldCart->invoiceID;
            }

            if($oldCart->TaxRate==0)
            {
                    $tabCount=Vat::count();
                    if($tabCount>0)
                    {
                        $tab=Vat::find(1);
                        $this->TaxRate=$tab->rate_amount;
                    }
                    else
                    {
                        $this->TaxRate=0;
                    }
            }
            else
            {
                $this->TaxRate=$oldCart->TaxRate;
            }

            if($oldCart->discount_type==0)
            {
                    $tabCount=Discount::count();
                    if($tabCount>0)
                    {
                        $tab=Discount::find(1);
                        $this->discount_type=$tab->discount_type_id;
                    }
                    else
                    {
                        $this->discount_type=0;
                    }
            }
            else
            {
                $this->discount_type=$oldCart->discount_type;
            }

            if($oldCart->sales_discount==0)
            {
                    $tabCount=Discount::count();
                    if($tabCount>0)
                    {
                        $tab=Discount::find(1);
                        $this->sales_discount=$tab->price;
                    }
                    else
                    {
                        $this->sales_discount=0;
                    }
            }
            else
            {
                $this->sales_discount=$oldCart->sales_discount;
            }

            $this->items = $oldCart->items;
            $this->invoiceID = $oldCart->invoiceID;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->customerID = $oldCart->customerID;
            $this->totalTax = $oldCart->totalTax;
            $this->paid = $oldCart->paid;
            //$this->discount_type = $oldCart->discountPercent;
            $this->discountTotal = $oldCart->discountTotal;
            $this->paymentMethodID = $oldCart->paymentMethodID;
            $this->AllowCustomerPayBill = $oldCart->AllowCustomerPayBill;
        }
    }

    public function genarateInvoiceID()
    {
        $this->invoiceID = time();
    }

    public function calculateTax()
    {
        $count=count($this->items);
        if($count>0)
        {
            $this->totalTax = 0;
            $totalPrice=0;
            foreach($this->items as $index=>$itm):
                $storeditem = $this->items[$itm['item_id']];
                $storeditem['tax'] = (($storeditem['price'] * $this->TaxRate)/100);
                $this->items[$itm['item_id']]=$storeditem;
                $this->totalTax += $storeditem['tax'];
                $totalPrice+=$storeditem['price'];
            endforeach;

            if($this->discount_type==0)
            {
                $this->discountTotal=0;
            }
            else
            {
                if($this->discount_type==2)
                {
                    $this->discountTotal=$this->sales_discount;
                }
                elseif($this->discount_type==1)
                {
                    $this->discountTotal=(($totalPrice*$this->sales_discount)/100);
                }
                else
                {
                    $this->discountTotal=0;
                }
            }
            

        }
        else
        {
            $this->totalTax = 0;
            $this->discountTotal=0;
        }

        if(count($this->invoiceID)<1)
        {
        	$this->genarateInvoiceID();
        }
    }

    public function addPayment($paidAmount,$paymentID)
    {
        $this->paymentMethodID = $paymentID;
        $this->paid = $paidAmount;
        $this->calculateTax();
    } 

    public function getAssignDiscountToCart($discountType,$discount_amount)
    {
        $this->discount_type = $discountType;
        $this->sales_discount = $discount_amount;
        $this->calculateTax();
    }

    public function addCustomerID($customerID)
    {
        $this->customerID = $customerID;
        $this->calculateTax();
    }     

    public function addPaymentID($customerID)
    {
        $this->paymentMethodID = $customerID;
        $this->calculateTax();
    } 

    public function AllowCustomerPayBill($AllowCustomerPayBill=0)
    {
        $this->AllowCustomerPayBill = $AllowCustomerPayBill;
    } 

    public function add($item, $id) {

        $storeditem = ['qty' => 0, 'price' => $item->price,'tax' =>0, 'unitprice' => $item->price, 'item' => $item, 'item_id' => $id];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }
        $storeditem['qty'] ++;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $storeditem['tax'] = (($storeditem['price'] * $this->TaxRate)/100);
        $this->items[$id] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->totalTax += $storeditem['tax'];
        $this->calculateTax();
    }

    public function addCustomQuantity($item, $id,$quantity) {

        $storeditem = ['qty' => 0, 'price' => $item->price,'tax' =>0, 'unitprice' => $item->price, 'item' => $item->name, 'item_id' => $id];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }
        //Remove ex Start
        $this->totalPrice =$this->totalPrice - $storeditem['price'];
        $this->totalQty=$this->totalQty - $storeditem['qty'];
        $ex_tax = (($storeditem['price'] * $this->TaxRate)/100);
        $this->totalTax =$this->totalTax-$ex_tax;
        //Remove ex End



        $storeditem['qty']=$quantity;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $storeditem['tax'] = (($storeditem['price'] * $this->TaxRate)/100);
        $this->items[$id] = $storeditem;
        $this->totalQty+=$storeditem['qty'];
        $this->totalPrice += $storeditem['price'];
        $this->totalTax += $storeditem['tax'];
        $this->calculateTax();
    }
    ///-------custm-----//
    
    public function delProduct($item, $id) {
        
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }
        $storeditem['qty'] += -1;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $this->items[$id] = $storeditem;
        $this->totalQty += -1;
        $this->totalPrice += -($item->price);
        
        if($storeditem['qty']==0)
        {
            unset($this->items[$id]);
        }

        $this->calculateTax();
        
    }


    public function delEntireProduct($item, $id) {

        //echo $id;
        //print_r($item);
        $deduct_price = 0;
        $deduct_qty = 0;
        foreach ($this->items as $itm):
            if ($itm['item']->id == $id) {
                $deduct_price += $itm['price'];
                $deduct_qty += $itm['qty'];
            }
        endforeach;

        $newTotalPrice = $this->totalPrice - $deduct_price;
        $newTotalQty = $this->totalQty - $deduct_qty;

        $this->totalPrice = $newTotalPrice;
        $this->totalQty = $newTotalQty;

        unset($this->items[$id]);     

        $this->calculateTax();   
    }

    public function delProductRow($item, $id) {
        $totalProduct=count($this->items);
        if($totalProduct==1)
        {
            $this->ClearCart();
        }
        else
        {
            if ($this->items) {
                $this->totalQty = $this->totalQty - $this->items[$id]['qty'];
                $this->totalPrice = $this->totalPrice - $this->items[$id]['price'];
                $this->totalTax = $this->totalTax - (($this->items[$id]['price']*$this->TaxRate)/100);
                unset($this->items[$id]);
                $this->calculateTax();
            }
        }


        
    }

    public function ClearCart() {
        $storeditem = ['qty' => 0, 'price' => 0,'tax' =>0, 'unitprice' => 0, 'item' => null, 'item_id' =>0];
        $this->items = null;
        $this->invoiceID = null;
        $this->totalQty = 0;
        $this->totalPrice = 0;
        $this->totalTax = 0;
        $this->paid = 0;
        $this->discountPercent =0;
        $this->discountAmount =0;
        $this->customerID = 0;

        $this->discount_type =0;
        $this->sales_discount =0;
        $this->discountTotal =0;

    }
}

<?php

namespace App\Http\Controllers;
use App\BrandModel;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Product Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }
    public function index()
    {
        $model = BrandModel::all();
        $brand = Brand::all();
        return view('apps.pages.setup.product.product',['model'=>$model,'brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modelData(Request $request) {
        // dd($request->div);
        $query = \DB::table('brand_models')->where('brand_id', $request->div)->get();
        return response()->json($query);
    }
    public function create()
    {
        //
    }

    public function BarCodePrint(Request $request)
    {
        $this->validate($request,[
            'quantity'=>'required',
            'pid'=>'required',
            'pid_barcode'=>'required'
        ]);

        $totalQuantity=intval($request->quantity);
        if($totalQuantity>0)
        {
            $code=$this->sdc->GenarateBarcode($request->pid_barcode);
            $htmlString="";
            $q=0;
            for($i=1; $i<=$totalQuantity; $i++)
            {
                if($q==0)
                {
                    $htmlString .='<img height="50" src="data:image/png;base64,'.$code.'" /> &nbsp; &nbsp; &nbsp;';
                }
                else
                {
                    $htmlString .='<img height="50" src="data:image/png;base64,'.$code.'" /> &nbsp; &nbsp; &nbsp;';
                }
                
                $q++;
                if($q==5)
                {
                    $htmlString .='<br /><br />';
                    $q=0;
                }
            }

            echo $this->sdc->PDFLayout("Barcode",$htmlString,1);

        }
        else
        {
             return redirect('print-barcode')->with('error', 'Invalid Barcode Quantity.');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_id' => 'required',
            'model_id' => 'required',
            'barcode' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'cost' => 'required',
            'imei' => 'required',
        ]);

        $cominfo = new Product;
        $cominfo->brand_id = $request->brand_id;
        $cominfo->model_id = $request->model_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->name = $request->name;
        $cominfo->quantity = $request->quantity;
        $cominfo->price = $request->price;
        $cominfo->cost = $request->cost;
        $cominfo->imei = $request->imei;
        $cominfo->sold_times = 0;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Product Info",$this->moduleName." Added Successfully.");
        return redirect('product')->with('status', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function shopList(){
        $json =Product::leftjoin('brands','products.brand_id','=','brands.id')
                    ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                    ->select('products.*','brands.name as brand_name','brand_models.name as model_name')
                    ->where('products.store_id',$this->sdc->storeID())
                    ->get();
        return view('apps.pages.setup.product.product-list',['data'=>$json]);
    }

    public function show($id)
    {
        $json = Product::find($id);
        $model = BrandModel::all();
        $brand = Brand::all();
        return view('apps.pages.setup.product.product',['data'=>$json,'brand'=>$brand,'model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Product::find($id);
        $cominfo->brand_id = $request->brand_id;
        $cominfo->model_id = $request->model_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->name = $request->name;
        $cominfo->quantity = $request->quantity;
        $cominfo->price = $request->price;
        $cominfo->cost = $request->cost;
        $cominfo->imei = $request->imei;
        $cominfo->sold_times = 0;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Product Info",$this->moduleName." Updated Successfully.");
        return redirect('product')->with('status', 'Product Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Product::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }

    public function BarCode(){
        $json = Product::all();
        return view('apps.pages.setup.product.print-barcode',['data'=>$json]);
    }
    
}

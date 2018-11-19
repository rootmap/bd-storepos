<?php

namespace App\Http\Controllers;
use App\LoginActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\InvoiceSetting;
use App\CompanyInfo;
use App\SiteSetting;
use App\Seo;
use Mpdf\Mpdf;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use CodeItNow\BarcodeBundle\Utils\QrCode;
//MenuPageController::loggedUser('company_prefix')
//https://github.com/codeitnowin/barcode-generator

class StaticDataController extends Facade {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected static function getFacadeAccessor() {
        //what you want
        return $this;
    }


    public static function storeID() 
    {
        $dv=CompanyInfo::orderBy('id','DESC')->first();
        $storeID=$dv->store_id;
        return $storeID;
    }

    public static function branchID() 
    {
        return 0;
    }

    public static function storeName() 
    {
        $dv=CompanyInfo::orderBy('id','DESC')->first();
        $storeID=$dv->company_name;
        return $storeID;
    }

    public static function storeInfo() 
    {
        $dv=CompanyInfo::orderBy('id','DESC')->first();
        return $dv;
    }

    public static function createImageFromBase64($file_name='test.png',$path='',$data=''){ 
        $image = $data; // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $file_name;
        \File::put(public_path($path). '/' . $imageName, base64_decode($image));
        return $file_name;
    }

    public static function UserID() 
    {
        return Auth::user()->id;
    }    

    public static function UserName() 
    {
        return Auth::user()->name;
    }

    

    public static function GenarateBarcode($text='')
    {
        $barcode = new BarcodeGenerator();
        $barcode->setText($text);
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();

        return $code;
        //echo '<img src="data:image/png;base64,'.$code.'" />';
        //die();
    }

    public static function GenarateQrcode($text='',$returnType=0)
    {
        $qrCode = new QrCode();
        $qrCode
            ->setText($text)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;
        if(empty($returnType))
        {
           $datareturn=array('getContentType'=>$qrCode->getContentType(),'code'=>$qrCode->generate()); 
           return $datareturn;
        }
        else
        {
            return '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';
        }

        

        
        //echo '<img src="data:image/png;base64,'.$code.'" />';
        //die();
    }


    public static function log($type='',$msg='')
    {
        $user_id=self::UserID();
        $user_name=self::UserName();
        $store_id=self::storeID();
        $tab=new LoginActivity;
        $tab->user_id=$user_id;
        $tab->name=$user_name;
        $tab->store_id=$store_id;
        $tab->activity=$msg;
        $tab->activity_type=$type;
        $tab->ip_address=\Request::ip();
        $tab->user_agent=\Request::server('HTTP_USER_AGENT');
        $tab->save();

        return 1;
    }


    public static function ExcelLayout($excelArray=array())
    {

        
        Excel::create($excelArray['report_name'], function($excel) use($excelArray) {

            $excel->sheet(date('d-M-Y').'_'.time(), function($sheet) use($excelArray) {
        
                $alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');

                $datacol=count($excelArray['data'][0]);

                $colSP=$alpha[$datacol-1]."1";


                $sheet->mergeCells('A1:'.$colSP);
                $sheet->setBorder('A1', 'thin');
                $sheet->cell('A1', function($cell) use ($excelArray) {
                    $cell->setValue($excelArray['report_title']);
                    //$cell->setBackground('#000000');
                   // $cell->setFontColor('#FFF');
                    $cell->setFontSize(16);
                    $cell->setFontWeight('bold');
                    //$cell->setBorder('solid', 'solid', 'solid', 'solid');
                    $cell->setAlignment('center');
                    $cell->setValignment('center');
                });

                $sheet->fromArray($excelArray['data']);
                //$sheet->setBorder('A1:F10', 'thin');

            });

        })->export('xlsx');


    }
    
    
    public static function PDFLayout($report_name,$table='',$cleanpage=0)
    {
                $mpdf=new Mpdf;
                $mpdf->SetTitle($report_name);
                //$mpdf->SetDisplayMode('fullpage');
                //$mpdf->list_indent_first_level=0; // 1 or 0 - whether to indent the first level of a list
                // LOAD a stylesheet
                $stylesheet=file_get_contents(url('assets/css/bootstrap.min.css'));
                $stylesheet2=file_get_contents(url('assets/css/style.css'));
                if($cleanpage==0)
                {
                    $html='<table  class="col-md-12" cellpadding="10" style="width:100%;" width="100%;">
                        <tr>
                            
                    <td valign="top" style="border-bottom: 5px #000 solid; color: #008000; font-size: 20px; font-weight: bold; padding-left: 0px;">
                    
                    '.$report_name.' : ALAMCP.COM
                    <hr style="height:5px;">

                    <b>Report Genarated : '.date('Y-m-d H:i:s').'<br /><br /></b></td>
                    <tr>
                    </table>';
                    
                    $html.=$table;
                }
                else
                {
                    $html=$table;
                }
                
                $mpdf->WriteHTML($stylesheet, 1);
                $mpdf->WriteHTML($stylesheet2, 1); // The parameter 1 tells that this is css/style only and no body/html/text
                $mpdf->WriteHTML($html, 2);
                $mpdf->Output('invoice_' . time() . '.pdf', 'I');
                exit();
    }

    public function initMail(
        $to='',
        $subject='',
        $body='',
        $AltBody='This is the body in plain text for non-HTML mail clients',
        $attachment='',
        $debug=0
    )
    {
          $mail = new PHPMailer(true);
          try {
              $mail->SMTPDebug = $debug;
              $mail->isSMTP(); 
              $mail->Host = 'mail.spxce.co';
              $mail->SMTPAuth = true;
              $mail->Username = 'simpleretailpos@spxce.co';
              $mail->Password = '@sdQwe123';
              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;

              $mail->setFrom('info@spxce.co', 'Simple Retail POS');

              //$mail->addAddress($to, 'Fahad Bhuyian');
              $mail->addAddress($to);               // Name is optional
              $mail->addReplyTo('info@simpleretailpos.com', 'Reply - Simple Retail Pos');
             // $mail->addCC('cc@example.com');
             // $mail->addBCC('bcc@example.com');

              //Attachments
              if(!empty($attachment))
              {
                 $mail->addAttachment($attachment);
              }
              //$mail->addAttachment('/var/tmp/file.tar.gz');
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

              //Content
              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body    = $body;
              $mail->AltBody = $AltBody;
              $mail->send();
              return 1;
          } catch (Exception $e) {
              if($debug>0)
              {
                  return 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
              }
              else
              {
                  return 0;
              }
          }
    }
    
    public static function invoiceEmailTemplate($storeID=0,$UserID=0)
    {
        if(!empty($storeID) && !empty($UserID))
        {
            $chk=InvoiceSetting::where('store_id',$storeID)->count();
            if($chk==0)
            {
                $tab=new InvoiceSetting;
                $tab->store_id=$storeID;
                $tab->created_by=$UserID;
                $tab->email_time=1;
                $tab->company_name='Simple Retail POS';
                $tab->city='Starling Heights';
                $tab->address='14 Block A, New Test Road. USA';
                $tab->phone='555-555******';
                $tab->terms_title='Terms & Condition';
                $tab->terms_text='Some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here.';
                $tab->save();
            }

            $editData=InvoiceSetting::where('store_id',$storeID)->first();

            $qrCode=self::GenarateQrcode($editData->company_name." | ".$editData->phone." | ".$editData->address);
        }
        else
        {
            $chk=InvoiceSetting::where('store_id',self::storeID())->count();
            if($chk==0)
            {
                $tab=new InvoiceSetting;
                $tab->store_id=self::storeID();
                $tab->created_by=self::UserID();
                $tab->email_time=1;
                $tab->company_name='Simple Retail POS';
                $tab->city='Starling Heights';
                $tab->address='14 Block A, New Test Road. USA';
                $tab->phone='555-555******';
                $tab->terms_title='Terms & Condition';
                $tab->terms_text='Some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here some text here.';
                $tab->save();
            }

            $editData=InvoiceSetting::where('store_id',self::storeID())->first();

            $qrCode=self::GenarateQrcode($editData->company_name." | ".$editData->phone." | ".$editData->address);
        }

        

        //dd($qrCode['code']);

        return ['editData'=>$editData,'qrCode'=>$qrCode];
    } 

    public function checkFile($fileWpath='')
    {
        if (file_exists(public_path($fileWpath))) {
            return true;
        }    
    }

}

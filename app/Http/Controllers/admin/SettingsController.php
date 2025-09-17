<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use DB;

class SettingsController extends Controller
{
    //
    public function settings1(Request $request, $id = null)  {




        // Ornogram 
        $data['beat_policing'] = Setting::whereNotNull('beat_policing')->get()->first();


        $data['ornogram'] = Setting::whereNotNull('ornogram_image')->get()->first();

       // $data['ornogram'] = new Setting();
/*
        // update query
        if(!empty($id)) {
            $data['Ornogram'] = Setting::find($id);
        }*/
       
        // APA

        $data['APAs'] = Setting::whereNotNull('APA_tittle')->orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));

        $data['APA'] = new Setting();

        // update query
        if(!empty($id)) {
            $data['APA'] = Setting::find($id);
        }


         //Documents

         $data['citizen_charter'] = Setting::whereNotNull('citizen_charter_image')->get()->first();

        // $data['document'] = new Setting();
 
        /* // update query
         if(!empty($id)) {
             $data['document'] = Setting::find($id);
         }*/



        //Documents

        $data['documents'] = Setting::orderBy('id', 'desc')->whereNotNull('document_tittle')->paginate(env('PAGINATE_MEDIUM'));

        $data['document'] = new Setting();

        // update query
        if(!empty($id)) {
            $data['document'] = Setting::find($id);

            if (isset($data['document'])){

                return view('admin.settings1',$data);
    
             }else {
    
                return  redirect()->route('settings1');
             }
        }


               


        return view('admin.settings1', $data);
    }





    public function settings2(Request $request, $id = null)  {

        // Carrer posts
        $data['carrer_posts'] = Setting::whereNotNull('carrer_tittle')->get();

        $data['carrer_post'] = new Setting();

        // update query
        if(!empty($id)) {
            $data['carrer_post'] = Setting::find($id);
        }


        // Document 2
        $data['document_2s'] = Setting::orderBy('id', 'desc')->whereNotNull('document_tittle_2')->get();

        $data['document_2'] = new Setting();

        // update query
        if(!empty($id)) {
            $data['document_2'] = Setting::find($id);
        }

        
        return view('admin.settings2', $data);
    }


    
    public function settings1InsertUpdate(Request $request)
    {
        if($request->has('ornogram')){


            $required['ornogram_image'] = 'required |  image | max:1500';
            
            $request->validate($required);


            
            if(!empty($request->ornogram_image)) {
                $file = $request->ornogram_image;
                $ornogram_image = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['ornogram_image'] = fileUpload($file,'ornogram_image',((!empty($ornogram_image)) ? $ornogram_image->ornogram_image : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);

               // DB::table('settings')->insert($data);
            }

        }
        
        if($request->has('policing')){


            $required['beat_policing'] = 'required |  mimes:pdf,jpeg,png,jpg,doc,docx | max:1500';
            
            $request->validate($required);



            if(!empty($request->beat_policing)) {
                $file = $request->beat_policing;
                $beat_policing = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['beat_policing'] = fileUpload($file,'beat_policing',((!empty($beat_policing)) ? $beat_policing->beat_policing : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);

               // DB::table('settings')->insert($data);
            }
        }


        if($request->has('APA')){

            $data = [
                'APA_tittle'=>$request->APA_tittle,
            ];

           
            $required['APA_tittle'] = 'required';

            if(empty($request->edit_id)) {
                $required['APA_pdf_doc'] = 'required | mimes:pdf,doc,docx | max:1500';
            }
            
            $request->validate($required);

            


            if(!empty($request->APA_pdf_doc)) {
                $file = $request->APA_pdf_doc;
                $APA_pdf_doc = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['APA_pdf_doc'] = fileUpload($file,'APA_pdf_doc',((!empty($APA_pdf_doc)) ? $APA_pdf_doc->APA_pdf_doc : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {
                DB::table('settings')->insert($data);
            }
        }

        if($request->has('citizen_charter')){


            $required['citizen_charter_image'] = 'required |  mimes:pdf,jpeg,png,jpg,doc,docx | max:1500';
            
            $request->validate($required);



            if(!empty($request->citizen_charter_image)) {
                $file = $request->citizen_charter_image;
                $citizen_charter_image = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['citizen_charter_image'] = fileUpload($file,'citizen_charter_image',((!empty($citizen_charter_image)) ? $citizen_charter_image->citizen_charter_image : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);

               // DB::table('settings')->insert($data);
            }
        }


        
        if($request->has('document')){

            $data = [
                'document_tittle'=>$request->document_tittle,
            ];


            $required['document_tittle'] = 'required';

            if(empty($request->edit_id)) {
                $required['document_pdf_doc'] = 'required | mimes:pdf,doc,docx | max:8000';
            }
            
            $request->validate($required);

            

            if(!empty($request->document_pdf_doc)) {
                $file = $request->document_pdf_doc;
                $document_pdf_doc = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['document_pdf_doc'] = fileUpload($file,'document_pdf_doc',((!empty($document_pdf_doc)) ? $document_pdf_doc->document_pdf_doc : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {
                DB::table('settings')->insert($data);
            }
        }

        return redirect()->Route('settings1')->with(['message'=> 'Successfully insert!!']);
    }





    public function settings2InsertUpdate(Request $request)
    {
        if($request->has('carrer_post')){

            $data = [
                'carrer_tittle'=>$request->carrer_tittle,
                ];
            
            $request->validate([
                
            ]);


            if(!empty($request->caarer_pdf_doc)) {
                $file = $request->caarer_pdf_doc;
                $caarer_pdf_doc = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['caarer_pdf_doc'] = fileUpload($file,'caarer_pdf_doc',((!empty($caarer_pdf_doc)) ? $caarer_pdf_doc->caarer_pdf_doc : ''));
            }

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {
            DB::table('settings')->insert($data);
            }
        }


        if($request->has('document_2')){

            $data = [
                'document_tittle_2'=>$request->document_tittle_2,
            ];

            $request->validate([
                
            ]);

            if(!empty($request->documentr_pdf_doc_2)) {
                $file = $request->documentr_pdf_doc_2;
                $documentr_pdf_doc_2 = DB::table('settings')->where('id',$request->edit_id)->first();

                $data['documentr_pdf_doc_2'] = fileUpload($file,'documentr_pdf_doc_2',((!empty($documentr_pdf_doc_2)) ? $documentr_pdf_doc_2->documentr_pdf_doc_2 : ''));
            }
        

            if(!empty($request->edit_id)) {
                DB::table('settings')->where('id',$request->edit_id)->update($data);
            } else {
            DB::table('settings')->insert($data);
            }
        }

        return redirect()->Route('settings2')->with(['message'=> 'Successfully insert!!']);
    }


    public function settingsDelete($id)
    {

        $item = Setting::find($id);

        if(!empty($item->APA_pdf_doc) && file_exists(public_path().'/upload/'.$item->APA_pdf_doc)) {
            unlink(public_path().'/upload/'.$item->APA_pdf_doc);
        }

        if(!empty($item->document_pdf_doc) && file_exists(public_path().'/upload/'.$item->document_pdf_doc)) {
            unlink(public_path().'/upload/'.$item->document_pdf_doc);
        }

        if(!empty($item->caarer_pdf_doc) && file_exists(public_path().'/upload/'.$item->caarer_pdf_doc)) {
            unlink(public_path().'/upload/'.$item->caarer_pdf_doc);
        }

        if(!empty($item->documentr_pdf_doc_2) && file_exists(public_path().'/upload/'.$item->documentr_pdf_doc_2)) {
            unlink(public_path().'/upload/'.$item->documentr_pdf_doc_2);
        }

        $item->delete();

        return redirect()->back()->with(['delete_message'=> 'Successfully deleted!!']);
    }


}

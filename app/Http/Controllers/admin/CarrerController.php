<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Carrer;
use DB;


class CarrerController extends Controller
{
    //

    public function carrer(Request $request, $id = null){

        //Carrer
        $data['carrers'] = Carrer::wherenotnull('carrer_title')->orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));
        $data['carrer'] = new Carrer();

        // update query
        if(!empty($id)) {
            $data['carrer'] = Carrer::find($id);
        }


        //Police comissoner
        $data['police_comissoners'] = Carrer::wherenotnull('comissoner_name')->orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));
        $data['police_comissoner'] = new Carrer();

        // update query
        if(!empty($id)) {
            $data['police_comissoner'] = Carrer::find($id);

            if (isset($data['police_comissoner'])){

                return view('admin.carrer',$data);
    
             }else {
    
                return  redirect()->route('carreradmin');
             }
        }

        return view('admin.carrer',$data);

    }


    public function carrerInsertUpdate(Request $request)
    {
        if($request->has('carrer')){

            $data = [
                'carrer_title'=>$request->carrer_title,
            ];

    
            $required['carrer_title'] = 'required';

            if(empty($request->edit_id)) {
                $required['carrer_pdf_doc'] = 'required |  mimes:pdf,jpeg,png,jpg,doc,docx | max:1500';
            }
            
            $request->validate($required);
      

            
            if(!empty($request->carrer_pdf_doc)) {
                $file = $request->carrer_pdf_doc;
                $carrer_pdf_doc = DB::table('carrers')->where('id',$request->edit_id)->first();

                $data['carrer_pdf_doc'] = fileUpload($file,'carrer_pdf_doc',((!empty($carrer_pdf_doc)) ? $carrer_pdf_doc->carrer_pdf_doc : ''));
            }
          
    
            if(!empty($request->edit_id)) {
                DB::table('carrers')->where('id',$request->edit_id)->update($data);
            } else {
               DB::table('carrers')->insert($data);
            }

        }



        if($request->has('police_comissoner')){

            $data = [
                'comissoner_name'=>$request->comissoner_name,
                'comissoner_designation'=>$request->comissoner_designation,
                'comissoner_from_date'=>$request->comissoner_from_date,
                'comissoner_to_date'=>$request->comissoner_to_date
            ];
    
            $required['comissoner_name'] = 'required';
            $required['comissoner_designation'] = 'required';
            $required['comissoner_from_date'] = 'required';
            $required['comissoner_to_date'] = 'required';
       
            $request->validate($required);
      

    
            if(!empty($request->edit_id)) {
                DB::table('carrers')->where('id',$request->edit_id)->update($data);
            } else {
               DB::table('carrers')->insert($data);
            }
        }

      
        return redirect()->Route('carreradmin')->with(['message'=> 'Successfully insert!!']);
    }


    public function carrerDelete($id)
    {

       $item = Carrer::find($id);

        if(!empty($item->carrer_pdf_doc) && file_exists(public_path().'/upload/'.$item->carrer_pdf_doc)) {
            unlink(public_path().'/upload/'.$item->carrer_pdf_doc);
         }

         $item->delete();

        return redirect()->route('carreradmin')->with(['delete_message'=> 'Successfully deleted!!']);
    }
}

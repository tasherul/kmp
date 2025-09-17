<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\Notice;
use App\Model\Photo;
use App\Model\Wantedmissing;
use App\Model\Remember;
use App\Model\Carrer;
use App\Model\Setting;

use App\Model\Homepage;
use App\Model\News;
use App\Model\Contact;
use DB;

class OtherController extends Controller
{
    //
    public function listPc(){
        $data['listPcs'] =  Carrer::orderBy('id', 'desc')->wherenotnull('comissoner_name')->paginate(env('PAGINATE_MEDIUM'));
        
        return view('front.list_pc',$data);
    }



    public function document(){
        $data['documents'] =  Setting::orderBy('id', 'desc')->wherenotnull('document_tittle')->paginate(env('PAGINATE_LARGE'));

        return view('front.document',$data);
    }


    public function carrer(){
        $data['carrers'] =  Carrer::orderBy('id', 'desc')->wherenotnull('carrer_title')->paginate(env('PAGINATE_LARGE'));

        return view('front.carrer',$data);
    }


    public function notice(){
        $data['notices'] =  Notice::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.notice',$data);
    }


    public function weRemember(){
        $data['remembers'] =  Remember::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.we_remember',$data);
    }


    public function wanted(){
        $data['wanteds'] = Wantedmissing::where('type', 'WANTED')->orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));
        return view('front.wanted',$data);
    }


    public function missing(){
        $data['missings'] = Wantedmissing::where('type', 'MISSING')->orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.missing',$data);
    }
    public function right_to_information(){
        
        $view_info=DB::table('right_to_information')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();
        return view('front.right_to_information',compact('view_info'));
    }
    public function right_information_View($id)
    {
        $info_sel=DB::table('right_to_information')
        ->select('titel')
        ->where('id','=',$id)
        ->first();

        $view_staff=DB::table('right_information_staff')
        ->select('*')
        ->where('right_to_information_id','=',$id)
        
        ->get();
        return view('front.right_to_information_staff',compact('info_sel','view_staff'));
    }
    

}

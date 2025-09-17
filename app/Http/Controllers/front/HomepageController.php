<?php

namespace App\Http\Controllers\front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\Notice;
use App\Model\Photo;
use App\Model\Wantedmissing;
use App\Model\Remember;
use App\Model\Video;
use App\Model\Homepage;
use App\Model\News;
use App\Model\Contact;
use App\Model\Noc;
use App\Model\Setting;

use DB;

class HomepageController extends Controller
{
    //

    public function index()  {

        //return view('front.index');
        $visit_count = Setting::wherenotnull('visitor')->get()->first()->visitor;
        //print_r($visit_count);
        $counter=intval($visit_count);

       $visit = [
                'visitor'=>($counter+1),
            ];

        DB::table('settings')->where('id','1')->update($visit);
        
        
        $right_menu=DB::table('right_menu')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();
        $data['sliders'] = Slider::orderBy('id', 'desc')->get();
        $data['notices'] = Notice::orderBy('id', 'desc')->get();
        $data['photos'] = Photo::orderBy('id', 'desc')->get();
        $data['missings'] = Wantedmissing::orderBy('id', 'desc')->where('type','Missing')->get();
        $data['wanteds'] = Wantedmissing::orderBy('id', 'desc')->where('type','Wanted')->get();
        $data['remembers'] = Remember::orderBy('id', 'desc')->get();
        $data['videos'] = Video::orderBy('id', 'desc')->get();

        $data['homepages'] = Homepage::get()->first();
        $data['newss'] = News::orderBy('id', 'desc')->get();
        $data['contacts'] = Contact::wherenotnull('control_room_office')->get()->first();
        $data['count'] = $visit_count;

        return view('front.home',$data,compact('right_menu'));
    }

    public function emergencyContact()  {

        return view('front.emergency_contact');
    }
    public function noc()  {

        $data['dd'] = DB::table('noc')->orderBy('id', 'desc')->get();

        return view('front.noc',$data);
    }

    public function find_ajax_id($id)  {
        
         $item = DB::table('noc')->where('id', $id)->get();
        // print_r($item['dd']);

        //  echo json_encode($item['dd']);
        // $data['dd'] = DB::table('noc')->get();

        echo json_encode($item);
    }
    public function find_right_id($id)  {
        
         $item = DB::table('right_to_information')->where('id', $id)->get();
        // print_r($item['dd']);

        //  echo json_encode($item['dd']);
        // $data['dd'] = DB::table('noc')->get();

        echo json_encode($item);
    }

    public function policeStation()  {

        return view('front.police_station');
    }
    

    public function home()  {
        $visit_count = Setting::wherenotnull('visitor')->get()->first()->visitor;
        //print_r($visit_count);
        $counter=(int)$visit_count;

       $visit = [
                'visitor'=>($counter+1),
            ];

            DB::table('settings')->where('id','20')->update($visit);
          
        $right_menu=DB::table('right_menu')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();

        $data['sliders'] = Slider::orderBy('id', 'desc')->get();
        $data['notices'] = Notice::orderBy('id', 'desc')->get();
        $data['photos'] = Photo::orderBy('id', 'desc')->get();
        $data['missings'] = Wantedmissing::orderBy('id', 'desc')->where('type','Missing')->get();
        $data['wanteds'] = Wantedmissing::orderBy('id', 'desc')->where('type','Wanted')->get();
        $data['remembers'] = Remember::orderBy('id', 'desc')->get();
        $data['videos'] = Video::orderBy('id', 'desc')->get();

        $data['homepages'] = Homepage::get()->first();
        $data['newss'] = News::orderBy('id', 'desc')->get();
        $data['contacts'] = Contact::wherenotnull('control_room_office')->get()->first();
        $data['count'] = $visit_count;
        

        return view('front.home',$data,compact('right_menu'));
    }

    public function biography()  {


        $data['homepages'] = Homepage::get()->first();
        $data['newss'] = News::get();
        $data['contacts'] = Contact::wherenotnull('control_room_office')->get()->first();

        return view('front.biography',$data);
    }


    public function mesaageComissoner()  {

        $data['homepages'] = Homepage::get()->first();
        $data['newss'] = News::orderBy('id', 'desc')->get();
        $data['contacts'] = Contact::wherenotnull('control_room_office')->get()->first();

        return view('front.mesaage_comissoner',$data);
    }

    

}

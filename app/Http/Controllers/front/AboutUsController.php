<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Staffkmp;
use App\Model\Rangeunit;
use App\Model\RanksAcknowledge;
use App\Model\Setting;

class AboutUsController extends Controller
{
    //
    public function staff(){
        $data['staffs'] = Staffkmp::paginate(10000);

        return view('front.staff',$data);

    }


    public function rangeUnits($thana){
        $data['rangeunits'] = Rangeunit::where('staff_range', $thana)->get();
        $data['range'] = Rangeunit::where('range', $thana)->first();
        return view('front.range-units',$data);

    }



    public function ornogram(){
        $data['ornogram'] = Setting::wherenotnull('ornogram_image')->get()->first();
        
        return view('front.ornogram',$data);

    }


    public function ranks(){
        $data['ranks'] = RanksAcknowledge::wherenotnull('rank_content')->get()->first();

        return view('front.ranks',$data);

    }


    public function acknowledgement()  {
        $data['acknowledgement_content'] = RanksAcknowledge::wherenotnull('acknowledgement_content')->get()->first();
        $data['acknowledgements'] = RanksAcknowledge::wherenotnull('acknowledgement_name')->get();
        return view('front.acknowledgement',$data);

    }



    public function citizenCharter()  {
        $data['citizen_charter'] = Setting::wherenotnull('citizen_charter_image')->get()->first();

        return view('front.citizen_charter',$data);

    }



    public function apa()  {
        $data['apas'] = Setting::orderBy('id', 'desc')->wherenotnull('APA_tittle')->get();

        return view('front.apa',$data);

    }


}

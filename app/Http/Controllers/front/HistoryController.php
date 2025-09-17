<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Rangeunit;
use App\Model\Homepage;


class HistoryController extends Controller
{
    //
    public function history()  {

        $data['homepages'] = Homepage::get()->first();
        
        
        $data['khulna_sadar'] = Rangeunit::where('range','Khulna Sadar')->first();
        $data['sonadangha'] = Rangeunit::where('range','Sonadangha')->first();
        $data['khalishpur'] = Rangeunit::where('range','Khalishpur')->first();
        $data['daulatpur'] = Rangeunit::where('range','Daulatpur')->first();
        $data['khanjahan_ali'] = Rangeunit::where('range','Khanjahan Ali')->first();
        $data['labanchora'] = Rangeunit::where('range','Labanchora')->first();
        $data['horintana'] = Rangeunit::where('range','Horintana')->first();
        $data['aranghata'] = Rangeunit::where('range','Aranghata')->first();

        return view('front.history',$data);
    }

}

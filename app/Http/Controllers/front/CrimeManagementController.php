
<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Model\CrimeManagement;
use DB;


class CrimeManagementController extends Controller
{
    //
    public function crimeManagement(Request $request)  {

        $data['crimemanagements'] = CrimeManagement::where('month', 'January')->get();

       
      /*  $data['crimemanagements'] = DB::table('crime_managements')

        ->when($month, function ($query, $month) {

            return $data['month']->where('month', $month);

        })

        ->get();
       */

       
      $data = DB::table('crime_managements')->get();

      $new_data = [];
      if(count($data)) {
          foreach($data as $d) {
              $new_data[$d->month.'-'.$d->year][] = $d;
          }
      }

     
       // return view('front.crime_management',['new_data'=>$new_data]);
    
 
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($new_data);
 
        // Define how many items we want to be visible in each page
        $perPage = 3;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());
 
        return view('front.crime_management', ['new_data' => $paginatedItems]);
    }


}

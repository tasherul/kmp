<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Model\Contact;
use App\Mail\ContactForm;

use Mail;

class ContactUsController extends Controller
{
    //
    public function contactUs()  {

        $data['mobile_no']=DB::table('contract_us')
        ->select('*')->orderBy('position', 'ASC')->get();

        $data['contacts'] = Contact::wherenotnull('control_room_office')->get()->first();
        
       
        $data['head_assistant'] = Contact::wherenotnull('head_assistant_name')->get()->first();

        return view('front.contact_us',$data);
    }


    public function contactform(Request $request)  {


            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ];


         /*   $request->validate([

                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);

            
        
            Mail::send('inc/contact_mail',

            array(
                'name' =>$request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'bodyMessage' => $request->get('message')

            ), function($message){
                $message->from('test@gmail.com', 'KMP Contact From');
                
                $message->to('test@gmail.com', 'KMP'  )->subject('Contact Us');   
            }
        );
        */
        
        DB::table('contact_forms')->insert($data);
 
        return back()->with('success', 'Thanks for contact us!');
      
    
        
    }

}

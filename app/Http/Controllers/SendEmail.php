<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    //
    public function fn_sendmail()
    {
    	$data = array(
    			'name' => "Victor Alagwu",
    	);
    	
    	Mail::send('mailtemplate', $data, function ($message) {
    		$message->from('victoralagwu@gmail.com', 'Enquiry');
    	
    		$message->to('victoralagwu@gmail.com')->subject('There is a new ticket!');
    	});
    		 
    }

    public function index()
	{
		$data = array('title'=>"Enquiry Form");
		return view('enquiry_form', $data);
    }
    

    public function enquiryform(EnquiryFormRequest $request)
	{
		$name = $request->get('name');
		$email = $request->get('email');
		$enq_message = $request->get('enq_message');
		
		$data = array(
				'name' => $name,
				'email' => $email,
				'enq_message' => $enq_message
		);
		
		Mail::send('mailtemplate2', $data, function ($message) {
			$message->from('victoralagwu@gmail.com', 'Test Mail');
			 
			$message->to('victoralagwu@gmail.com')->subject('This is test email message');
		});
			return redirect('/enquiryform')->with('status', 'We have received your Enquiry, Thanks!');
		
	}
}

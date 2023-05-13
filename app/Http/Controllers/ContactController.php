<?php
namespace App\Http\Controllers;

use App\Mail\ClientMeetMail;
use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Validator;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMeet(Request $req) {
        $rules = [
            'name1'=>'required',
            'tel1'=>'required',
            'email1'=>'required|email',
            // 'recap2secure' => [ 'required', new Recaptcha ]
        ];

	    $req->validate($rules);

		$data = [
		    'name'=> $req->get('name1'),
			'email'=> $req->get('email1'),
			'tel'=> $req->get('tel1')
        ];
        $emails = [ 'contact@jhl.ma' ];

        try{
            Mail::send(new ClientMeetMail($data));
		}catch(\Exception $e) {
            $error = 'Nous rencontrons des problèmes, merci de nous contacter à <a href="mailto:'.$emails.'">'.$emails.'</a>';
            if (config('app.debug')) $error = $e->getMessage();
            return redirect()->back()->withErrors([ 'modal' => true, 'message' => $error ]);
		}

		request()->session()->flash('msg_thanks', md5(time()) );
        return redirect()->route('msg.thanks');
	}

	public function send(Request $req) {

        $rules = [
            'name'=>'required',
            'tel'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required|string',
            // 'recap2secure' => [ 'required', new Recaptcha ]
        ];

	    $req->validate($rules);

		$data = [
		    'name'=> $req->get('name'),
			'email'=> $req->get('email'),
			'tel'=> $req->get('tel'),
            'subject' => $req->has('subject') ? $req->get('subject') : '',
			'message'=> $req->get('message')
        ];

        try{
            Mail::send(new ContactMail($data));
		}catch(\Exception $e) {
            return redirect()->back()->withErrors([ 'message' => $e->getMessage() ]);
		}

		request()->session()->flash('msg_thanks', md5(time()) );
        return redirect()->route('msg.thanks');
	}
}

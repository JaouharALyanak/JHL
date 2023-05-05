<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Validator;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

	public function send(Request $req) {

        $rules = [
            'name'=>'required',
            'tel'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required|string',
            'recap2secure' => [ 'required', new Recaptcha ]
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
		}catch(Exception $e) {
            return redirect()->back()->withErrors([ 'message' => $e->getMessage() ]);
		}

		request()->session()->flash('msg_thanks', md5(time()) );
        return redirect()->route('msg.thanks');

		return response()->json(['message' => 'Merci pour votre intérêt. Nous avons bien reçu votre demande.', 'status' => true],200);
	}
}

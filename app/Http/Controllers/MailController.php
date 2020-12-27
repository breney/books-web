<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{
    public function basic_email(Request $request){

        Mail::raw('mail', function($message) use ($request) {

            $message->to('brunopy8@gmail.com', $request->get('message'))->subject
            ($request->get('subject'));
            $message->from('cd5dd5a444f280@mailtrap.io',$request->get('name'));
        });

        return redirect()->to('contact');
    }
}

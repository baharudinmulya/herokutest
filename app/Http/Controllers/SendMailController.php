<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send()
    {
        $details = [
            'title' => 'Email dari saya',
            'body' => 'Lorem ipsu dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ];
        
        try {

            \Mail::to('jaxmania74@gmail.com')->send(new \App\Mail\TestMail($details));
            echo "Email Sent Successfully";

        }
        catch(\Exception $e) {
            echo "Email Not Sent";
        }
    }
}

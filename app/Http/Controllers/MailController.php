<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'Email Subject  ron',
            'body' => 'hi, this is ron sending a  email!'
        ];

        try {
            Mail::to('rhonbhorj@gmail.com')->send(new MailNotify($data));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function sendemail()
    {
    }
}

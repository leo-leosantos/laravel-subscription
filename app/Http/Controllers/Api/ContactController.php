<?php

namespace App\Http\Controllers\Api;

use App\Mail\ContactSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
     public function sendContact(ContactRequest $request)
     {
        Mail::send( New ContactSite($request->all()));

        return response()->json(['message'=>'success']);

    }
}

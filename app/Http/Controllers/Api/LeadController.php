<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

use App\Lead;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:60',
            'email' => 'required|max:60',
            'message' => 'required'

        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'success' => false
            ]);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('antonio@live.it')->send(new ContactMessage($lead));

        return response()->json([
            'success' => true
        ]);
    }
}

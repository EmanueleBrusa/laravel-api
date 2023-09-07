<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\MailableLead;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Lead\LeadStoreRequest;

class LeadController extends Controller
{
    public function store(LeadStoreRequest $request)
    {

        try {
            $lead = Lead::create([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);

            Mail::to('testreceiver@gmail.com')->send(new MailableLead($lead));

            return response()->json([], 201);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([], 500);
        }

    }
}

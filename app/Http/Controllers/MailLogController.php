<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailLog;
use App\Http\Requests\CreateMailRequest;
use App\Jobs\SendEmail;

class MailLogController extends Controller
{
    public function index() 
    {
        $mailHistories = MailLog::where('user_id', auth()->user()->id)->get();
        return view('mailLog.index', ['mailHistories' => $mailHistories]);
    }

    public function create() {
        return view('mailLog.create');
    }

    public function store(CreateMailRequest $request){
        try {
            $data = $request->validated();
            $user = auth()->user();
            $mailLog = $user->sentMail()->create($data);
            SendEmail::dispatchAfterResponse($mailLog);
            session()->flash('success','Mail sent successfully');
            return redirect()->route('mailLog.index');
        } catch (\Throwable $err) {
            return redirect()->back()->withErrors(['mailError' => $err->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailLog;
use App\Http\Requests\CreateMailRequest;
use App\Http\Actions\StoreMailAction;

class MailLogController extends Controller
{
    /**
        * Sent mail history page
        *
        * @return View
    */ 
    public function index() 
    {
        $mailHistories = MailLog::where('user_id', auth()->user()->id)->get();
        return view('mailLog.index', ['mailHistories' => $mailHistories]);
    }

    /**
        * Create mail page
        * @return View
    */ 
    public function create()
    {
        return view('mailLog.create');
    }

    /**
        * Store mail in database and send mail to recipient
        *
        * @param CreateMailRequest $request  Form Field data
        * 
        * @throws Throwable $err If something went wrong
        * @return Redirect
    */ 
    public function store(CreateMailRequest $request)
    {
        return StoreMailAction::store($request->validated());
    }

    /**
        * Store CKEditor images in disk
        *
        * @param Request $request CKEditor Image Data
        * @return json
    */ 
    public function uploadCKImage(Request $request)
    {
        return StoreMailAction::uploadCKImage($request);
    }
}

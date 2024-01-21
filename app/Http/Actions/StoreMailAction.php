<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;
use App\Models\MailLog;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Storage;

class StoreMailAction
{
    /**
        * Store mail in database and send mail to recipient
        *
        * @param array $data  Form Field data
        * 
        * @throws Throwable $err If something went wrong
        * @return Redirect
    */ 
    public static function store($data)
    {
        try {
            $user = auth()->user();
            // Store Mail Attachment to Disk(mailAttachment)
            if(isset($data['attachments'])){
                $attachments = $data['attachments'];
                unset($data['attachments']);
                $data['attachments'] = (new self)->uploadAttachments($attachments);
            }

            // Store mail data in database
            $mailLog = $user->sentMail()->create($data);
            
            // Queue SendMail job for fast and hassle free response
            SendEmail::dispatchAfterResponse($mailLog);

            session()->flash('success','Mail sent successfully');
            return redirect()->route('mailLog.index');
        } catch (\Throwable $err) {
            return redirect()->back()->withErrors(['mailError' => $err->getMessage()]);
        }
    }

    /**
        * Upload CKEditor image to CKEditor disk
        *
        * @param Request $request  Image Data
        * 
        * @throws Throwable $err If something went wrong
        * @return json
    */ 
    public static function uploadCKImage(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                // Prepare image filename
                $file = $request->file('upload');
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                
                // Store image to disk: ckEditorImage
                Storage::disk('ckEditorImage')->put($fileName, file_get_contents($file));
        
                $url = asset('storage/ckEditorImage/' . $fileName);
                return response()->json(['status' => true, 'fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            }
            return response()->json(['status' => false, 'uploaded'=> 0, 'url' => '']);
        } catch (\Throwable $err) {
            return response()->json(['status' => false, 'uploaded'=> 0, 'url' => '','mailError' => $err->getMessage()]);
        }
    }

    /**
        * Upload mail attachment to disk
        *
        * @param array $attachments  Files Data
        * 
        * @return Array
    */ 
    public function uploadAttachments($attachments) 
    {   
        $uploadedFiles = array();
        if(!empty($attachments)){
            foreach($attachments as $attachment){
                // Prepare attachmen filename
                $originName = $attachment->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $attachment->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                // Store attachment to disk : mailAttachment
                Storage::disk('mailAttachment')->put($fileName, file_get_contents($attachment));
                $url = asset('storage/mailAttachment/' . $fileName);
                $uploadedFiles[] = $url;
            }
        }
        return $uploadedFiles;
    }
}

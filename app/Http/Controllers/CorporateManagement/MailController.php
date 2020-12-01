<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Cache;
use Illuminate\Http\Request;

class MailController extends BaseController
{
    public function index()
    {
        if (Cache::has('evemail_'.$this->esi->id)) {
            $evemail = Cache::get('evemail_'.$this->esi->id);
        } else {
            $evemail = $this->esi->fetch('/latest/characters/'.$this->esi->id.'/mail');
            foreach ($evemail as $key => $mail)
            {
                $evemail[$key]->from = $this->esi->fetch('/latest/characters/'.$mail->from)->name ?? $mail->from;
                $evemail[$key]->to = $this->esi->fetch('/latest/characters/'.$mail->recipients[0]->recipient_id)->name
                    ?? $mail->recipients[0]->recipient_id;
                $evemail[$key]->is_read = $mail->is_read ?? false;
            }

            Cache::put('evemail_'.$this->esi->id, $evemail, 1300);
        }

        $emails = [];
        foreach ($evemail as $key => $mail)
        {
            if ($mail->from === $this->esi->name) {
                $emails['sent'][] = $mail;
            } else {
                $emails['received'][] = $mail;
            }
        }

        return view('management.mailbox', compact('emails'));
    }

    public function view(string $id, Request $request)
    {
        $mail = $this->esi->fetch('/latest/characters/'.$this->esi->id.'/mail/'.$id);

        if (!$mail)
        {
            $request->session()->flash('error', 'Could not fetch mail from the ESI');
            return redirect()->back();
        }

        $mail->from = $this->esi->fetch('/latest/characters/'.$mail->from)->name ?? $mail->from;
        $mail->to = $this->esi->fetch('/latest/characters/'.$mail->recipients[0]->recipient_id)->name
            ?? $mail->recipients[0]->recipient_id;

        return view('management.mail', compact('mail'));
    }
}

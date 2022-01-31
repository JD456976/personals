<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, Post $post)
    {
        $this->post = $post;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->request->email)
            ->subject('RE: '.$this->post->title)
            ->markdown('emails.post.reply',[
                'message' => $this->request->message,
            ]);
    }
}

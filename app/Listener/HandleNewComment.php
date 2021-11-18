<?php

namespace App\Listener;

use App\Event\CommentPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class HandleNewComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentPosted  $event
     * @return void
     */
    public function handle(CommentPosted $event)
    {
        //envoyer un email à l'admin avec le commentaire
        Mail::to('admin@monsite.com')
            ->queue(new \App\Mail\CommentPosted($event->comment));
    }
}

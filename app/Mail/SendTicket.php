<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\{Ticket, Profile, Event};

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $profile;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket, Profile $profile, Event $event)
    {
        $this->ticket = $ticket;
        $this->profile = $profile;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ticket')
                    ->subject('Biglietto Ass. Tagliata Primolano')
                    ->attach(storage_path('app/public/tickets/').$this->ticket->pdf_filename, [
                              'as' => 'ticket.pdf',
                              'mime' => 'application/pdf',
                      ]);;
    }
}

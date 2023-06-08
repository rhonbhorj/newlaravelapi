<?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;

// class MailNotify extends Mailable
// {
//     use Queueable, SerializesModels;


//     private $data = [];
//     /**
//      * Create a new message instance.
//      *
//      * @return void
//      */
//     public function __construct($data)
//     {
//         $this->data = $data;
//     }

//     /**
//      * Get the message envelope.
//      *
//      * @return \Illuminate\Mail\Mailables\Envelope
//      */

//     public function build()
//     {
//         return $this->from('ronzhelfaiths@gmail.com', 'sender')
//             ->subject($this->data['subject'])->view('emails.index')
//             ->with('data', $this->data);
//     }
//     public function envelope()
//     {
//         return new Envelope(
//             subject: 'Mail Notify',
//         );
//     }

//     /**
//      * Get the message content definition.
//      *
//      * @return \Illuminate\Mail\Mailables\Content
//      */
//     public function content()
//     {

//         return $this->from('ronzhelfaiths@gmail.com', 'sender')
//             ->subject($this->data['subject'])->view('emails.index')
//             ->with('data', $this->data);



//         // return new Content(
//         //     view: 'view.name',
//         // );
//     }

//     /**
//      * Get the attachments for the message.
//      *
//      * @return array
//      */
//     public function attachments()
//     {
//         return [];
//     }
// }



namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->data['subject'])
            ->view('emails.mail-notify')
            ->with(['body' => $this->data['body']]);
    }
}

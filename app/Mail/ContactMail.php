<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Buat instance baru.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data; // Menyimpan data yang diterima ke dalam properti $data
    }

    /**
     * Bangun pesan.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data); 
        return $this->subject($this->data['subject']) // Subjek dari data yang diterima
                    ->view('emails.contact') // Mengarahkan ke view email
                    ->with('data', $this->data); // Mengirim data ke view
    }
}

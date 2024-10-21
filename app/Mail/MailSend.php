<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSend extends Mailable
    {
        use Queueable, SerializesModels;

        public $data;
        public $randomString; // Tambahkan properti randomString

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($data, $randomString) // Tambahkan parameter randomString
        {
            $this->data = $data;
            $this->randomString = $randomString; // Simpan randomString
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->from('codecrazemart@gmail.com', 'Code Craze Mart')
                        ->view('emails.index') // Ubah sesuai dengan nama tampilan email Anda
                        ->subject($this->data['subject'])
                        ->with([
                            'data' => $this->data,
                            'randomString' => $this->randomString, // Kirim randomString ke tampilan email
                        ]);
        }
    }

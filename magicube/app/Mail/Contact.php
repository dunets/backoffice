<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public $data;
	
    public function __construct($data)
    {
		$this->data = $data;
        $this->build();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ivan@framastuidio.com')
					->view('mail.index')
					->with([
						'data' => $this->data['name']
					]);
    }
}

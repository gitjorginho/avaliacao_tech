<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TarefaEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($acao)
    {
        $this->acao = $acao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {          $this->subject('relatorio de acoes');
               $this->to(env('MAIL_TO'));
        return $this->view('mail.tarefa_email',['acao'=>$this->acao]);
    }
}

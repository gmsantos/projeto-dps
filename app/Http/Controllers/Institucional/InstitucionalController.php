<?php

namespace App\Http\Controllers\Institucional;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Mail\Mailer;

use App\Http\Requests\EmailContatoRequest;
use App\Http\Controllers\Controller;

class InstitucionalController extends Controller
{
    public function __construct()
    {
        //
    }
    
    public function getSobre(){
        return view('sobre'); 
    }
    
    public function getContato()
    {
        return view('contato');
    }
    
    public function postContato(EmailContatoRequest $request, Cloud $cloud, Mailer $mail)
    {
        $request->file('log')->move(storage_path('app'), 'teste.txt');
        
        $mail->send('emails.contato', $request->all(), function ($message){
            
            $message->to('contato@treinaweb.com.br');
            
            $message->from('joao@joao.com.br')->cc('juca@juca.net');
            
            $message->attach(storage_path('app/teste.txt'));
            
        });
        
        //$cloud->put('teste.txt', file_get_contents(storage_path('app/teste.txt')));
        
        return view('enviado');
    }
}

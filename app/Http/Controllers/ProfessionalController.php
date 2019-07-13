<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfessionalController extends BaseController
{
    function index()
    {

        $url = file_get_contents('https://api.pratix.top/api/geo/get/simple/radio/40/-3.7553375/-38.6296543');
        $json = json_decode($url, true);

        foreach($json['data'] as $chave => &$valor)
        {
            //Inclusão de Nome na frente de payments-name
            $valor['payments']['name'] = 'Profissional '.$valor['payments']['name'];
            $valor['atuacao']['total_de_servicos'] = [count($valor['atuacao']['servicos'])];
            
            $valor = $valor;

        }
        return $json;
        
    }

}

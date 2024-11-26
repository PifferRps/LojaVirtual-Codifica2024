<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CepController extends Controller
{
    public function get()
    {
        return view('cep.form');
    }

    public function post(Request $request)
    {
        $cep = $request->post("cep");
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', "https://brasilapi.com.br/api/cep/v2/$cep");
        $response = json_decode($response->getBody()->getContents(), true);

        return view('cep.resultado')->with("response" , $response);
    }
}

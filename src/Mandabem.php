<?php

namespace Pushinbr;

use GuzzleHttp\Client as HttpClient;

class Mandabem
{

    const BASE_URI = 'https://mandabem.com.br/ws/';


    private $apiToken;
    private $appID;

    public function __construct($apiToken, $appID)
    {
        $this->apiToken = $apiToken;
        $this->appID = $appID;

    }



    public function getShippingValue ($data) {

        $data['plataforma_id'] = $this->appID;
        $data['plataforma_chave'] = $this->apiToken;
        $data['endpoint'] = 'get_shipping_value';

        $client = new \GuzzleHttp\Client();

        $resp = $client->request('POST', self::BASE_URI . 'valor_envio', [
            'form_params' => $data
        ]);

        $response = json_decode($resp->getBody()->getContents(), true);

        return $response['resultado'];
    }



    public function sendOrder ($data) {

        $data['plataforma_id'] = $this->appID;
        $data['plataforma_chave'] = $this->apiToken;

        $client = new \GuzzleHttp\Client();


        $resp = $client->request('POST', self::BASE_URI . 'gerar_envio', [
            'form_params' => $data
        ]);

        $response = json_decode($resp->getBody()->getContents(), true);

        return $response['resultado'];

    }



    public function getStatusObject ($data) {
        $data['plataforma_id'] = $this->appID;
        $data['plataforma_chave'] = $this->apiToken;



        $client = new \GuzzleHttp\Client();

        $resp = $client->request('POST', self::BASE_URI . 'envio', [
            'form_params' => $data
        ]);

        $response = json_decode($resp->getBody()->getContents(), true);

        return $response['resultado'];
    }

}
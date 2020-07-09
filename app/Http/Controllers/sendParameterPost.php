<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class sendParameterPost extends Controller
{
    public function sendData()
    {
        //this method refers to question 4 of exercise
        try{

        $client = new Client();
        $res = $client->request('POST', 'https://atomic.incfile.com/fakepost', [
            'form_params' => [
                'data' => 'test_data',
            ]
        ]);

       echo 'Status code:'.$res->getStatusCode();

        }catch (ClientException $e) {
            echo 'Message: ' .$e->getMessage();
        }catch (RequestException $e) {
            echo 'Message: ' .$e->getMessage();
        }

    }
      
        
    public function sendMultipleData(){
        //This method refers to question 5
        try{
            $client = new Client();
            $res = $client->request('POST', 'https://atomic.incfile.com/fakepost', [
                'form_params' => [
                    'data' => 'test_data',
                ]
            ]);
            $message = 'Success, status code: '.$res->getStatusCode();
            return $message;
         
            }catch (ClientException $e) {
              if ($e->hasResponse()) {
                $response = $e->getResponse();
                return response(json_encode((string) $response->getBody()), $response->getStatusCode())->header($response->hasHeader('Content-Type'),'text/plain');
     
            }
            }
    }

     

}

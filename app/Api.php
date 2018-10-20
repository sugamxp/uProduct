<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Api{
    //
     public function getNews($source)
    {

        try {

              $client        = new GuzzleHttpClient();
              //with the code below, we can get news from multiple sources 
              $apiRequest    = $client->request('GET', 'https://newsapi.org/v1/articles?source='.$source.'&sortBy=top&apiKey=fcc1460688294e2c89d06f05ae111567' );

              $content       = json_decode($apiRequest->getBody()->getContents(), true);

             return $content['articles'];

            } catch (RequestException $e) {
              //For handling exception
              echo Psr7\str($e->getRequest());
              if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
              }
         }
    }

    public function getAllSources()
    {

        try {

                $client           = new GuzzleHttpClient();

                $apiRequest       = $client->request('GET', 'https://newsapi.org/v2/sources?category=technology&language=en&apiKey=fcc1460688294e2c89d06f05ae111567' );

                $content          = json_decode($apiRequest->getBody()->getContents(), true);

             return $content['sources'];

            } catch (RequestException $e) {
              //For handling exception
               echo Psr7\str($e->getRequest());
               if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
          }
    }
}
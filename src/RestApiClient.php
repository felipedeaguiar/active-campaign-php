<?php 

namespace ActiveCampaign;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class RestApiClient implements Http{

	protected $client;
	protected $ac;

    function __construct(ActiveCampaign $ac){
        
    	$this->ac = $ac;
    	$this->client = new Client([
    		'base_uri' => $ac->baseUrl(),
    		'headers' => [
    			'Api-Token' => $this->ac->getApiKey(),
    			'Content-type' => 'application/json'
    		]
    	]);
    }

    public function post(String $endpoint, array $data){
    
        try {

            return $this->client->request('POST', 'contacts',['body' => json_encode($data)]);  
            
        }catch(Exception $e) {

            echo Psr7\str($e->getMessage());
        }
    }

    public function get(String $endpoint, int $id){

    	try {

	    	$response = $this->client->request('GET', $endpoint);
	    	return json_decode($response->getBody());

	    }catch (RequestException $e) {

		     echo Psr7\str($e->getMessage());
		}	 
    }


    public function delete(String $endpoint, int $id){

        try {

            $response = $this->client->request('DELETE', $this->buildEndpoint($endpoint, $id));
            return json_decode($response->getBody());
            
        } catch (Exception $e) {
            
        }


    }

    public function put(String $endpoint, array $data){

         try {

            return $this->client->request('PUT', 'contacts',['body' => json_encode($data)]);  
            
        }catch(Exception $e) {

            echo Psr7\str($e->getMessage());
        }

    }

    public function buildEndpoint(String $endpoint, int $id){

        return $endpoint . "/" . $id;
    }

}


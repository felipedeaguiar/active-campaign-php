<?php 

namespace ActiveCampaign;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class OldApiClient implements Http{

	protected $client;
	protected $ac;

    function __construct(ActiveCampaign $ac){

    	$this->ac = $ac;
    	$this->client = new Client([
    		'base_uri' => $this->ac->baseUrl(),
            'verify' => false 
    	]);
    }

    public function post(String $endpoint, array $data){
 
        try {

            $response = $this->client->request('POST', $this->buildEndpoint($endpoint),['form_params' => $data]);  
            return json_decode($response->getBody());
            
        }catch(Exception $e) {

            echo Psr7\str($e->getMessage());
        }
    }

    public function get(String $endpoint, int $id = null){

    	try {
            
	    	$response = $this->client->request('GET',  $this->buildEndpoint($endpoint, $id));
	    	return json_decode($response->getBody());

	    }catch (RequestException $e) {

		     echo Psr7\str($e->getMessage());
		}	 
    }

    public function put(String $endpoint, array $data){

        
    }

    public function delete(String $endpoint, int $id){


    }

    public function buildEndpoint(String $endpoint, int $id = null){

        if($id != null){
            $id = "&id=".$id;
        }else{
            $id = "";
        }

        return "/admin/api.php/?api_action=" . $endpoint . '&api_key=' . $this->ac->getApikey() . $id . '&api_output=json';
    }


}


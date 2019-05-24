<?php 

namespace ActiveCampaign;

Interface Http {

	public function post(String $endpoint, array $data);
	public function put(String $endpoint, array $data);
	public function get(String $endpoint, int $id);
	public function delete(String $endpoint, int $id);

}









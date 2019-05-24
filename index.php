<?php

include_once 'vendor/autoload.php';


$ac = new ActiveCampaign\ActiveCampaign('https://marketing.com');



$data = array();
$data['email'] = "felipe_bullets@hotmail.com";
$data['orgname'] = "teste";
$data['phone'] = "teste";
$data['field[6,0]'] = "teste";
$data['tags'] = "teste";

 var_dump($ac->contact()->sync($data));

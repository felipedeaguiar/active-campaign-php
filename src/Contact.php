<?php

namespace ActiveCampaign;

class Contact{

    protected $ac;
    protected $client;
    protected $endpoints;

    function __construct(ActiveCampaign $ac){

        $this->ac = $ac;
     
        if($this->ac->getApiVersion() <= 2){

          $this->endpoints = $this->oldEndpoints();

        }
        else{

          $this->endpoints = $this->endpoints();
        }
    }

    public function getContact(int $id){
      	
      	if($id == null ){
      		return new \Exception('Parâmetro Id não pode ser nulo ou vazio');
      	}

    	    return $this->ac->client()->get($this->endpoints['get'], $id);
    }
 
    public function getAllContacts(){

    	  return $this->ac->client()->get($this->endpoints['list']);
    }

    public function add(array $data){
     
      return $this->ac->client()->post($this->endpoints['add'], $data);
    }

    public function sync(array $data){

      return $this->ac->client()->post($this->endpoints['sync'], $data);
    }

    public function edit(array $data){

      if(!isset($data['contact']['email']) || $data['contact']['email'] == ""){
        return new \Exception('Email obrigatório');
      }

      return $this->ac->client()->put($this->endpoints['edit'], $data);

    }

    public function delete(int $id){

      return $this->ac->client()->delete($this->endpoints['delete'], $id);

    }

    public function oldEndpoints(){

        return array(
           'add' => 'contact_add',
           'delete' => 'contact_delete',
           'list' => 'contact_list',
           'edit' => 'contact_edit',
           'get' => 'contact_view',
           'sync' => 'contact_sync'
        );
    }

    public function endpoints(){

        return array(
           'add' => 'contacts',
           'delete' => 'contacts',
           'list' => 'contacts',
           'edit' => 'contacts',
           'get' => 'contacts'
        );
    }

}
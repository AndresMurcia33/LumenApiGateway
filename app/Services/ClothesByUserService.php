<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;


class ClothesByUserService {
    use ConsumesExternalService;
    /*
    * The base uri to base used to consume the categories service
    */
    public $baseUri;
    public $secret;

    public function __construct(){
        $this->baseUri = config('services.clothes.base_uri');
        $this->secret = config('services.clothes.secret');

    }

    public function getClotheByUsers(){
        return $this->performRequest('GET', '/clothing');
    }

    public function createClotheByUsers($data){
        return $this->performRequest('POST', '/clothing', $data);
    }

    public function getClotheByUser($clothing){
        return $this->performRequest('GET', "/clothing/{$clothing}");
    }
    
    public function editClotheByUser($data, $clothing){
        return $this->performRequest('PUT', "/clothing/{$clothing}", $data);
    }

    public function destroyClotheByUser($clothing){
        return $this->performRequest('DELETE', "/clothing/{$clothing}");
    }
}
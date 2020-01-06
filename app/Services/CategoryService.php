<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;


class CategoryService {
    use ConsumesExternalService;
    /*
    * The base uri to base used to consume the categories service
    */
    public $baseUri;
    public $secret;
    public function __construct(){
        $this->baseUri = config('services.categories.base_uri');
        $this->secret = config('services.categories.secret');
    }
    
    /**
     * Get the full list of categoris from the authos service
     * @return string
     */
    public function getCategories(){
        return $this->performRequest('GET', '/categories');
    }

    public function createCategory($data){
        return $this->performRequest('POST', '/categories', $data);
    }

    public function getCategory($category){
        return $this->performRequest('GET', "/categories/{$category}");
    }
    
    public function editCategory($data, $category){
        return $this->performRequest('PUT', "/categories/{$category}", $data);
    }

    public function destroyCategory($category){
        return $this->performRequest('DELETE', "/categories/{$category}");
    }
}
<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorsService{

    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */

    public $baseUri;

    /**
    * The secret to consume the User1 Service
    * @var string
    */
    public $secret;



    public function __construct()
    {
        $this->baseUri = config('services.users2.base_uri');
        $this->secret =  config('services.users2.secret');
    }

    public function show()
    {
        return $this->performRequest('GET','/authors');
    }

    public function add($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    public function find($id)
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT',"/authors/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }
}
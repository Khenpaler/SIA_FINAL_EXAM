<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BooksService
{
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
        $this->baseUri = config('services.users1.base_uri');
        $this->secret =  config('services.users1.secret');
    }

    public function show()
    {
        return $this->performRequest('GET', '/books');
    }
    
    public function add($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    public function find($id)
    {
        return $this->performRequest('GET', "/books/{$id}");
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', "/books/{$id}");
    }

}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
//use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\AuthorsService;


Class AuthorsController extends Controller {

    use ApiResponser;

    /**
        * The service to consume the User2 Microservice
        * @var AuthorsService
        */

    public $authorsService;

    /**
        * Create a new controller instance
        * @return void
        */

    public function __construct(AuthorsService $authorsService){
        $this->authorsService = $authorsService;
    }


    public function show()
    {
        return $this->successResponse($this->authorsService->show());
    }


    public function add(Request $request)
    {

        return $this->successResponse($this->authorsService->add($request->all(), Response::HTTP_CREATED));

    }


    public function find($id)
    {
        return $this->successResponse($this->authorsService->find($id));      
    }

    // UPDATE
    public function update(Request $request, $id)
    {

        return $this->successResponse($this->authorsService->update($request->all(),$id));

    } 

    
    public function delete($id)
    {
        return $this->successResponse($this->authorsService->delete($id));
    }

}



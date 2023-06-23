<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
//use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Services\AuthorsService;


Class BooksController extends Controller {

    use ApiResponser;

    /**
        * The service to consume the User1 Microservice
        * @var BooksService
        */

    public $booksService;

    /**
        * Create a new controller instance
        * @return void
        */

        /**
        * The service to consume the User1 Microservice
        * @var AuthorsService
        */

    public $authorsService;

    /**
        * Create a new controller instance
        * @return void
        */
    

    public function __construct(BooksService $booksService, AuthorsService $authorsService){
        $this->booksService = $booksService;
        $this->authorsService = $authorsService;
    }


    public function show()
    {
        return $this->successResponse($this->booksService->show());
    }

    public function add(Request $request)
    {
            return $this->successResponse($this->booksService->add($request->all(), Response::HTTP_CREATED));
    }


    public function find($id)
    {
        return $this->successResponse($this->booksService->find($id));      
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        if(!authorID)
        return $this->successResponse($this->booksService->update($request->all(),$id));

    } 

    public function delete($id)
    {
        return $this->successResponse($this->booksService->delete($id));
    }

    

}



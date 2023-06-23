<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Models\Books;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


Class BooksController extends Controller {

    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function getUsers()
    {
        $books = Books::all();
        return response()->json(['data' => $books], 200);
        
        //return $this->successResponse($users);
    }

    public function show()
    {
        $books = Books::all();
        
        return $this->successResponse($books);
    }



    public function add(Request $request)
    {
        
        $rules = [
            'book_name' => 'required|max:20',
            'year_publish' => 'required|numeric|min:1|not_in:0',
            'authorID' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        
        //validate if Jobid is found in the table tbluserjob
        //$userjob = UserJob::findOrFail($request->jobid);
        $books = Books::create($request->all());
        
        return $this->successResponse($books, Response::HTTP_CREATED);
        //return response()->json($user, 200);
    }


    public function find($id)
    {
        $books =  Books::findOrFail($id);

        return $this->successResponse($books);

        //$user = User::where('userid', $id)->first();

        /*if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }*/
        
    }

    public function delete($id) {

        $books =  Books::findOrFail($id);

        $books->delete();

        return $this->successResponse('Book Deleted!');
        //return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        
        /*$user = User::where('userid', $id)->delete();

        if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }*/
    }

    // UPDATE
    public function update(Request $request, $id)
    {

        $rules = [
            'book_name' => 'required|max:20',
            'year_publish' => 'required|numeric|min:1|not_in:0',
            'authorID' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request, $rules);

        //$userjob = UserJob::findOrFail($request->jobid);

        $books = Books::where('bookID', $id)->firstOrFail();

        $books->fill($request->all());

        if($books->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $books->save();
        return $this->successResponse($books);

        /*$user = User::where('userid', $id)->firstOrFail();
        $rules = [
            $this->validate($request, [
                'username' => 'required|max:20',
                'password' => 'required|max:20',
                'gender' => 'required|in:Male,Female',
            ])  
        ];
        $this->validate($request, $rules);
        $user->fill($request->all());
        $user->save();
        
        return $this->successResponse($user);*/
    
    } 

}



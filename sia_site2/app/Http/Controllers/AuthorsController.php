<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Models\Authors;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


Class AuthorsController extends Controller {

    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function show()
    {
        $authors = Authors::all();
        
        return $this->successResponse($authors);
    }



    public function add(Request $request)
    {
        
        $rules = [
            'fullname' => 'required|max:150',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
        ];

        $this->validate($request,$rules);
        
        //validate if Jobid is found in the table tbluserjob
        //$userjob = UserJob::findOrFail($request->jobid);
        $authors = Authors::create($request->all());
        
        return $this->successResponse($authors, Response::HTTP_CREATED);
        //return response()->json($user, 200);
    }


    public function find($id)
    {
        $authors =  Authors::findOrFail($id);

        return $this->successResponse($authors);

        //$user = User::where('userid', $id)->first();

        /*if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }*/
        
    }

    public function delete($id) {

        $authors =  Authors::findOrFail($id);

        $authors->delete();

        return $this->successResponse('Author Deleted!');
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
            'fullname' => 'required|max:150',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
        ];

        $this->validate($request, $rules);

        //$userjob = UserJob::findOrFail($request->jobid);

        $authors = Authors::where('authorID', $id)->firstOrFail();

        $authors->fill($request->all());

        if($authors->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $authors->save();
        return $this->successResponse($authors);

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



<?php

namespace App\Http\Controllers;

use App\Actions\CreateUser;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            //Validatating the  Data
            throw new \Exception("Simulated DB failure");
             $createUser->execute($request->validated());
           return redirect()->route('confirmation.page')->with('message', 'User has been successfully added!' );
        } catch (\Exception $e) {

            //Something catestrophic went wrong
            return redirect()->route('error.page')
                ->with('error', 'Something went wrong.');
        }
         
    }

}

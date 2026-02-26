<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            //Validatating the  Data
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'additionalcomment' => ['required', 'string', 'max:255'],
            ]);

            //Commiting to the  db
            User::create($validated);

           return redirect()->route('confirmation.page')->with('message', 'Action completed successfully!');
        } catch (QueryException $e) {

            // Some error handling

            if ($e->getCode() == 23000) {
                //Duplicate Email
                return redirect()->route('error.page')
                    ->with('error', 'Email address already exists.');
            }

            //Somethin catestrophic went wrong
            return redirect()->route('error.page')
                ->with('error', 'Something went wrong.');
            }
         
    }

}

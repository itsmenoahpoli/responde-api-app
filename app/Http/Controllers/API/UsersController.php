<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function getProfile(Request $request)
    {
        $user_id = $request->user_id;

        return User::findOrFail($user_id)
                    ->with([
                        'user_role',
                        'emergencies'
                    ])
                    ->first();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query();

        return response()->json(
            User::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return response()->json(
            User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
                'email' => $request->email,
                'password' => bcrypt($request->password)]),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            User::findOrFail($id),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(
            User::findOrFail($id)->update($request->all()),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(
            User::findOrFail($id)->delete(),
            204
        );
    }
}

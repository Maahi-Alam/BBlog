<?php

namespace App\Http\Controllers\admin;

use App\models\Profile;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //

        return view('admin.users.profile')->with('user',Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request )
    {
        //


        // $user=Auth::user();




        $input['name']=$request->name;
        $input['email']=$request->email;
        $input['password']=bcrypt($request->password);

         //$user->update($input);

        User::first()->update($input);



        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time() . $avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);

            $path = 'uploads/avatars/' . $avatar_new_name ;

            $input2['avatar']=$path;
        }







        $input2['about']=$request->about;
        $input2['facebook']=$request->facebook;
        $input2['youtube']=$request->youtube;



        Profile::first()->update($input2);








        Session::flash('success','Updated User Successfully');


        return redirect()->route('user.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        //
    }
}

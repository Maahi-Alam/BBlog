<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\UserRequest;
use App\models\Profile;
use Illuminate\Http\Request;



use App\Http\Controllers\Controller;

use App\models\User;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $input=$request->all();
        $input['password']=bcrypt($request->password);


        $user= User::create($input);




        $input2['user_id']=$user->id;
        $input2['avatar']='uploads/avatars/1.png';

        Profile::create($input2);





        Session::flash('success', 'User successfully added ');

        return redirect()->route('user.index');





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
    public function edit($id)
    {
        //
        return view('admin.users.profile');
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
        //
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

        $user = User::find($id);



        $user->delete();

        Session::flash('success', 'User deleted.');

        return redirect()->back();

    }


    public function admin($id) {

        $user = User::find($id);

        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Successfully changed user permissions.');

        return redirect()->back();
    }

    public function not_admin($id) {

        $user = User::find($id);

        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Successfully changed user permissions.');

        return redirect()->back();

    }
}

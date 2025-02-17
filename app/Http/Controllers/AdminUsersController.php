<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
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
        $users = User::all();
        return view('Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('Admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if(trim($request->password == ''))
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);


        }


        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);


            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        User::create($input);

        return redirect('/admin/users');
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
        $user  = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('Admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrfail($id);


        //dealing with photo filed
        if(trim($request->password == ''))
        {
            //leave the password field in DB without change
            $input = $request->except('password');
        }
        else
        {
            //chane the password
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }



        //dealing with photo filed
        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $user->update($input);

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $photo = $user->photo_id;
        
        if($photo)
        {

            $photo = Photo::findOrFail($photo);

            unlink(public_path() . $user->photo->file);
            $photo->delete();

        }


        $user->delete();

        Session::flash('deletedUser','The user has been deleted');

      return redirect('/admin/users');
    }
}

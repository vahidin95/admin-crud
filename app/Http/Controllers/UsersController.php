<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UsersController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        $users = User::latest()->paginate(5);
        return view('user_manager.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        return view('user_manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = new User;
        //
        // $user->name = $request['name'];
        // $user->email = $request['email'];
        // $user->user_type = $request['user_type'];
        //
        // $user->save;
        // session()->flash('success', "You successfully edited a user $user->name");
        // return view('user_manager.index');
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
        $user = User::findOrFail($id);
        $users = User::all();
        return view('user_manager.edit',compact('user', 'users'));
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
      $user = User::find($id);

      $request->validate([
        'user_type' => 'required',
      ]);

      $data = array('user_type' => $request->user_type, );

      $user->update($data);
      $users = User::latest()->paginate(5);
      session()->flash('success', "You successfuly change the permission of the user $user->name");
      return view('user_manager.index', compact('user', 'users'));
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('blogs')->latest()->paginate(5);
        // $users = User::
        // $users = $users->email_verified_at;
        // dd($users);
        return view('admin.users.index',compact('users'));
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
    public function edit($id)
    {
        //
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
        dd("Hello");
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

    public function makeAdmin(User $user){
        $user->role = User::ADMIN;
        $user->save();
        session()->flash('success', $user->name . ' has been assigned admin role!');
        return redirect(route('admin.users.index'));
    }

    public function revokeAdmin(User $user){
        $user->role = User::AUTHOR;
        $user->save();
        session()->flash('success', $user->name . ' has been assigned author role!');
        return redirect(route('admin.users.index'));
    }

    public function authorized() {
        $users = User::where('email_verified_at','!=','NULL')->latest()->paginate(5);
        dd($users);
        return view('admin.users.index',compact('users'));
    }

    public function unauthorized(User $user) {
        $users = User::whereNull('email_verified_at')->latest()->paginate(5);
        // dd($user);
        return view('admin.users.index',compact('users'));
    }
}

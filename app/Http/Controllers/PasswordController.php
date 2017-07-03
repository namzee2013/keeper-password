<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Password;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Password::where('user_id', Auth::user()->id)->get();
        return view('keeper-password.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keeper-password.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title'=>'required',
        'login'=>'required',
        'password'=>'required'
      ]);
      $data = new Password($request->all());
      $data->user_id = Auth::user()->id;
      $data->save();
      return redirect()->route('keeper-password.index')
        ->with(['flash_level'=>'success','flash_message'=>'done! create successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = Password::find($id);
        return view('keeper-password.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Password::find($id)->first();
        return view('keeper-password.edit', compact('data'));
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
      $this->validate($request, [
        'title'=>'required',
        'login'=>'required',
        'password'=>'required'
      ]);
      $data = Password::findOrFail($id);
      $data->title = $request->title;
      $data->login = $request->login;
      $data->password = $request->password;
      $data->website = $request->website;
      $data->save();
      return redirect()->route('keeper-password.index')
        ->with(['flash_level'=>'success','flash_message'=>'done! update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Password::findOrFail($id);
      $data->delete();
      return redirect()->route('keeper-password.index')
        ->with(['flash_level'=>'success','flash_message'=>'done! delete successfully']);
    }
}

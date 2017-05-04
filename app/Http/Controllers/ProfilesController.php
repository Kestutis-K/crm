<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
        if (! Gate::allows('admin')) {
            return abort(401);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
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
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $profile = Profile::findOrFail($id);
        return view('profiles.edit', compact('profile'));
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
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $input = $request->all();
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($id);
        if($request->hasFile('photo')) {
            if(file_exists(public_path().'/images/avatars/'.$profile->photo)) {
                if($profile->photo != '150x150.png') {
            unlink(public_path().'/images/avatars/'.$profile->photo);} }
            $file = $request->file('photo');
            $name = time() .".". $file->getClientOriginalExtension();
            $img = Image::make($file)->resize(null, 150, function($constraint) {$constraint->aspectRatio();})->crop(150,150);
            $img->save('images/avatars/'.$name, 99);
            $profile->photo = $name;
            $profile->update();
            session()->flash('flash_blue', 'Profilio nuotrauka atnaujinta!');
            return back();
        } else {
        $profile->update($input);
        $user->name = $input['firstname']." ".$input['lastname'];
        $user->save();
        session()->flash('flash_blue', 'Profilis atnaujintas!');
        return back();
        }
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

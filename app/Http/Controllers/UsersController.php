<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\PasswordRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Foreach_;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (! Gate::allows('admin_manager')) {
                return abort(401);
            }
    $users = User::with('profile')->get();
    return view('users.index', compact('users'));

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

        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $input = $request->all();
            $hashed = Hash::make($input['password']);
            $input['password'] = $hashed;
           $user = User::create($input);
           $profile = ['firstname'=>null, 'lastname'=>null, 'position'=>null, 'email'=>$user->email, 'phone'=>null, 'photo'=>'150x150.png', 'birthday'=>null, 'user_id' => $user->id];
           Profile::create($profile);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('admin_manager')) {
            return abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
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
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $input = $request->all();
        $user = User::findOrFail($id);
        $user->update($input);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        //$user = User::findOrFail($id);
        $users = User::with('profile')->where('id', $id)->get();
        foreach ($users as $user) {
            if($user->profile->photo != '150x150.png') {
        unlink(public_path().'/images/avatars/'.$user->profile->photo);}
        $user->profile->delete();
        $user->delete();
        }
        return view('users.index', compact('users'));
    }

    public function changePassword(PasswordRequest $request, $id) {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $input = $request->all();
        if (Hash::check(trim($input['old_password']), $user->password)) {
                $hashed = Hash::make($input['password']);
                $user->update(array('password'=>$hashed));
//            $user->update();
                session()->flash('flash_green', 'Slaptažodis pakeistas!');
                return back();
        } else {
            $errors = "Dabartinis slaptažodis neteisingas";
            return back()->withErrors($errors);
        }
    }



}

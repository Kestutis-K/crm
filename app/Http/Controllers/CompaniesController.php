<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class CompaniesController extends Controller
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
    public function edit($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $input = $request->all();
        $company = Company::findOrFail($id);
        if($request->hasFile('logo')) {
            if(file_exists(public_path().'/images/logo/'.$company->logo)) {
                if($company->logo != 'logo.png') {
                    unlink(public_path().'/images/logo/'.$company->logo);} }
            $file = $request->file('logo');
            $name = time() .".". $file->getClientOriginalExtension();
            $img = Image::make($file)->resize(null, 250, function($constraint) {$constraint->aspectRatio();});
            $img->save('images/logo/'.$name, 99);
            $company->logo = $name;
            $company->update();
            session()->flash('flash_blue', 'Logotipas atnaujintas!');
            return back();
        } else {
            $company->update($input);
            return redirect(route('companies.edit', $company->id));
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

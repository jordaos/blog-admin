<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Funções",
                "active" => true
            ]
        ]);

        $modelList = json_encode(Role::select('id', 'name', 'description')->get());

        return view(
            'admin.roles.index',
            compact('breadcrumbList', 'modelList')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Funções",
                "href" => route('roles.index')
            ],
            [
                "text" => "Novo",
                "active" => true
            ]
        ]);
        return view(
            'admin.roles.create',
            compact('breadcrumbList')
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
        $data = $request->all();

        $validation = Validator::make($data, [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        Role::create($data);

        return redirect()->route('roles.index');
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
        $role = Role::find($id);

        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Funções",
                "href" => route('roles.index')
            ],
            [
                "text" => "Editar",
                "active" => true
            ]
        ]);
        return view(
            'admin.roles.create',
            compact('breadcrumbList', 'role')
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
        $data = $request->all();

        $validation = Validator::make($data, [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        Role::find($id)->update($data);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();

        return response()->json(['success' => 'success'], 204);
    }
}

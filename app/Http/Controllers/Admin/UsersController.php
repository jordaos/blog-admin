<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;

class UsersController extends Controller
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
                "text" => "Usuários",
                "active" => true
            ]
        ]);

        $modelList = json_encode(User::select('id', 'name', 'email')->get());

        return view(
            'admin.users.index',
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
                "text" => "Usuários",
                "href" => route('users.index')
            ],
            [
                "text" => "Novo",
                "active" => true
            ]
        ]);
        return view(
            'admin.users.create',
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['password'] = Hash::make($data['password']);
        
        User::create($data);

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
        $user = User::find($id);

        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Artigos",
                "href" => route('users.index')
            ],
            [
                "text" => "Editar",
                "active" => true
            ]
        ]);
        return view(
            'admin.users.create',
            compact('breadcrumbList', 'user')
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        User::find($id)->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'success'], 204);
    }
}

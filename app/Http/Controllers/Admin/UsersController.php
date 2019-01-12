<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\User;
use App\Role;

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

        $roleList = json_encode(Role::all());

        return view(
            'admin.users.create',
            compact('breadcrumbList', 'roleList')
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
            'role' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        $role = Role::find($data['role']);
        
        $user = User::create($data);
        $user->roles()->attach($role);

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

        $roleList = json_encode(Role::all());

        return view(
            'admin.users.create',
            compact('breadcrumbList', 'user', 'roleList')
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

        if (isset($data['password']) && $data['password'] != "") {
            $validation = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'password' => ['required', 'string', 'min:6'],
            ]);
            $data['password'] = Hash::make($data['password']);
        } else {
            $validation = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            ]);
            unset($data['password']);
        }

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

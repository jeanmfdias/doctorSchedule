<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\User;
use App\Rules\ZeroOrMin;
use DataTables;

class UsersController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = new Repository(new User);
    }
    
    public function index()
    {
        $returns = [
            'js' => [ 'users' ]
        ];
        return view('users.index', $returns);
    }

    public function show($id)
    {
        $returns = [
            'user' => $this->user->preview($id),
            'disabled' => true
        ];
        return view('users.show', $returns);
    }

    public function create()
    {
        $returns = [
            'disabled' => false
        ];
        return view('users.create', $returns);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = $this->user->create($data);
        if ($user) {
            $request->session()->flash('success', __('messages.created_successfully'));
            return redirect(route('users.show', $user->id));
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $returns = [
            'user' => $this->user->preview($id),
            'disabled' => false
        ];
        return view('users.edit', $returns);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:users,email,'.$id,
            'password' => ['confirmed', new ZeroOrMin(6)]
        ]);

        $data = $request->all();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $result = $this->user->update($data, $id);
        if ($result) {
            return redirect(route('users.show', $id));
        }
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $this->user->delete($id);
        return redirect(route('users.index'));
    }

    public function dataIndex()
    {
        $users = $this->user->getModel();

        $users = $users->select('id', 'name', 'email');

        $users = $users->get();

        return DataTables::of($users)->make();
    }

}

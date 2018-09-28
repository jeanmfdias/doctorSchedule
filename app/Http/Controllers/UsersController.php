<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\User;

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
            'users' => $this->user->all()
        ];
        return view('users.index', $returns);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store()
    {
        
    }

}

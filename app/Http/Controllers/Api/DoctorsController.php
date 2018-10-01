<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Repositories\Repository;
use App\Http\Resources\DoctorsResource;

class DoctorsController extends Controller
{
    protected $doctor;

    public function __construct()
    {
        $this->doctor = new Repository(new Doctor);
    }

    public function index()
    {
        return DoctorsResource::collection($this->doctor->all());
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository;
use App\Patient;
use DataTables;

class PatientsController extends Controller
{
    
    protected $patient;

    public function __construct()
    {
        $this->patient = new Repository(new Patient);
    }
    
    public function index()
    {
        $returns = [
            'js' => [ 'patients' ]
        ];
        return view('patients.index', $returns);
    }

    public function show($id)
    {
        $returns = [
            'patient' => $this->patient->preview($id),
            'disabled' => true
        ];
        return view('patients.show', $returns);
    }

    public function create()
    {
        $returns = [
            'disabled' => false
        ];
        return view('patients.create', $returns);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'cpf' => 'required|unique:patients,cpf|max:11'
        ]);

        $data = $request->all();
        $data['register_by_user_id'] = Auth::user()->id;
        $patient = $this->patient->create($data);
        if ($patient) {
            return redirect(route('patients.show', $patient->id));
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $returns = [
            'patient' => $this->patient->preview($id),
            'disabled' => false
        ];
        return view('patients.edit', $returns);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'cpf' => 'max:11|unique:patients,cpf,'.$id
        ]);

        $data = $request->all();
        $result = $this->patient->update($data, $id);
        if ($result) {
            return redirect(route('patients.show', $id));
        }
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $this->patient->delete($id);
        return redirect(route('patients.index'));
    }

    public function dataIndex()
    {
        $patients = $this->patient->getModel();

        $patients = $patients->select('id', 'name', 'cpf');

        $patients = $patients->get();

        return DataTables::of($patients)->make();
    }

}

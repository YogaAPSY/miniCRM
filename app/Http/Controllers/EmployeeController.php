<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEditRequest;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->db = app('db');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $companies = Employee::with(['companies'])->paginate(10);

        return view('employees.index', ['employees' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.form', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {

        $request->validated();

        $employee = new Employee;

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');

        $employee->save();

        $message = "employee berhasil di input";
        return redirect()->route('employee.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::findOrFail($id);

        return view('employees.show', ['employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $employees = Employee::findOrFail($id);
        return view('employees.form', ['employees' => $employees, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeEditRequest $request, $id)
    {

        $request->validated();

        // $employee = Employee::create($request->all())->where('id', $id);
        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');

        $employee->save();

        $message = "employee berhasil di Edit";
        return redirect()->route('employee.index')->withSuccess($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employee::find($id);
        $employees->delete();

        if ($employees) {

            return redirect()->route('employee.index')->withSuccess('Berhasil hapus');
        } else {

            return redirect()->route('employee.index')->withErrors('Gagal Hapus');
        }
    }
}

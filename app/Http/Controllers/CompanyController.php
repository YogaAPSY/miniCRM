<?php

namespace App\Http\Controllers;

use Exception;
use App\Company;
use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyStoreRequest;
use App\Mail\NewCompanyNotification;
use Illuminate\Support\Facades\Mail;


class CompanyController extends Controller
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
        $companies = Company::paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest  $request)
    {
        $this->db->beginTransaction();
        try {
            $request->validated();
            $storageName;
            if ($request->hasFile('logo')) {
                $storagePath = Storage::disk('local')->put('public/images', $request->file('logo'));
                $storageName = basename($storagePath);
            }

            $company = new Company;

            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = $storageName;

            $company->save();

            Mail::to('testera330@gmail.com')->send(new NewCompanyNotification(['name' => $request->input('name')]));

            $this->db->commit();
            $message = "Company berhasil di input";
            return redirect()->route('company.create')->withSuccess($message);
        } catch (Exception $exception) {
            $this->db->rollback();
            $message = $exception->getMessage();

            return redirect()->route('company.create')->withErrors($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // return view('company.form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}

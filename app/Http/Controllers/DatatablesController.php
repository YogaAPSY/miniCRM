<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use yajra\DataTables\DataTables;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return DataTables::of(User::query())->make(true);
    }
}

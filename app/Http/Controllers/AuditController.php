<?php

namespace App\Http\Controllers;

use App\NA;
use App\ResponsiblePerson;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    function __construct() {
        $this->employees = NA::users();
    }

    public function create() {
        $employees = NA::users();

        return view('audits.create', compact('employees'));
    }

    public function store(Request $request) {
        return $request->all();
    }
}

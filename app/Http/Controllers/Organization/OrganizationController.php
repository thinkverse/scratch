<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        return "Index Organization";
    }

    public function edit(Request $request)
    {
        return "Edit Organization";
    }

    public function update(Request $request)
    {
        return "Update Organization";
    }
}

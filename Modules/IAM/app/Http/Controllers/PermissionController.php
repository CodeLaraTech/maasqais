<?php

namespace Modules\IAM\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function index()
    {
        return view('iam::permissions.index');
    }

    public function create()
    {
        return view('iam::permissions.create');
    }
}

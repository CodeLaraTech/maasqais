<?php

namespace Modules\IAM\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('iam::permission-groups.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('iam::permission-groups.create');
    }
}

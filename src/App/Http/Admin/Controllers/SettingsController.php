<?php

namespace App\Http\Admin\Controllers;

use App\Http\BaseController as Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $r)
    {
        return view('admin.settings.index');
    }
}

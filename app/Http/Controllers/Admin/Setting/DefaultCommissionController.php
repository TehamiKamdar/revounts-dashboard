<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultCommissionController extends Controller
{
    public function index(){
        return view('template.admin.settings.default_commission');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class testApi extends Controller
{

    public function aaaa()
    {
        $employee = Http::get(config('api.employee.base_url') . '106596' . '')->object();
        return $employee;
    }
    //$employee = Http::get(config('api.employee.base_url') . $searchidemp . '')->object();
}

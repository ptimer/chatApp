<?php

namespace App\Http\Controllers\api\socialNetworks;

use App\Vk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vkController extends Controller
{
    public function store(Request $request)
    {
        $company = Vk::create($request->all());
        return $company;
    }
}

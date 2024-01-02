<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Category;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function PolicyPage()
    {
        return view('pages.policy-page');
    }
    public function PolicyTypeStore(Request $request)
    {
        // return $request->all();
        $data = new Policy();
        $data->type = $request->type;
        $data->des = $request->des;
        $data->save();

        return ResponseHelper::Out('success', $data, 200);
    }
    public function PolicyByType(Request $request)
    {
        return Policy::where('type', '=', $request->type)->first();
    }
}

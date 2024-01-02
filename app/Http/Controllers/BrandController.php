<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function ByBrandPage()
    {
        return view('pages.product-by-brand');
    }
    public function BrandList()
    {
        $data = Brand::all();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function BrandStore(Request $request)
    {
        $validation = $request->validate([
            'brandName' => 'required|max:50',
            'brandImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if ($validation) {
            if ($request->hasFile('brandImage')) {
                $file = $request->file('brandImage');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-brand-' . $extension;
                $file->move('upload/images/brands', $filename);
            }

            Brand::create([
                'brandName' => $request->brandName,
                'brandImage' => $filename,
            ]);

            return ResponseHelper::Out('success', 'Brand Added Successfully', 200);
        }
    }
}
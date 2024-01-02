<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use App\Models\ProductWish;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Details()
    {
        return view('pages.detials-page');
    }
    function WishListPage()
    {
        return view('pages.wish-list-page');
    }
    public function ProductStore(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'short_des' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'discount_price' => 'required',
            'stock' => 'required',
            'star' => 'required',
            'remark' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if ($validation) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-product-' . $extension;
                $file->move('upload/images/products', $filename);
            }

            Product::create([
                'title' => $request->title,
                'short_des' => $request->short_des,
                'price' => $request->price,
                'discount' => $request->discount,
                'discount_price' => $request->discount_price,
                'stock' => $request->stock,
                'star' => $request->star,
                'remark' => $request->remark,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'image' => $filename,
            ]);

            return ResponseHelper::Out('success', 'Product Added Successfully', 200);
        }
    }
    public function ListProductByCategory(Request $request)
    {
        $data = Product::where('category_id', $request->id)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ListProductByRemark(Request $request)
    {
        $data = Product::where('remark', $request->remark)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ListProductByBrand(Request $request)
    {
        $data = Product::where('brand_id', $request->id)->with('brand', 'category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function StoreProductSlider(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'short_des' => 'required',
            'price' => 'required',
            'product_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if ($validation) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-product-' . $extension;
                $file->move('upload/images/products', $filename);
            }

            ProductSlider::create([
                'title' => $request->title,
                'short_des' => $request->short_des,
                'price' => $request->price,
                'product_id' => $request->product_id,
                'image' => $filename,
            ]);

            return ResponseHelper::Out('success', 'Product Added Successfully', 200);
        }
    }
    public function ListProductSlider(Request $request)
    {
        $data = ProductSlider::all();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function StoreProductDetails(Request $request)
    {
        $productDetail = new ProductDetail();
        if ($request->hasFile('img1')) {
            $file = $request->file('img1');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-img1-' . $extension;
            $file->move('upload/images/products/', $filename);
            $productDetail->img1 = $filename;
        }
        if ($request->hasFile('img2')) {
            $file = $request->file('img2');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-img2-' . $extension;
            $file->move('upload/images/products/', $filename);
            $productDetail->img2 = $filename;
        }
        if ($request->hasFile('img3')) {
            $file = $request->file('img3');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-img3-' . $extension;
            $file->move('upload/images/products/', $filename);
            $productDetail->img3 = $filename;
        }
        if ($request->hasFile('img4')) {
            $file = $request->file('img4');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-img4-' . $extension;
            $file->move('upload/images/products/', $filename);
            $productDetail->img4 = $filename;
        }
        $productDetail->des = $request->des;
        $productDetail->color = $request->color;
        $productDetail->size = $request->size;
        $productDetail->product_id = $request->product_id;
        $productDetail->save();

        return ResponseHelper::Out('success', $productDetail, 200);
    }
    public function ProductDetailsById(Request $request)
    {
        $data = ProductDetail::where('product_id', $request->id)->with('product', 'product.brand', 'product.category')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function ListReviewByProduct(Request $request)
    {
        $data = ProductReview::where('product_id', $request->id)->with([
            'profile' => function ($query) {
                $query->select('id', 'cus_name');
            }
        ])->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function CreateProductReview(Request $request)
    {
        $user_id = $request->header('id');
        $profile = CustomerProfile::where('user_id', $user_id)->first();

        try {
            $request->merge(['customer_id' => $profile->id]);
            $data = ProductReview::updateOrCreate(
                ['customer_id' => $profile->id, 'product_id' => $request->input('product_id')],
                $request->input()
            );
            return ResponseHelper::Out('success', $data, 200);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }
    public function ProductWishList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductWish::where('user_id', $user_id)->with('product')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function CreateWishList(Request $request)
    {
        sleep(4);
        // return $request->header('id');
        $user_id = $request->header('id');

        $data = ProductWish::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $request->product_id],
            ['user_id' => $user_id, 'product_id' => $request->product_id]
        );
        return ResponseHelper::Out('success', $data, 200);
    }
    public function RemoveWishList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductWish::where(['user_id' => $user_id, 'product_id' => $request->product_id])->delete();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function CreateCartList(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('product_id');
        $color = $request->input('color');
        $size = $request->input('size');
        $qty = $request->input('qty');
        $UnitPrice = 0;

        $productDetails = Product::where('id', $product_id)->first();
        if ($productDetails->discount == 1) {
            $UnitPrice = $productDetails->discount_price;
        } else {
            $UnitPrice = $productDetails->price;
        }

        $totalPrice = $qty * $UnitPrice;

        $data = ProductCart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'color' => $color,
                'size' => $size,
                'qty' => $qty,
                'price' => $totalPrice
            ]
        );
        return ResponseHelper::Out('success', $data, 200);
    }
    public function CartList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductCart::where('user_id', $user_id)->with('product')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function DeleteCartList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductCart::where('user_id', '=', $user_id)->where('product_id', '=', $request->product_id)->delete();
        return ResponseHelper::Out('success', $data, 200);
    }
}
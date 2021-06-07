<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function Product()
    {
        $data = product::all();
        return view('product', ['products' => $data]);
    }

    public function addProduct()
    {
        $id = Auth::user()->id;
        if ($id == 1) {
            return view('addproduct');
        } else {
            return redirect('');
        }


    }

    public function addProductData(Request $request)
    {
        DB::table('products')
            ->insert([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'description' => $request->description,
                'photo' => $request->photo->getClientOriginalName(),
            ]);
        $photo = $request->photo->getClientOriginalName();

        $request->photo->move(public_path('img'), $photo);
//        $request->photo->storeAs('img', $photo);


        return redirect('product');


    }


    function detail($id)
    {
        $data = product::find($id);
        return view('detail', ['product' => $data]);
    }

    function search(Request $request)
    {
        $data = product::
        where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $request)
    {

        if (Auth::user()) {
            $query = DB::table('cart')
                ->insert([
                    'user_id' => $request->user()->id,
                    'product_id' => $request->product_id,
                ]);
            return back()->with('success','Товар добавлен в карзину');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId = Auth::user()->id;

        return Cart::where('user_id', $userId)->count();
    }

    function cartList()
    {
        $userId = Auth::user()->id;
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();


        return view('cartlist', ['products' => $products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId = Auth::user()->id;
        $total =  $products = DB::table('cart')
            ->join('products','cart.product_id','=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        return view('ordernow',['total'=>$total]);
    }
}

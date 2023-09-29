<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $items = Items::where('id', $id)->get();
        if ($items) {
            return response()->json([
                'status' => 200,
                'items' => $items
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data notfound',
            ]);
        }
        // return $items;
    }
    public function checkcart($id, $id_user)
    {
        // return $id_user;
        // $getid = $id;
        $cart = Cart::with(
            ['detail'
            => function ($query) use ($id) {
                $query->where('items_id', $id);
            }]
        )->where('id_user', $id_user)->firstWhere('cart_type', 'Direct Pick Up');
        // $cartdetail = CartDetail::where('items_id', $id)->get();
        // return $cart;
        if (isset($cart->detail[0])) {
            // return $cart->detail[0]->qty;
            return response()->json([
                'status' => 200,
                'qty' => $cart->detail[0]->qty
            ]);
            // return
        } else {
            return response()->json([
                'status' => 404,
                'qty' => 0
            ]);
        }
        // return $items;
    }
    public function checkproposecart($id, $id_user)
    {
        $cart = Cart::with(
            ['detail'
            => function ($query) use ($id) {
                $query->where('items_id', $id);
            }]
        )->where('id_user', $id_user)->firstWhere('cart_type', 'Purchase Request Proposal');
        if (isset($cart->detail[0])) {
            return response()->json([
                'status' => 200,
                'qty' => $cart->detail[0]->qty
            ]);
            // return
        } else {
            return response()->json([
                'status' => 404,
                'qty' => 0
            ]);
        }
        // return $items;
    }

    public function showdirectcart($id_user)
    {
        // return "aa";
        $cart = Cart::with(['detail' => function ($query) {
            $query->with('items');
        }])->where('id_user', $id_user)->firstWhere('cart_type', 'Direct Pick Up');
        // dd($cart);
        // return $cart;
        if ($cart) {
            // return $cart->detail[0]->qty;
            return response()->json([
                'status' => 200,
                'message' => '',
                'cart' => $cart
            ]);
            // return
        } else {
            return response()->json([
                'status' => 404,
                'cart' => '',
                'message' => 'Cart empty'
            ]);
        }
        // return $cart;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $items)
    {
        //
    }
}

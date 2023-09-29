<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class UserStockController extends Controller
{
    public function index()
    {
        // $transaction = Transaction::where('pic_approval', 'Pending')->get();
        $items = Items::all();
        return view('main.stock.index', [
            "title" =>  "Item Stock",
            "items" => $items
        ]);
    }
}

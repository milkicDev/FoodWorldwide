<?php

namespace App\Http\Controllers;

use App\Search;
use App\Food;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(Request $request, Food $food) {
        if ($request->diff_time > 0) {
            $Data = $food->where('created_at', $request->diff_time)->get();
        } else {
            $Data = $food->all();
        }

        return $Data;
    }
}

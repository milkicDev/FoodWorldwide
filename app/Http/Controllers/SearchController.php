<?php

namespace App\Http\Controllers;

use App;
use App\Food;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(Request $request, Food $food) {
        if (ISSET($request->with)) {
			$request->with = explode(',', $request->with);
			$Data = Food::with($request->with);
		} else {
			$Data = Food::with('category', 'tag', 'ingredient');
		}

        if (ISSET($request->lang)) {
            App::setLocale($request->lang);
        } else {
            App::setLocale('en');
        }

        if ($request->diff_time > 0) {
			$request->diff_time = date('Y-m-d H:i:s', $request->diff_time);
            $Data = $Data->where('created_at', $request->diff_time)
                    ->orWhere('updated_at', $request->diff_time)
                    // ->orWhere('delete_at', $request->diff_time)
                    ->get();
        } else {
            $Data = $Data->get();
        }

        return response()->json($Data, 200);
    }
}

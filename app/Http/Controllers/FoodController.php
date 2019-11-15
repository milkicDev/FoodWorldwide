<?php

namespace App\Http\Controllers;

use App;
use App\Food;
use App\Tag;
use App\Ingredient;
use Illuminate\Http\Request;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
		if (ISSET($request->lang)) {
            App::setLocale($request->lang);
        } else {
            App::setLocale('en');
        }

        $Data = Food::where('id', $id)->with('category', 'tag', 'ingredient')->first();

        return response()->json($Data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}

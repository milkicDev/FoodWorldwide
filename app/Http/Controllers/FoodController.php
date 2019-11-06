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
    public function index($locale)
    {
        App::setLocale($locale);
        $Data = Food::with('category')->get();

        return view('pages.food.index', compact('Data'));
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
    public function show($locale, $id)
    {
        App::setLocale($locale);
        $Data = Food::where('id', $id)->with('category')->first();

        $Data->tags = explode(',', $Data->tags);
        $Data->tag = Tag::whereIn('id', $Data->tags)->get();
        $Data->ingredients = explode(',', $Data->ingredients);
        $Data->ingredient = Ingredient::whereIn('id', $Data->ingredients)->get();

        return view('pages.food.show', compact('Data'));
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

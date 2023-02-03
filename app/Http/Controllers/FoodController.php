<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditFoodRequest;
use App\Http\Requests\FoodRequest;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Authorized');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = Food::all();
        $category = Category::all();
        return view('foods', compact('food', 'category'));
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
    public function store(FoodRequest $request)
    {
        $imageName = time() . $request->file('image')->getClientOriginalName();
        $request->image->move('images/foods/', $imageName);

        Food::create([
            'category_id' => $request->input('category'),
            'foodName' => $request->input('foodName'),
            'image' => $imageName,
            'price' => $request->input('price'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        $category = Category::all();
        return view('editFood', compact('food', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFoodRequest $request, $id)
    {
        $food = Food::find($id);
        $imageName = $food->image;
        if ($request->file('image') != null){
            unlink(public_path('images/foods/' . $food->image));
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('images/foods/', $imageName);
        }
        $food->category_id = $request->input('category');
        $food->foodName = $request->input('foodName');
        $food->image = $imageName;
        $food->price = $request->input('price');
        $food->save();

        return redirect('Food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        unlink(public_path('images/foods/' . $food->image));
        $food->delete();

        return back();
    }
}

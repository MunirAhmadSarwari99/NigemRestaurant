<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequst;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(OrderRequst $request)
    {
        $food = Food::find($request->input('foodID'));

        $kdv =  round($food->price / 18, 2);
        $total = $food->price + $kdv;

        Order::create([
            'category_id' => $food->category_id,
            'orderNo' => rand(10,2000),
            'quanti' => $request->input('quanti'),
            'total' => $total,
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
        $food = Food::find($id);
        $kdv =  round($food->price / 18, 2);
        $total = $food->price + $kdv;
        return view('checkout', compact('food', 'kdv', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

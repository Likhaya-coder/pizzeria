<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        //return dd($pizzas);
        return view('orders.index', compact('orders'));
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
        $validated = $request->validate([
            'names' => ['required', 'min:6', 'max:30', 'string']
        ]);

        $orders = new Order;

        if (Auth::id()) {
            $orders->user_id = Auth::User()->id;
        } else {
            $orders->user_id = 'null';
        }

        $orders->full_names = $request->names;

        if ($request->delivery == null) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->delivery = $request->delivery;
        }

        if ($request->foodType == ["Select..."]) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->food_type = $request->foodType;
        }

        if ($request->dishName == ["Select..."]) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->dish_name = $request->dishName;
        }

        if ($request->toppings == null) {
            $orders->extra_toppings = ["Empty"];
        } else {
            $orders->extra_toppings = $request->toppings;
        }

        if ($request->removed_toppings == null) {
            $orders->removed_toppings = ["Empty"];
        } else {
            $orders->removed_toppings = $request->removeToppings;
        }

        if ($request->delivery == ["Yes"]) {
            $request->validate([
                'names' => ['required', 'min:6', 'max:30', 'string'],
                'street' => ['required', 'string', 'min:3', 'max:40'],
                'town' => ['required', 'string', 'min:3', 'max:40'],
                'city' => ['required', 'string', 'min:3', 'max:40'],
                'code' => ['required', 'numeric']
            ]);
        }

        $orders->drink_type = $request->drinkType;
        $orders->drink_name = $request->drinkName;
        $orders->street = $request->street;
        $orders->town = $request->town;
        $orders->city = $request->city;
        $orders->postalCode = $request->code;
        $orders->status = 'In Progress';
        $orders->save();

        return back()->with('stored', $orders->full_names . ' thank you for ordering with us, your order is being processed. Should you have any queries, please contact us.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $orders = Order::find($id);
        return view('orders.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $orders = Order::find($request->id);

        $validated = $request->validate([
            'names' => ['required', 'min:6', 'max:30', 'string']
        ]);

        $orders->full_names = $request->names;

        if ($request->delivery == null) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->delivery = $request->delivery;
        }

        if ($request->foodType == ["Select..."]) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->food_type = $request->foodType;
        }

        if ($request->dishName == ["Select..."]) {
            return back()->with('error', 'Something went wrong, make sure you fill the form.');
        } else {
            $orders->dish_name = $request->dishName;
        }

        if ($request->toppings == null) {
            $orders->extra_toppings = ["Empty"];
        } else {
            $orders->extra_toppings = $request->toppings;
        }

        if ($request->removed_toppings == null) {
            $orders->removed_toppings = ["Empty"];
        } else {
            $orders->removed_toppings = $request->removeToppings;
        }

        if ($request->delivery == true) {
            $validated = $request->validate([
                'names' => ['required', 'min:6', 'max:30', 'string'],
                'street' => ['required', 'string', 'min:3', 'max:40'],
                'town' => ['required', 'string', 'min:3', 'max:40'],
                'city' => ['required', 'string', 'min:3', 'max:40'],
                'code' => ['required', 'numeric']
            ]);
        }

        $orders->drink_type = $request->drinkType;
        $orders->drink_name = $request->drinkName;
        $orders->street = $request->street;
        $orders->town = $request->town;
        $orders->city = $request->city;
        $orders->postalCode = $request->code;
        $orders->save();

        return redirect('/orders')->with('message', $orders->full_names . "'s" . ' order is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect('orders')->with('deleted', 'RECORD SUCCESSFULLY DELETED');
    }

    public function search()
    {
        $search = $_GET['search'];
        $results = Order::where('id', 'LIKE', '%'.$search.'%')->get();

        if($search == '') {
            return abort(404);
        }
        return view('orders.search', compact('results'));
    }

    public function authUser() {
        $role = Auth::user()->role;

        if ($role == 1) {
            return view('dashboard');
        } else if ($role == 2) {
            return view('publisher');
        } else if ($role == 3) {
            return view('admin');
        } else {
            return view('CustomDashboard');
        }
    }

    public function myOrders() {
        $userId = Auth::User()->id;

        $userOrders = Order::where('user_id', $userId)->get();

        return view('users.orders', compact('userOrders'));
    }

    public function approve(Request $request) {
        $orders = Order::findOrFail($request->id);

        if ($orders->delivery == ["Yes"]) {
            $orders->status = 'On The Way';
        } else {
            $orders->status = 'Ready to be collected';
        }

        $orders->save();

        return back()->with('message', 'Order status has been changed successfully');
    }

    public function cancel(Request $request) {
        $orders = Order::findOrFail($request->id);

        $orders->status = 'Canceled';

        $orders->save();

        return back()->with('message', 'The order has been canceled');
    }

    public function userAction(Request $request) {
        $orders = Order::findOrFail($request->id);

        $orders->delete();

        return back()->with('message', 'Status has been changed to canceled');
    }
}

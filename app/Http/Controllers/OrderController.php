<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Whoops\Run;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate();
        return view('menu.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userOption = User::orderBy('id')->get();
        $destOption = Destination::orderBy('id')->get();
        return view('menu.orders.create', compact('userOption', 'destOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $getPrice = Destination::select('price')->where('id', $r->dest_id)->get();
        $totalPrice = (int)$getPrice[0]->price * $r->ticket_qty;

        $order = Order::create([
            'user_id' => $r->user_id,
            'destination_id' => $r->dest_id,
            'start_date' => $r->start_date,
            'duration' => $r->duration,
            'ticket_quantity' => $r->ticket_qty,
            'total_amount' => $totalPrice,
        ]);

        return redirect()->route('orders.index');
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
        $order = Order::find($id);
        return view('menu.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Order $order)
    {
        $getPrice = Destination::select('price')->where('id', $order->destination_id)->get();
        $totalPrice = (int)$getPrice[0]->price * $r->ticket_qty;

        $order = Order::where('id', $order->id)->update([
            'start_date' => $r->start_date,
            'duration' => $r->duration,
            'ticket_quantity' => $r->ticket_qty,
            'total_amount' => (string)$totalPrice,
            'payment_status' => "pending",
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->route('orders.index');
    }

    public function status($id)
    {
        $orderObject = Order::find($id);

        $transaction = Transaction::create([
            'user_id' => $orderObject->user_id,
            'confirmation_date' => now()->format('Y-m-d'),
            'total' => $orderObject->total_amount,
        ]);

        $order = Order::where('id', $id)->update([
            'start_date' => $orderObject->start_date,
            'duration' => $orderObject->duration,
            'ticket_quantity' => $orderObject->ticket_quantity,
            'total_amount' => $orderObject->total_amount,
            'payment_status' => "success",
        ]);

        return redirect()->route('orders.index');
    }

    public function getUserOrder(Request $r)
    {
        $user = User::find($r->user_id);
        $orders = Order::where('user_id', $user->id)->get();

        return $orders;
    }

    public function createUserOrder(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        $order = Order::create([
            'user_id' => $r->user_id,
            'destination_id' => $r->destination_id,
            'start_date' => $r->start_date,
            'duration' => $r->duration,
            'ticket_quantity' => $r->ticket_quantity,
            'total_amount' => $r->total_amount,
        ]);

        $response = ['message' => 'Create order success'];

        return response($response, 201);
    }
}

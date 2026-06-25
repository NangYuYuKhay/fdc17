<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OrderController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::get();
        return view('admin.orders.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderDate = $request['order_date'];
        //saving data to order table
        $data = [];
        $data['order_date'] = $request['order_date'];
        $data['total_price'] = $request['total_price'];
        $data['created_at'] = Carbon::now();

        //insert new data to order table and get order id of the newly inserted data
        $orderId = Order::insertGetId($data);

        // $items = json_decode($request['items']);
        $items = json_decode($request['items']);
       

        foreach ($items as $item) {
            $data = [];
            $data['order_id'] = $orderId;
            $data['item_id'] = $item->id;
            $data['price'] = $item->price;
            $data['qty'] = $item->qty;
            $data['sub_total'] = $item->sub_total;

            OrderItem::insert($data);
        }
        return response()->json('Your order is placed.',200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $data = OrderItem::select('order_items.*','items.item_image','items.item_code','items.item_name')
        ->leftJoin('items','items.id','order_items.item_id')
        ->where('order_id',$order->id)->get();
        return view('admin.orders.show')
        ->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
    //    [
    //     "id" => 9
    //     "order_date" => "2026-06-21"
    //     "total_price" => "17500.00"
    //     "created_at" => "2026-06-21 13:59:12"
    //     "updated_at" => null
    //    ] 
       $orderItems = OrderItem::select(
                            'order_items.item_id as id',
                            'items.item_code as item_code',
                            'items.item_name',
                            'order_items.price',
                            'order_items.qty',
                            'order_items.sub_total',
                            )
                        ->leftJoin('items','items.id','order_items.item_id')
                        ->where('order_id',$order->id)
                        ->get();
        return view('admin.orders.edit')
         ->with('orderItems',$orderItems)
         ->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Order::where('id',$order->id)->delete();
        OrderItem::where('order_id',$order->id)->delete();
        return response()->json('You have deleted the records successfully.');
    }

    public function searchItems(Request $request)
    {
        $searchValue = $request['search_value'];
        if($searchValue){
            $items = Item::select('*')
                ->orWhere('item_code','like', $searchValue . '%')
                ->orWhere('item_name','like', $searchValue . '%')
                ->get();
        }
        else{
            $items = Item::get();
        }
        return response()->json($items,200);
    }
}

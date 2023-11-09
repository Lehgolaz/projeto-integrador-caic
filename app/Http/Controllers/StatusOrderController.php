<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusOrder;
use App\Http\Requests\StoreStatusOrderRequest;
use App\Http\Requests\UpdateStatusOrderRequest;

class StatusOrderController extends Controller
{
    public function index()
    {
        $statusOrders = StatusOrder::all();
        return view('status_orders.index', compact('statusOrders'));
    }

    public function create()
    {
        return view('status_orders.create');
    }

    public function store(StoreStatusOrderRequest $request)
    {
        $data = $request->validated();

        StatusOrder::create($data);

        return redirect()->route('status-order.index');
    }

    public function edit(StatusOrder $statusOrder)
    {
        return view('status_orders.edit', compact('statusOrder'));
    }

    public function update(UpdateStatusOrderRequest $request, StatusOrder $statusOrder)
    {
        $data = $request->validated();

        $statusOrder->update($data);

        return redirect()->route('status-order.index');
    }

    // Outros métodos, como destroy, podem ser adicionados para excluir status de pedidos, se necessário.
}

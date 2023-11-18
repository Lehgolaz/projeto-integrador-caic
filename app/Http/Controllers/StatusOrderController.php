<?php

namespace App\Http\Controllers;

use App\Models\StatusOrder;
use App\Http\Requests\StoreStatusOrderRequest;
use App\Http\Requests\UpdateStatusOrderRequest;
use Inertia\Inertia;

class StatusOrderController extends Controller
{
    public function index()
    {
        $statusOrders = StatusOrder::all();
        return Inertia::render('StatusOrders/Index', ['statusOrders' => $statusOrders]);
    }

    public function create()
    {
        return Inertia::render('StatusOrders/Create');
    }

    public function store(StoreStatusOrderRequest $request)
    {
        $data = $request->validated();

        StatusOrder::create($data);

        return redirect()->route('status-order.index');
    }

    public function edit(StatusOrder $statusOrder)
    {
        return Inertia::render('StatusOrders/Edit', ['statusOrder' => $statusOrder]);
    }

    public function update(UpdateStatusOrderRequest $request, StatusOrder $statusOrder)
    {
        $data = $request->validated();

        $statusOrder->update($data);

        return redirect()->route('status-order.index');
    }

    // Outros métodos, como 'destroy', podem ser adicionados para excluir status de pedidos, se necessário.
}

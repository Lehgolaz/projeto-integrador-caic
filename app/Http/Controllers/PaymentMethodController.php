<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use Inertia\Inertia;

class PaymentMethodController extends Controller
{
    
    public function index()
    {
        return Inertia::render('PaymentMethods/Index', [
            'paymentMethods' =>
            PaymentMethod::with('user:id,name')->latest()->get(),
        ]);
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $post = $request->validated();

        $create = $request->user()->posts()->create($post);

        if ($create) {
            return redirect()->route('paymentMethod.index');
        }
        return abort(500);
    }
    public function show(string $id)
    {
        return Inertia::render('PaymentMethods/Show', [
            'post' => PaymentMethod::findOrFail($id),
        ]);
    }

    public function edit(PaymentMethod $id)
    {
        return PaymentMethod::render(
            'PaymentMethods/Edit',
            [
                'paymentMethods' => PaymentMethod::findOrFail($id),
            ]
        );
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $id)
    {
       
        // Encontra o post a ser atualizado
        $post = PaymentMethod::findOrFail($id);

        $this->authorize('upadte', $post);

        // Valida os dados do formulário usando UpdatePostRequest
        $validatedData = $request->validated();

        // Atualize outros campos com os dados validados
        $post->update($validatedData);

        return redirect()->route('paymentMethod.index');

    }
    
}

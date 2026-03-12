<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payments::all();
        return view('payments.list', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    //  PaymentsController.php   ← completar (store, edit, update, destroy)
    //Inicio Daniel Inostroza Pérez
    //2026-03-11

    public function store(Request $request)
    {

        $request->validate(
            [
                'description' => 'required',
                'price' => 'required'
            ],
            [
                'description.required' => 'La descripción es obligatoria',
                'price.required' => 'El precio es obligatorio'
            ]
        );

        // Payments::create([
        //     'description' => $request->description,
        //     'price' => $request->price,        
        // ]);

        //  Payments::create($request->all());
        
        $producto = new Payments();
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->save();



        return redirect()->route('payments.index')
            ->with('alert-success', 'Pago registrado con éxito');



    }

    public function edit($id)
    {
        $payment = Payments::findOrFail($id);
        return view('payments.edit', compact('payment'));

    }

    public function update(Request $request, $id)
    {

        $payments = Payments::findOrFail($id);

        $request->validate(
            [
                'description' => 'required',
                'price' => 'required'
            ],
            [
                'description.required' => 'La descripción es obligatoria',
                'price.required' => 'El precio es obligatorio'
            ]
        );

        $payments->update([
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('payments.index')
            ->with('alert-success', 'Pago actualizado');

    }


    public function destroy($id)
    {
        $payments = Payments::findOrFail($id);
        $payments->delete();

        return redirect()->route('payments.index')
            ->with('alert-success', 'Pago eliminado');
    }

    //Posible Bonus: 

    public function show($id)
    {
        $payment = Payments::findOrFail($id);
        return view('payments.show', compact('payment'));
    }



}

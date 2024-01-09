<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

/**
 * Controlador para la gestión de clientes en el área administrativa.
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    // Método para mostrar una lista de clientes
    public function index(Request $request)
    {
        // Obtiene todos los clientes ordenados por ID de forma descendente por defecto
        $customers = Customer::query()
            ->orderBy('id', 'desc')
            ->get();

        // Verifica si se solicita ver clientes eliminados
        if ($request->has('view_deleted')) {
            // Obtiene solo los clientes eliminados, ordenados por ID de forma descendente
            $customers = Customer::onlyTrashed()
                ->orderBy('id', 'desc')
                ->get();
        }

        // Devuelve la vista que muestra la lista de clientes, pasando los clientes recuperados
        return view('admin.customers.index', compact('customers'));
    }

    // Método para mostrar el formulario de creación de cliente
    public function create()
    {
        $customer = new Customer();
        return view('admin.customers.create', compact('customer'));
    }

    // Método para almacenar un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        // Valida los datos del cliente según las reglas definidas en el modelo Customer
        request()->validate(Customer::$rules);

        // Crea un nuevo cliente con los datos proporcionados
        $customer = Customer::create($request->all());

        // Redirecciona a la vista de lista de clientes con un mensaje de éxito
        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer created successfully.');
    }

    // Método para mostrar un cliente específico
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Método para mostrar el formulario de edición de un cliente
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Método para actualizar los datos de un cliente
    public function update(Request $request, Customer $customer)
    {
        // Valida los datos del cliente según las reglas definidas en el modelo Customer
        request()->validate(Customer::$rules);

        // Actualiza los datos del cliente con los nuevos datos proporcionados
        $customer->update($request->all());

        // Redirecciona a la vista de lista de clientes con un mensaje de éxito
        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer updated successfully');
    }

    // Método para eliminar un cliente
    public function destroy(Customer $customer)
    {
        // Elimina el cliente
        $customer->delete();

        // Redirecciona a la vista de lista de clientes con un mensaje de éxito
        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer deleted successfully');
    }

    // Método para restaurar un cliente eliminado
    public function restore($customer)
    {
        // Restaura un cliente específico que esté en la papelera
        Customer::withTrashed()->find($customer)->restore();

        // Retorna a la página anterior con un mensaje de éxito
        return back()->with('success', 'The customer has been restored!');
    }

    // Método para restaurar todos los clientes eliminados
    public function restore_all()
    {
        // Restaura todos los clientes en la papelera
        Customer::onlyTrashed()->restore();

        // Retorna a la página anterior con un mensaje de éxito
        return back()->with('success', 'All trash customers have been restored.');
    }
}

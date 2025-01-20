<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;

class GroceryController extends Controller
{
    public function index(Request $request)
    {
        // Get the search term and quantity filter from the request
        $search = $request->get('search');
        $quantityFilter = $request->get('quantity');
        $sortBy = $request->get('sort_by');
        
        // Start building the query
        $query = Grocery::query();

        // Apply the search filter if there's a search term
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Apply the quantity filter (smallest or largest)
        if ($quantityFilter == 'quantity_asc') {
            $query->orderBy('quantity', 'asc');
        } elseif ($quantityFilter == 'quantity_desc') {
            $query->orderBy('quantity', 'desc');
        }

        // Apply the sorting filter (by name, price, or quantity)
        if ($sortBy) {
            $query->orderBy($sortBy);
        }

        // Get the results with pagination
        $groceries = $query->paginate(10);

        return view('groceries.index', compact('groceries'));
    }

    public function create()
    {
        return view('groceries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Grocery::create($request->all());
        return redirect()->route('groceries.index');
    }

    public function edit(Grocery $grocery)
    {
        return view('groceries.edit', compact('grocery'));
    }

    public function update(Request $request, Grocery $grocery)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $grocery->update($request->all());
        return redirect()->route('groceries.index');
    }

    public function destroy(Grocery $grocery)
    {
        $grocery->delete();
        return redirect()->route('groceries.index');
    }
}

@extends('layouts.app')

@section('content')
    <h1>Grocery List</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('groceries.index') }}">
        <input type="text" name="search" placeholder="Search groceries..." value="{{ request()->get('search') }}">

        <!-- Quantity Filter -->
        <select name="quantity">
            <option value="">Select Quantity Filter</option>
            <option value="quantity_asc" {{ request()->get('quantity') == 'quantity_asc' ? 'selected' : '' }}>Smallest Quantity</option>
            <option value="quantity_desc" {{ request()->get('quantity') == 'quantity_desc' ? 'selected' : '' }}>Largest Quantity</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Sorting Links with Styling -->
    <div class="my-3">
        <span class="mr-2">Sort by:</span>
        <a href="{{ route('groceries.index', ['sort_by' => 'name']) }}" class="btn btn-outline-secondary btn-sm {{ request()->get('sort_by') == 'name' ? 'active' : '' }}">Name</a>
        <a href="{{ route('groceries.index', ['sort_by' => 'price']) }}" class="btn btn-outline-secondary btn-sm {{ request()->get('sort_by') == 'price' ? 'active' : '' }}">Price</a>
        <a href="{{ route('groceries.index', ['sort_by' => 'quantity']) }}" class="btn btn-outline-secondary btn-sm {{ request()->get('sort_by') == 'quantity' ? 'active' : '' }}">Quantity</a>
    </div>

    <!-- Include the grocery table component -->
    <x-grocery-table :groceries="$groceries" />

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $groceries->appends(request()->query())->links('vendor.pagination.custom-pagination') }}
    </div>
@endsection

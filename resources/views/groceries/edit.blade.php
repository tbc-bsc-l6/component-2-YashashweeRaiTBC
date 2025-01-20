@extends('layouts.app')

@section('content')
    <h1>Edit Grocery Item</h1>

    <form action="{{ route('groceries.update', $grocery->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $grocery->name }}" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{ $grocery->quantity }}" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{ $grocery->price }}" required>

        <button type="submit">Save</button>
    </form>
@endsection

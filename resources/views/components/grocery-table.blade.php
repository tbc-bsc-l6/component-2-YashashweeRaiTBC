

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($groceries as $grocery)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $grocery->name }}</td>
                <td>{{ $grocery->quantity }}</td>
                <td>${{ number_format($grocery->price, 2) }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('groceries.edit', $grocery->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('groceries.destroy', $grocery->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

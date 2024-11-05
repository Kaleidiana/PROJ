<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->id }}</td>
            <td>{{ $property->title }}</td>
            <td>${{ number_format($property->price, 2) }}</td>
            <td>
                <a href="{{ route('properties.edit', $property) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('properties.destroy', $property) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

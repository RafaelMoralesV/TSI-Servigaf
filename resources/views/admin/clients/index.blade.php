@extends ('layouts.guest-navigation')

@section('content')
    <table class="table-auto">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
            </tr>
        @empty
            <tr>
                <td>None</td>
                <td>None</td>
                <td>None</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection

@extends('layouts.admin')
@section('title', 'Products | Admin')
@section('content')
    <div style="display:flex;justify-content:space-between;align-items:center;">
        <h2>Products</h2>
        <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Add Product</a>
    </div>
    <div class="table-wrap card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->is_published ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                style="display:inline;">
                                @csrf @method('DELETE')<button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:1rem;">{{ $products->links() }}</div>
@endsection

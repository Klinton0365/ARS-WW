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
                    <th style="width:80px;">Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                              <img src="{{ asset($product->image) }}" alt="" style="width:60px;height:45px;object-fit:cover;border-radius:6px;">
                            @else
                              <span style="color:#aaa;font-size:12px;">No image</span>
                            @endif
                        </td>
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
                        <td colspan="5">No products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:1rem;">{{ $products->links() }}</div>
@endsection

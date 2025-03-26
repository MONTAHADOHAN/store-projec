@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4 text-center">Product List</h4>

            @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif 
        
            <table class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $product->image_url) }}" alt="{{ $product->name }}" width="100">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'no category' }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف المنتج؟')">Delete</button>
                                </form>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">لا يوجد منتجات حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
                {{-- <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Example Product</td>
                        <td>Clothes</td>
                        <td>$50</td>
                        <td>10</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                </tbody> --}}
            </table> 
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4 text-center">Add New Product</h4>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- صورة المنتج --}}
                <div class="mb-3">
                    <label for="image_url" class="form-label fw-bold">Product image</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $product->image_url) }}" placeholder="Enter image of product"/>
                </div>
                {{-- اسم المنتج --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter name of product"/>
                </div>

                {{-- الكمية من المنتج --}}
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="Enter quantity of product"/>
                </div>

                {{-- سعر المنتج --}}
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter price of product"/>
                </div>

                {{-- وصف المنتج --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- اختيار الفئة --}}
                <div class="mb-3">
                    <label for="category" class="form-label fw-bold">Choose Category</label>
                    {{-- <select class="form-select" name="category" id="category">
                        <option value="#">{{ $product->category_id }}</option>
                         @foreach ( $categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select> --}}
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>

                {{-- زر الحفظ --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

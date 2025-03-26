{{-- @extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4 text-center">Add New Product</h4>
            <form action="{{url('categories/update/'.$category->id)}}" method="POST">
                @csrf
                @method('pach')
                اسم الصنف
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter name of product"/>
                </div>

                {{-- زر الحفظ --}}
                {{-- <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --}} 

@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Edit Category</h4>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.base')

@section('title', 'Create')

@section('main')
    <div class="container">

    @if(session('error'))
            <div class="toast align-items-center text-white bg-danger border-0 mx-auto mt-3" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <a href="{{route('books.index')}}" class="btn btn-primary mt-3"><i class="bi bi-arrow-left"></i></a>

        <!-- Title -->
        <h2 class="text-center text-success mb-3">Create a book</h2>

        <!-- Form thêm -->
        <form action="{{ route('books.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-2 text-end my-auto">
                        <label for="title">Title:</label>
                    </div>
                    
                    <div class="col-md-10">
                        <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-2 text-end my-auto">
                        <label for="author">Author:</label>
                    </div>
                    
                    <div class="col-md-10">
                        <input type="text" name="author" id="author" class="form-control" placeholder="" aria-describedby="helpId" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-2 text-end my-auto">
                        <label for="published_date">Published Date:</label>
                    </div>
                    
                    <div class="col-md-10">
                        <input type="date" name="published_date" id="published_date" class="form-control" placeholder="" aria-describedby="helpId" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-2 text-end my-auto">
                        <label for="quantity">Quantity:</label>
                    </div>
                    
                    <div class="col-md-10">
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="" aria-describedby="helpId" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-2 text-end my-auto">
                        <label for="category_id">Category:</label>
                    </div>
                    
                    <div class="col-md-10">
                        <select class="form-select" name="category_id" id="category_id" required>
                            <option selected>--None--</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-success ms-auto" type="submit">Create</button>
            </div>   
        </form>
    </div>
@endsection

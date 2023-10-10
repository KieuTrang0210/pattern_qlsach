@extends('layouts.base')

@section('title', 'Book Manager')

@section('main')
<div class="container">
    
        @if(session('success'))
            <div class="toast align-items-center text-white bg-success border-0 mx-auto mt-3" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Title -->
        <div class="d-flex align-items-center">
            <h3 class="text-center text-success my-3">Books Management</h3>
            <a href="{{ route('books.create') }}" class="btn btn-success ms-auto"> <i class="bi bi-plus-lg"></i> Add New Book</a>
        </div>

        <!-- Bảng hiển thị danh sách-->
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <th scope="row" class="text-center">{{ $book->id }}</th>
                        <td class="text-center">{{ $book->title }}</td>
                        <td class="text-center">{{ $book->author }}</td>
                        <td class="text-center">{{ $book->published_date }}</td>
                        <td class="text-center">{{ $book->quantity }}</td>
                        <td class="text-center">{{ $book->category_name}}</td>
                        
                        
                        <td class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-warning"> <i class="bi bi-pencil-fill"></i> </a>
                            <form action="#" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-dark" onclick="return confirm('Are you sure you want to delete?')">  <i class="bi bi-trash3-fill"></i>  </button>
                            </form>
                        </td>
                    </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
@endsection

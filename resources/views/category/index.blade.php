@extends('layouts.app')

@section('title','Manage Category | GBI JELTIM')
    
@section('content')
   @vite('resources/css/category.css')
   
    <div class="container-fluid" id="homeCategory">
        <div class="row">
            <div class="col-md-12 p-3">

                @include('category/create')
               <!-- Button trigger modal -->
                <button type="button" id="createCategoryBtn" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                    Create Category
                </button>

                   {{-- success message --}}
                @if (session('success_message'))
                <div class="alert alert-success mt-3 mb-3">{{ session('success_message')}}</div>
                @endif

                 {{-- Content --}}
                <table class="table table-striped border text-center" id="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td class="fw-bold" scope="row">{{$loop->iteration}}</td>
                            <td>{{$category->title}}</td>
                            <td>
                                <a href="{{route('editCategory' , $category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('deleteCategory', $category->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-category{{$category->id}}').submit()">Delete</a>
    
                                <form action="{{route('deleteCategory', $category->id)}}" class="d-none" id="delete-category{{$category->id}}" method="POST">
                                    @csrf
                                    @method('delete');
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
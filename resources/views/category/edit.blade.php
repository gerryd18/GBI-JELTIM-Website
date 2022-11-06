@extends('layouts.app')

@section('title','Manage Category | GBI JELTIM')
    @vite('resources/css/category.css')
@section('content')
    
    <div class="container" id="editCategory">
        <div class="row">
            <div class="col-md-6 p-3">

                @include('category/create')
               <!-- Button trigger modal -->
                <h2>Edit Category</h2>
                <hr>

                   {{-- success message --}}
                @if (session('success_message'))
                <div class="alert alert-success mt-3 mb-3">{{ session('success_message')}}</div>
                @endif
                
                <form action="{{route('updateCategory',$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="categoryTitle" class="form-label">Category Title</label>
                        <input  type="text" name="categoryTitle"  class="form-control @error('categoryTitle') is-invalid @enderror" placeholder="Input category title"  value="{{$category->title}}">
                        @error('categoryTitle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-primary btn-sm" type="submit"> Submit </button>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
@endsection
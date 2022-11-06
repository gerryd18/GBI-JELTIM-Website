@extends('layouts.app')

@section('title' , 'Edit Information | GBI JELTIM')

@section('content')
<div class="container">
    <div class=" col-md-8 p-3 rounded shadow">
        <h4>Edit Information</h4>
        <img src="{{asset('storage/images/cover/' . $info->cover)}}" class="w-50 rounded " alt="{{$info->title}}">
        <hr>
        
        {{-- Content --}}
        <form action="{{route('updateInformation', $info->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="categoryTitle" class="form-label">Cover</label>
                <input  type="file" name="cover"  class="form-control @error('cover') is-invalid @enderror" value="{{old('cover')}}">
                @error('cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input  type="text" name="title"  class="form-control @error('title') is-invalid @enderror" value="{{old('title') != null ? old('title') : $info->title}}" placeholder="contoh: Ibadah Umum (08:00)">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category" class="form-label @error('category') is-invalid @enderror">Select Category</label>
                <select name="category" class="form-control" >
                    {{-- pilihan kategori --}}
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option> 
                    @endforeach
                </select>
            
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <input  type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description') != null ? old('description') : $info->description}}" placeholder="Masukkan deskripsi">
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="date" class="form-label">Date</label>
                <input  type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date') != null ? old('date') : $info->date}}" placeholder="input information date">
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Content</label>

                <textarea name="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="input content" value="{{old('content')}}"> 
                    {{{ old('content')!= null ? old('content') : $info->content }}}
                </textarea>

                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-primary btn-sm" type="submit"> Submit </button>
            </div>
        </form>
        
    </div> 
</div>
@endsection
    
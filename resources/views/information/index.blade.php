@extends('layouts.app')

@section('title','Manage Information | GBI JELTIM')
    
@section('content')
   @vite('resources/css/category.css')
   
    <div class="container-fluid" id="homeCategory">
        <div class="row">
            <div class="col-md-12 p-3">

                @include('information/create')

                {{-- <form class="form-group mb-3" type="get" action="{{route('searchInformation')}}">
                    <label for="input" class="form-label">Search Information</label>
                    <input  type="text" name="input" class="form-control @error('input') is-invalid @enderror" value="{{old('input')}}" placeholder="input information input" placeholder="Judul Informasi">
                    @error('input')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </form> --}}

               <!-- Button trigger modal -->
                <button type="button" id="createInformationBtn" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#createInformationModal">
                    Create Information
                </button>

                   {{-- success message --}}
                @if (session('success_message'))
                <div class="alert alert-success mb-3">{{ session('success_message')}}</div>
                @endif

                 {{-- Content --}}
                <table class="table table-striped border text-center" id="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informations as $info)
                            <tr class="table-row">
                                <td style="width:15%">
                                    <img src="{{asset('storage/images/cover/' . $info->cover)}}" alt="{{$info->title}}" class="rounded information-img">
                                </td>
                                <td>
                                    <span class="d-block">{{$info->title}}</span>
                                    <span class="badge bg-info">{{$info->category->title}}</span>
                                </td>
                                <td>
                                    {{$info->description}}
                                </td>
                                <td>
                                    {{$info->user->name}}
                                </td>
                                <td>
                                    <a href="{{route('editInformation' , $info->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{route('deleteInformation', $info->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-category{{$info->id}}').submit()">Delete</a>
        
                                    <form action="{{route('deleteInformation', $info->id)}}" class="d-none" id="delete-category{{$info->id}}" method="POST">
                                        @csrf
                                        @method('delete');
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $informations->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
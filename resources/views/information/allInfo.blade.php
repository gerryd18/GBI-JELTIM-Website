@extends('layouts.app')

@section('title', 'Informations | GBI Jelambar Timur')

@section('content')
    @vite('resources/css/informations.css')

    <div class="container-fluid text-center" id="home-banner">
        <div class="col-md-12">
            <h1 class="banner-title">Informations</h1>
        </div>
        <p class="banner-text">'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.' - John 3:16</p>
    </div>


    <div class="container informations-container" >

        @if ($informations->count() == 0)
        <div class="alert alert-warning">There is no information!</div>
        @else
    
        <form action="{{route('searchInfo')}}" class="col-md-6 mb-4 form" method="POST">
            @csrf
            <span class="material-symbols-outlined">search</span>
            <input type="text" name="searchInput" class="form-control searchInput" placeholder="Search Blog ">
        </form>
        
          <div class="row">
            @foreach ($informations as $info)
            <div class="col-md-12 information shadow">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('storage/images/cover/' . $info->cover)}}" alt="{{$info->title}}" class="rounded w-100">
                    </div>
                    <div class="col-md-8 info-text">
                        <h3>{{$info->title}} <span class="badge bg-info">{{$info->category->title}}</span></h3>
                        <p>Description : {{$info->description}}</p>
                        <hr>
                        <p>{{$info->content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        <div class="pagination">
            {{ $informations->links() }}
        </div>
        @endif
    </div>

@endsection
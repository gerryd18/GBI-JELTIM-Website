@extends('layouts.app')

@section('title','Home Page | GBI JELTIM')

@section('content')
    @vite("resources/css/app.css")

    {{-- @guest
        <div class="container-fluid bg-light p-5" >
            <h3 class="title">Welcome To GBI JelTim</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, ut recusandae eaque ipsa voluptatibus in iusto et dicta. Velit, est.</p>
            <hr>
            <a href="{{url('blog/all')}}" class="btn btn-primary">Explore All Blog</a>
        </div>
    @else
        @if (Auth::user()->role == 'Admin')
            <h1>Hello Admin {{Auth::user()->name}} </h1>
        @elseif(Auth::user()->role == 'Member')
            <h1>Welcome Member {{Auth::user()->name}} </h1>
        @endif
    @endguest --}}

    <div class="container-fluid text-center" id="home-banner">
        <h1 class="banner-title">Welcome To GBI Jelambar Timur</h1>
        <p class="banner-text">'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.' - John 3:16</p>
    </div>

    

    <div class="about-us container" id="about-us">
        <div class="row">

            <div class="col-md-6 visi-misi p-4">
                <div class="col-md-12 tentang-kami mb-5" >
                    <h3>Tentang Kami</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis tempore aperiam blanditiis incidunt magni aliquam eligendi, animi harum aut optio.</p>
                </div>
                <div class="col-md-12 visi mb-5" >
                    <h3>Visi</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis tempore aperiam blanditiis incidunt magni aliquam eligendi, animi harum aut optio.</p>
                </div>
                <div class="col-md-12 misi mb-5" >
                    <h3>Misi</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis tempore aperiam blanditiis incidunt magni aliquam eligendi, animi harum aut optio.</p>
                </div>
            </div>

            <div class="col-md-6 gedung-img ">
                <img src="{{'/storage/images/home/gedung.jpg'}}" alt="" class="rounded shadow">
            </div>
        </div>
    </div>

    <div class="container" id="profil-gembala">
        <div class="section-title row">
            <h1>Profil Gembala</h1>
            <div class="divider"></div>
        </div>

        <div class="row profil-gembala-container">
            {{-- img --}}

            <div class="col-md-6 ">
                <img src="{{'/storage/images/home/church1.jpg'}}" alt="" class="w-100 rounded shadow">
            </div>

            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa reiciendis, optio iusto accusantium consectetur temporibus labore minima similique consequatur, totam soluta? Velit molestias eius eum atque qui ratione consequuntur, doloribus accusamus nostrum tempore, temporibus quod rerum unde nobis odio iusto, minima vero aliquam veritatis voluptas quia. Id nisi similique ad!</p>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <div class="container-fluid" id="ibadah">
        <div class="section-title row">
            <h1>Ibadah</h1>
            <div class="divider"></div>
        </div>

        <div class="container">
            <div class="row ibadah-row">
                @foreach ($informations as $info)    
                <div class="col-md-4 col-sm-8 info-ibadah">
                    <div class="col-md-12 rounded shadow information">
                        <img src="{{asset('storage/images/cover/'. $info->cover)}}" alt="" class="w-100 rounded-top">
                        <div class="info">
                            <div class="badge bg-info mb-2 ">{{$info->description}}</div>
                            <h4>{{$info->title}}</h4>
                            <div  class="info-date">
                                <span class="material-symbols-outlined">calendar_month</span>
                                {{$info->date}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid bg-info p-4" id="youtube">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Ikuti Kami di Youtube</h1>
            </div>
            <div class="col-md-12">
                <a href="https://www.youtube.com/channel/UCC5cQby2Hbr5YNzjlxZPmhw" target="_blank">
                    <img src="{{'storage/images/home/youtubeBtn.png'}}" alt="" class="youtubeBtn mt-4">
                </a>
            </div>
        </div>
        
    </div>


@endsection

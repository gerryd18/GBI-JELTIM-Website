@extends('layouts.app')

@section('title', 'Hubungi Kami | GBI JELTIM')

@section('content')
@vite('resources/css/app.css')
     <div class="container-fluid text-center" id="contact-banner">
        <div class="col-md-12">
            <h1 class="banner-title">Hubungi Kami</h1>
        </div>
        <p class="banner-text">'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.' - John 3:16</p>
    </div>


    <div id="location" class="container">
        <div class="maps-container col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.915371565384!2d106.78252991455443!3d-6.142069695552934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6268119b4bb%3A0xcd6100678bff19ec!2sGereja%20Bethel%20Indonesia%20Jelambar%20Timur!5e0!3m2!1sid!2sid!4v1667015778714!5m2!1sid!2sid" class="maps shadow rounded" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="container" id="location-details">
        <div class="location-detail mb-5">
            <div class="info-icon bg-dark rounded shadow">
                <span class="material-symbols-outlined">location_on</span>
            </div>
            <h4 class="info-text">Jl. I No.52, RW.6, Pejagalan, Kec. Penjaringan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14450</h4>
        </div>
        <div class="location-detail mb-5">
            <div class="info-icon bg-dark rounded shadow">
                <i class='bx bx-envelope' style='color:#ffffff' ></i>
            </div>
            <h4 class="info-text">gbijeltim@gmail.com</h4>
        </div>
        <div class="location-detail mb-5">
            <div class="info-icon bg-dark rounded shadow">
                <i class='bx bxl-whatsapp' style='color:#ffffff' ></i>
            </div>
            <h4 class="info-text">0812-8484-9822</h4>
        </div>
    </div>
@endsection
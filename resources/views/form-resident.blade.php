@extends('layouts.mainlayout')


{{-- untuk judul --}}
@section('title','add-resident')

{{-- template navbar, bootstrap dan body --}}
@yield('navbar')

{{-- section content adalah konten utama websitenya, berada dibawah navbar ,note: tidak perlu menggunakan tag body lagi--}}
@section('content')




<h1>INPUT DATA WARGA</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mt-5 col-8 m-auto">
    <form action="/add-resident" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" >
            <label for="NAMA">Nama</label>
            <input class="form-control" name="name" placeholder="name" required>
        </div>
        <div class="mb-3" >
            <label for="norum">house number</label>
            <input class="form-control" name="house_number" placeholder="house number" required>
        </div>
        <div class="mb-3" >
            <label for="notel">phone number</label>
            <input class="form-control" name="phone_number" placeholder="phone number" required>
        </div>
        <div class="mb-3" >
            <label for="block">block</label> <br>
            <select name="block_id">
                <option selected value="">Open this select menu</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
                <option value="5">E</option>
                <option value="6">F</option>
                <option value="7">G</option>
                <option value="8">H</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="photo"> upload photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>





@endsection










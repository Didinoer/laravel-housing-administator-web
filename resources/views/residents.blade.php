@extends('layouts.mainlayout')


{{-- untuk judul --}}
@section('title','warga')

{{-- template navbar, bootstrap dan body --}}
@yield('navbar')

{{-- section content adalah konten utama websitenya, berada dibawah navbar ,note: tidak perlu menggunakan tag body lagi--}}
@section('content')



<h1> resident list </h1>

<h1>selamat datang {{Auth::user() -> name }} <br> role : {{Auth::user() -> role -> name }}</h1>
<form action="" method="get">
  <div class="input-group mb-3 mt-5">
    <input type="text" name="keyword" class="form-control" placeholder="resident name">
    <div class="input-group-append">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </div>
  </div>
</form>

<table class="table">
    <tr>
        <th> No </th>
        <th> Nama </th>
        <th> block </th>
        <th> Nomor rumah</th>
        <th> Nomor telefone</th>
    </tr>
  @foreach ($data_warga as $item)
      <tr>
        <td>{{$item ['id']}}</td>
        <td>{{$item ['name']}}</td>
        <td>{{$item ['block']['block_name']}}</td>
        <td>{{$item ['house_number']}}</td>
        <td>{{$item ['phone_number']}}</td>
        <td>
            @if ($item['image'] != '')
            <img src="{{asset('storage/img/'.$item['image'])}}" alt="asdad" width="100px">
            @else
            <img src="{{asset('avatar/—Pngtree—manager business office illustration_4542477.png')}}" alt="" width="100px">
            @endif
        </td>
      </tr>
  @endforeach
</table>

<div>
    {{$data_warga ->withQueryString() -> links()}}
</div>




@endsection








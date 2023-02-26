@extends('layouts.mainlayout')


{{-- untuk judul --}}
@section('title','blocks')

{{-- template navbar, bootstrap dan body --}}
@yield('navbar')

{{-- section content adalah konten utama websitenya, berada dibawah navbar ,note: tidak perlu menggunakan tag body lagi--}}
@section('content')

<h1> block information list </h1>
<table class="table">
    <tr>
        <th> No </th>
        <th> Nama block</th>
        <th> daftar warga </th>
    </tr>
  @foreach ($data_block as $item)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$item -> block_name}}</td>
        <td>
        @foreach ($item -> resident as $resident )
        - {{$resident['name']}} <br>
        @endforeach
        </td>
@endforeach
</table>




@endsection








@extends('layouts.mainlayout')


{{-- untuk judul --}}
@section('title','edit resident')

{{-- template navbar, bootstrap dan body --}}
@yield('navbar')

{{-- section content adalah konten utama websitenya, berada dibawah navbar ,note: tidak perlu menggunakan tag body lagi--}}
@section('content')



<a class="btn btn-primary" href="/form-resident">Add resident</a>

@if (Session::has('status-add'))
    <div class="alert alert-success">
        {{ session('message-add') }}
    </div>
@elseif (Session::has('status-edit'))
    <div class="alert alert-success">
        {{ session('message-edit') }}
    </div>
@elseif (Session::has('status-delete'))
    <div class="alert alert-success">
        {{ session('message-delete') }}
    </div>
@endif
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
        <td>{{$loop -> iteration}}</td>
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
        <td><a class="btn btn-xs btn-primary btn-flat btn-sm" href="/edit-resident-data/{{$item -> id}}">edit</a></td>
        <td> <form method="get" action="/resident-delete/{{$item->id}}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
        </form>
        </td>
      </tr>
  @endforeach
</table>
<div>
    {{$data_warga ->withQueryString() -> links()}}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>




@endsection








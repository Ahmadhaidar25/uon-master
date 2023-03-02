@extends('layout.main')
@section('content')
<!-- Small boxes (Stat box) -->


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kelas Online</li>
  </ol>
</nav>
@if($data->count())
@foreach($data->chunk(2) as $z)

<div class="row">
  @foreach($z as $x)
  @if($x->user->id == Auth::user()->id)
  <div class="col-xl-6 col-md-6 mb-4">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$x->listmapel->mapel->nama_mapel}}</h3>

        <p>Guru:&nbsp;{{$x->listmapel->user->guru->nama_guru}}<br>{{$x->status}}</p>
        <p></p>
      </div>
      <div class="icon">
       <i class="bi bi-journal-check"></i>
     </div>
     <a href="{{url('/materi/ujian/online/'.$x->id)}}" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right"></i></a>
   </div>
 </div>
 @endif
 @endforeach
 

 <!-- ./col -->
</div>
@endforeach
@else
<img src="{{url('template/gambar/class.png')}}" class="rounded mx-auto d-block"
style="width: 50%;">
<h3 class="text-center">Data Kelas Tidak Ditemukan</h3>
@endif
<!-- ./col -->

@endsection
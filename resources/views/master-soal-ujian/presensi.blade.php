@extends('layout.main')
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Riwayat Presensi</li>
	</ol>
</nav>
@foreach($data as $x)
@if($x->user->id == Auth::user()->id)
<div class="card">
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
			<div class="row justify-content-between">
				<div class="col">
					<h5>
						{{$x->user->siswa->nama_siswa}}
					</h3>

				</div>

				<div class="col" style="float: right;">
					@if($x->ket=='hadir')
					<div class="badge bg-success text-wrap" style="width: 6rem; float: right;">
						{{$x->ket}}&nbsp;<i class="bi bi-check-circle-fill"></i>
					</div>
					@elseif($x->ket=='izin')
					<div class="badge bg-secondary text-wrap" style="width: 6rem; float: right;">
						{{$x->ket}}&nbsp;<i class="bi bi-clipboard-x"></i>
					</div>

					@elseif($x->ket=='sakit')
					<div class="badge bg-danger text-wrap" style="width: 6rem; float: right;">
						{{$x->ket}}&nbsp;<i class="bi bi-hospital"></i>
					</div>
					@endif
				</div>
			</div>

			<div class="row justify-content-between">
				<div class="col" >
					<p style="float: right;">
						{{$x->created_at}}
					</p>
					
				</div>
			</div>
		</li>
		<li class="list-group-item">{{$x->plmapel->listmapel->nama_ujian}}</li>
		
	</ul>
</div>
@endif
@endforeach
@endsection
@extends('layout.main')
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Riwayat Tugas</li>
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
						{{$x->user->nama}}
					</h3>

				</div>



				<div class="col">
					@if($x->status==1)
					<div class="badge bg-success text-wrap" style="width: 6rem; float: right;">
						dikerjakan&nbsp;<i class="bi bi-check-circle-fill"></i>
					</div>
                    @elseif($x->status==2)
					<div class="badge bg-primary text-wrap" style="width: 6rem; float: right;">
						sudah dinilai&nbsp;<i class="bi bi-check-circle-fill"></i>
					</div>
					@endif
				</div>
			</div>


			<div class="row justify-content-between">
				<div class="col" >
					<h3>
						{{$x->plmapel->listmapel->nama_ujian}}
					</h3>

				</div>
				<div class="col" >
					<p style="float: right;">
						{{$x->created_at}}
					</p>
					
				</div>
			</div>

			
		</li>
		<li class="list-group-item">
			<button type="button" data-bs-toggle="modal" class="btn btn-info" data-bs-target="#lihat-tugas-{{$x->id}}">Lihat</button>
		</li>
		
	</ul>
</div>
@endif
@endforeach


@foreach($data as $l)
<div class="modal fade" id="lihat-tugas-{{$l->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
			</div>
			<div class="modal-body">
				<iframe src="{{url('tugas/'.$l->file)}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>

			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
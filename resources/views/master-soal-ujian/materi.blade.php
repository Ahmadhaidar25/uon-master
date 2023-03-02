@extends('layout.main')
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Library</li>
	</ol>
</nav>
<div class="card">
	<div class="card-body">
		<h5 class="card-title"><b>{{$materi->mapel}}</b></h5><br>
		<p>{{$materi->mapel}}</p>
		<p>
			<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				Tugas
			</a>

			<a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#presensi">
				<i class="bi bi-upload"></i>&nbsp;Presensi
			</a>
			<a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#upload_tugas">
				<i class="bi bi-upload"></i>&nbsp;Upload Tugas
			</a>
			

			<button type="button" class="btn btn-warning position-relative"
			data-bs-toggle="collapse" href="#komentar-{{$materi->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
			<i class="bi bi-chat-dots"></i>&nbsp;Komentar
			<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
				{{$materi->komentar->count()}}

			</span>
		</button>

		<a href="{{url('/ujian/online')}}" class="btn btn-danger">
			Kembali
		</a>

	</p>




	<div class="collapse" id="komentar-{{$materi->id}}">
		<div class="card card-body">
			@foreach($materi->komentar()->where('parent',0)->orderBy('id','desc')->get() as $k)
			<div class="card">
				<div class="card-header">
					@if($k->user->siswa==true)
					{{$k->user->siswa->nama_siswa}}
					@elseif($k->user->guru==true)
					{{$k->user->guru->nama_guru}}
					@endif
				</div>
				<div class="card-body">

					<p class="card-text">{{$k->komentar}}</p>
					<hr>
					<a data-bs-toggle="collapse" href="#balas" role="button" aria-expanded="false" aria-controls="collapseExample">
					Balas&nbsp;{{$k->cailds1->count()}}

					</a>

					<div class="collapse" id="balas">
						<div class="card card-body">
							<form action="{{url('/balas/komentar')}}" method="post">
								<div class="input-group mb-3">
									@csrf
									<input type="hidden" name="plmapel_id" value="{{$materi->id}}">
									<input type="text" class="form-control" placeholder="balas komentar..." name="komentar">
									<input type="hidden" name="parent" value="{{$k->id}}">
									<button class="btn btn-success" type="submit"><i class="bi bi-send"></i></button>
								</div>
							</form>

							<hr>
							@foreach($k->cailds1()->orderBy('created_at','desc')->get() as $c1)
							<div class="card" style="margin-left: 50px;">
								<div class="card-header">
									@if($c1->user->siswa==true)
									{{$c1->user->siswa->nama_siswa}}
									@elseif($c1->user->guru==true)
									{{$c1->user->guru->nama_guru}}
									@endif
								</div>
								<div class="card-body">
									
									<p class="card-text">{{$c1->komentar}}</p>
									
								</div>
							</div>
							@endforeach

						</div>
					</div>


				</div>
				
			</div>

			

			@endforeach


			<hr>
			<form action="{{url('/post/komentar')}}" method="post">
				<div class="input-group mb-3">
					@csrf
					<input type="hidden" name="plmapel_id" value="{{$materi->id}}">
					<input type="text" class="form-control" placeholder="tulis komentar..." name="komentar">
					<input type="hidden" name="parent" value="0">
					<button class="btn btn-success" type="submit"><i class="bi bi-send"></i></button>
				</div>
			</form>
		</div>
	</div>



	<div class="collapse" id="collapseExample">
		<div class="card card-body">


			<div class="btn-group" style="width: 100px;"  role="group" aria-label="Basic mixed styles example">
				<button type="button" class="btn btn-danger" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#exampleModal">Zoom</button>

			</div>
			<br>
			<div class="row">
				<div class="col-xl-6 col-md-6 mb-4">

					<iframe src="{{url('file/'.$materi->listmapel->file)}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>

				</div>

				<div class="col-xl-6 col-md-6 mb-4">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Judul</label>
						<input type="text" class="form-control" value="{{$materi->listmapel->nama_ujian}}" readonly>
					</div>
					<div class="mb-3">
						<label class="form-label">Mapel</label>
						<input type="text" class="form-control" 
						value="{{$materi->listmapel->mapel->nama_mapel}}" readonly>
					</div>

					<div class="mb-3">
						<label class="form-label">Guru</label>
						<input type="text" class="form-control" 
						value="{{$materi->listmapel->user->guru->nama_guru}}" readonly>
					</div>

					<div class="mb-3">
						<label class="form-label">Tanggal</label>
						<input type="text" class="form-control" 
						value="{{$materi->listmapel->tanggal}}" readonly>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
			</div>
			<div class="modal-body">
				<iframe src="{{url('file/'.$materi->listmapel->file)}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>

			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="presensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Presensi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/post/presensi')}}" method="post">
				<div class="modal-body">
					@csrf
					<input type="hidden" name="plmapel_id" value="{{$materi->id}}">

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" value="hadir"
						name="ket">
						<label class="form-check-label" for="inlineCheckbox1">
							Hadir
						</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox"
						value="izin" name="ket">
						<label class="form-check-label" for="inlineCheckbox2">
							Izin
						</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox"
						value="sakit" name="ket">
						<label class="form-check-label" for="inlineCheckbox2">
							Sakit
						</label>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_tugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kirim Tugas Anda</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/post/tugas')}}" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					@csrf
					<input type="hidden" name="plmapel_id" value="{{$materi->id}}">
					<div class="input-group mb-3">
						<input type="file" class="form-control" name="file">
						<label class="input-group-text" for="inputGroupFile02">Upload</label>

					</div>
					<span class="text-danger">extension: pdf</span>
					<input type="hidden" name="parent" value="0">
					<input type="hidden" name="status" value="1">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
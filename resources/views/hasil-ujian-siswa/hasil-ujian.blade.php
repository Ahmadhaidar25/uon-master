@extends('layout.main')
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Hasil Ujian</li>
	</ol>
</nav>
<p>{{$data->count()}}</p>
@if($hasil_ujian->count())
@foreach($hasil_ujian->chunk(2) as $z)
<div class="row">
	@foreach($z as $x)
	
    
	<div class="col-xl-6 col-md-4 mb-6">
		<div class="card">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="row justify-content-between">
						<div class="user-panel pb-3 mb-3 d-flex">
							<div class="image">
								@if($x->user->siswa->avatar==null)
								<img src="{{url('template/gambar/user.png')}}" class="img-circle elevation-2" alt="User Image">
								@else
								<img src="{{url('avatar/'.$x->user->siswa->avatar)}}" class="img-circle elevation-2" alt="User Image">
								@endif
							</div>
							<div class="info">
								<h5>
									{{$x->user->siswa->nama_siswa}}
								</h5>
							</div>
						</div>
						<div class="col" >
							<p style="float: right;">
								{{$x->created_at}}
							</p>

						</div>

					</div>


					<div class="row justify-content-between">
						<div class="col" >
							<h3 style="margin-top: -20px;">
								{{$x->plmapel->listmapel->nama_ujian}}
							</h3>

						</div>
						
					</div>


				</li>
				<li class="list-group-item">
					<button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#lihat-{{$x->id}}" aria-expanded="false" aria-controls="collapseExample">Lihat</button>

					<!-- Button trigger modal -->
					@if($x->status==1)
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nilai-{{$x->id}}">
						Nilai
					</button>
					@elseif($x->status==2)
					<button type="button" class="btn btn-secondary" disabled>Nilai</button>
					@endif

					@if($x->status==1)

					<div class="badge bg-danger text-wrap" style="width: 3rem; float: right;">
						<i class="bi bi-x-circle-fill"></i>
						
					</div>
					@elseif($x->status==2)
					<div class="badge bg-success text-wrap" style="width: 3rem; float: right;">
						<i class="bi bi-check-circle-fill"></i>
						
					</div>
					@endif

				</li>

			</ul>


			<div class="collapse" id="lihat-{{$x->id}}">
				<div class="container">
					&nbsp;
					&nbsp;
					<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#zoom-{{$x->id}}">Zoom</button>
				</div>
				<div class="card card-body">

					<iframe src="{{url('tugas/'.$x->file)}}" align="top" height="600" width="100%" frameborder="0" scrolling="auto"></iframe>
				</div>
			</div>


			<div class="modal fade" id="nilai-{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{url('/post/nilai',$x->id)}}" method="post">
							<div class="modal-body">
								@csrf
								<input type="hidden" name="tugas_id" value="{{$x->id}}">
								<div class="mb-3">
									<label class="form-label">Nilai</label>
									<input type="number" class="form-control" name="nilai">
								</div>
								<input type="hidden" name="status" value="2">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Sumbit</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="zoom-{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"></h5>
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
								<i class="bi bi-x-lg"></i>
							</button>
						</div>
						<div class="modal-body">
							<iframe src="{{url('tugas/'.$x->file)}}" align="top" height="600" width="100%" frameborder="0" scrolling="auto"></iframe>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
								Tutup
							</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	@endforeach
</div>
@endforeach
@else
<center>
<svg xmlns="http://www.w3.org/2000/svg" width="200" height="300" fill="currentColor" class="bi bi-database-fill-x" viewBox="0 0 16 16">
	<path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
	<path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z"/>
	<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
</svg>
</center>
<h3 class="text-center">Data hasil ujian belum ada</h3>
@endif



@endsection
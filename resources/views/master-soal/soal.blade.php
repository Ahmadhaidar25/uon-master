@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="card-title">Data Soal Ujian</h3>
			</div>
			<div class="col-6">
				<a href="{{url('/tambah/soal')}}" class="btn btn-success" style="float: right;">
					<i class="bi bi-plus-lg"></i>Tambah</a>
				</div>

			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table id="mapel" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Guru</th>
							<th>Judul Soal Ujian</th>
							<th>Nama Mapel</th>
							<th>File</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tbody>
						@php $no =1; @endphp
						@foreach($data as $x)
						@if($x->user->id == Auth::user()->id)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$x->user->guru->nama_guru}}</td>
							<td>{{$x->nama_ujian}}</td>
							<td>{{$x->mapel->nama_mapel}}</td>
							
							<td><a href="" class="nav-link"  data-bs-toggle="modal" data-bs-target="#exampleModal-{{$x->id}}">Lihat</a></td>
							
							
							
							<td>{{$x->tanggal}}</td>
							<td>
								@if($x->status==1)
								<div class="badge bg-success text-wrap" style="width: 6rem;">
									Aktif
								</div>
								@else
								<div class="badge bg-danger text-wrap" style="width: 6rem;">
									Tidak Aktif
								</div>
								@endif
							</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic outlined example">
									<a href="{{url('/edit/soal/'.$x->id)}}" class="btn btn-outline-warning">Edit</a>
									<a href="{{url('/hapus/soal/'.$x->id)}}" class="btn btn-outline-danger btn1">Hapus</a>

								</div>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	@foreach($data as $lihat)
	<div class="modal fade" id="exampleModal-{{$lihat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<iframe src="{{url('file/'.$lihat->file)}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
					
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endsection
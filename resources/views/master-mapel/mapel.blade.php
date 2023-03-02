@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="card-title">Data Mata Pelajaran</h3>
			</div>
			<div class="col-6">
				<a href="{{url('/tambah/mapel')}}" class="btn btn-success" style="float: right;">
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
							<th>Kode Mapel</th>
							<th>Guru</th>
							<th>Nama Pelajaran</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach($data as $x)
						
						<tr>
							<td>{{$no++}}</td>
							<td>{{$x->kode_mapel}}</td>
							<td>{{$x->user->guru->nama_guru}}</td>
							<td>{{$x->nama_mapel}}</td>
							<td><div class="btn-group" role="group" aria-label="Basic outlined example">
								<a href="{{url('/edit/mapel/'.$x->id)}}" class="btn btn-outline-warning">Edit</a>
								<a href="{{url('/hapus/mapel/'.$x->id)}}" class="btn btn-outline-danger btn1">Hapus</a>
								
							</div></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	@endsection
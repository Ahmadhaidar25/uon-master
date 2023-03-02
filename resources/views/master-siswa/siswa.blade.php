@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="card-title"><i class="bi bi-server"></i>Data Siswa</h3>
			</div>
			<div class="col-6">
				<a href="{{url('/tambah/siswa')}}" class="btn btn-success" style="float: right;">
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
							<th>Aksi</th>
							<th>Nama Siswa</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>No Telepon</th>
							<th>Avatar</th>
							<th>Kelas</th>
							

						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach($data as $x)
						
						<tr>
							<td>
								<div class="btn-group" role="group" aria-label="Basic outlined example">
									<a href="{{url('/edit/siswa/'.$x->id)}}" class="btn btn-outline-warning">Edit</a>
									<a href="{{url('/hapus/siswa/'.$x->id)}}" class="btn btn-outline-danger btn1">Hapus</a>

								</div>
							</td>
							<td>{{$x->nama_siswa}}</td>
							<td>{{$x->tempat_lahir}}</td>
							<td>{{$x->tgl_lahir}}</td>
							<td>{{$x->umur}}</td>
							<td>
								@if($x->jk==1)
								<div class="badge bg-primary text-drak" style="width: 6rem;">
									Laki-Laki
								</div>
								@else

								<div class="badge" style="width: 6rem; background-color: pink;">
									Perempuan
								</div>
								@endif
							</td>
							<td>{{$x->alamat}}</td>
							<td>{{$x->no_tlp}}</td>
							<td>
								@if($x->avatar==null)
								<div class="image">
									<img src="{{url('template/gambar/user.png')}}" class="img-circle elevation-2" alt="User Image" style="width: 100px; height: 100px;">
								</div>
								@else
								<div class="image">
									<img src="{{url('avatar/'.$x->avatar)}}" class="img-circle elevation-2" alt="User Image" style="width: 100px; height: 100px;">
								</div>
								@endif
								
								
							</td>
							<td>{{$x->kelas}}</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	@endsection
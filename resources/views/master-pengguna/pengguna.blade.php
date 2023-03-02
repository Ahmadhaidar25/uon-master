@extends('layout.main')
@section('content')
<!-- table pengguna guru-->
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="card-title"><i class="bi bi-server"></i>&nbsp;Data Pengguna Guru</h3>
			</div>
			<div class="col-6">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-guru" style="float: right;">
					<i class="bi bi-plus-lg"></i>Tambah</a>
				</button>

			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table id="table-pengguna-guru" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Aksi</th>
							<th>Nig</th>
							<th>Email</th>
							<th>Levels</th>
							<th>Status</th>

						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach($guru as $x)

						<tr>
							<td>
								<div class="btn-group" role="group" aria-label="Basic outlined example">
									<a href="{{url('/edit/guru/'.$x->id)}}" class="btn btn-outline-warning" data-bs-toggle="modal" 
									data-bs-target="#modal-edit-guru-{{$x->id}}">Edit</a>
									<a href="{{url('/hapus/guru/'.$x->id)}}" class="btn btn-outline-danger btn1">Hapus</a>

								</div>
							</td>

							<td>{{$x->nis}}</td>
							<td>{{$x->email}}</td>
							<td>{{$x->levels}}</td>
							<td>
								@if($x->status==1)
								<div class="badge bg-success" style="width: 6rem;">
									Aktif
								</div>
								@elseif($x->status==0)
								<div class="badge bg-danger" style="width: 6rem;">
									Tidak Aktif
								</div>
								@endif
							</td>


						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
</div>


	<div class="modal fade" id="modal-guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{url('/post/pengguna/guru')}}" method="post">
					<div class="modal-body">
						@csrf
						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nama Pengguna</label>
							<div class="col-md-10">
								<select class="form-control" name="guru_id" id="select-guru" style="width: 100%;">
									<option value="">--pilih--</option>
									@foreach($select_guru as $x)
									<option value="{{$x->id}}">{{$x->nama_guru}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nig</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nis">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<div class="input-group mb-3">
									<input type="password" class="form-control" placeholder="*****"
									id="password" name="password">
									<button type="button" class="input-group-text" 
									id="show-password-btn"><i class="bi bi-eye"></i></button>
								</div>
							</div>
						</div>

						<input type="hidden" name="levels" value="guru">

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<label class="switch">
									<input type="checkbox" name="status" value="1">
									<span class="slider"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
							Tutup
						</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--end table guru-->

	<!--modal edit guru-->
	@foreach($guru as $edit)
	<div class="modal fade" id="modal-edit-guru-{{$edit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{url('/update/pengguna/guru/'.$edit->id)}}" method="post">
					<div class="modal-body">
						@csrf
						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nama Pengguna</label>
							<div class="col-md-10">
								<select class="form-control" name="guru_id" id="select-guru" style="width: 100%;">
									<option value="{{$edit->guru->id}}">{{$edit->guru->nama_guru}}</option>
									
								</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nig</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nis" 
								value="{{$edit->nis}}">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email"
								value="{{$edit->email}}">
							</div>
						</div>
						<input type="hidden" name="levels" value="guru">

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<label class="switch">
									<input type="checkbox" name="status" 
									{{$edit->status ? 'checked' : ''}}>
									<span class="slider"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
							Tutup
						</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach
	<!--end modal edit guru-->


<!-- table pengguna siswa-->
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="card-title"><i class="bi bi-server"></i>&nbsp;Data Pengguna Siswa</h3>
			</div>
			<div class="col-6">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-siswa" style="float: right;">
					<i class="bi bi-plus-lg"></i>Tambah</a>
				</button>

			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table id="table-pengguna-siswa" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Aksi</th>
							<th>Nis</th>
							<th>Email</th>
							<th>Levels</th>
							<th>Status</th>

						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach($siswa as $x)

						<tr>
							<td>
								<div class="btn-group" role="group" aria-label="Basic outlined example">
									<a href="" class="btn btn-outline-warning" 
									data-bs-toggle="modal" data-bs-target="#modal-edit-siswa-{{$x->id}}">Edit</a>

									<a href="{{url('/hapus/guru/'.$x->id)}}" class="btn btn-outline-danger btn1">Hapus</a>

								</div>
							</td>

							<td>{{$x->nis}}</td>
							<td>{{$x->email}}</td>
							<td>{{$x->levels}}</td>
							<td>
								@if($x->status==1)
								<div class="badge bg-success" style="width: 6rem;">
									Aktif
								</div>
								@elseif($x->status==0)
								<div class="badge bg-danger" style="width: 6rem;">
									Tidak Aktif
								</div>
								@endif
							</td>


						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
</div>


	<div class="modal fade" id="modal-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{url('/post/pengguna/siswa')}}" method="post">
					<div class="modal-body">
						@csrf
						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nama Pengguna</label>
							<div class="col-md-10">
								<select class="form-control" name="siswa_id" id="select-siswa" style="width: 100%;">
									<option value="">--pilih--</option>
									@foreach($select_siswa as $x)
									<option value="{{$x->id}}">{{$x->nama_siswa}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nis</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nis">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<div class="input-group mb-3">
									<input type="password" class="form-control" placeholder="*****"
									id="password" name="password">
									<button type="button" class="input-group-text" 
									id="show-password-btn"><i class="bi bi-eye"></i></button>
								</div>
							</div>
						</div>

						<input type="hidden" name="levels" value="siswa">

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<label class="switch">
									<input type="checkbox" name="status" value="1">
									<span class="slider"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
							Tutup
						</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--end table siswa-->

	<!--modal edit siswa-->
	@foreach($siswa as $edit)
	<div class="modal fade" id="modal-edit-siswa-{{$edit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{url('/update/pengguna/siswa/'.$edit->id)}}" method="post">
					<div class="modal-body">
						@csrf
						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nama Pengguna</label>
							<div class="col-md-10">
								<select class="form-control" name="siswa_id" id="select-siswa" style="width: 100%;">
									<option value="{{$edit->siswa->id}}">{{$edit->siswa->nama_siswa}}</option>
									
								</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Nig</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nis" 
								value="{{$edit->nis}}">
							</div>
						</div>

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email"
								value="{{$edit->email}}">
							</div>
						</div>
						<input type="hidden" name="levels" value="siswa">

						<div class="mb-3 row">
							<label class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<label class="switch">
									<input type="checkbox" name="status" 
									{{$edit->status ? 'checked' : ''}}>
									<span class="slider"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
							Tutup
						</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach


	@endsection
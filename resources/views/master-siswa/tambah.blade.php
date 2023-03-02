@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<i class="bi bi-journal-plus"></i>&nbsp;Tambah Mapel
	</div>
	<br>
	<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $message }}</strong>
		</div>
		@endif
	</div>
	<form action="{{url('/post/siswa')}}" method="post" enctype="multipart/form-data" method="post">
		<div class="card-body">
			@csrf
			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_siswa">
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Tempat Lahir
					<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tempat_lahir">
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir
					<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Umur
					<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="umur" id="umur" readonly>
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin
					<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jk"
						value="1">
						<label class="form-check-label">Laki-Laki</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jk" 
						value="2">
						<label class="form-check-label">Perempuan</label>
					</div>
					
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="alamat"></textarea>
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">No Telepon/Wa</label>
				<div class="col-sm-10">
					<input type="number" name="no_tlp" class="form-control">
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
				<div class="col-sm-10">
					<input type="file" name="avatar" class="form-control">
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Kelas
					<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select class="form-control" name="kelas">
						<option value="">--pilih--</option>
						<option value="10">Kelas 10</option>
						<option value="11">Kelas 11</option>
						<option value="12">Kelas 12</option>
					</select>
				</div>
			</div>

			<div class="btn-group" style="float: right;">
				<a href="{{url('mapel')}}" class="btn btn-danger">Kembali</a>
				<button type="reset" class="btn btn-warning text-white">Reset</button>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>

@endsection
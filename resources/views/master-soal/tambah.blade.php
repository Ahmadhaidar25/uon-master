@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<i class="bi bi-journal-plus"></i>&nbsp;Tambah Soal Ujian
	</div>
	<br>
	<div class="container">
		
	</div>
	<form action="{{url('/post/soal')}}" enctype="multipart/form-data" method="post">
		<div class="card-body">
			@csrf
			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Judul Soal Ujian</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_ujian">
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">File</label>
				<div class="col-sm-10">
					<div class="input-group mb-3">
						<input type="file" class="form-control" name="file">
						<label class="input-group-text" for="inputGroupFile02">Upload</label>
					</div>
				</div>
			</div>


			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Nama Mapel</label>
				<div class="col-sm-10">
					<select class="form-control mapel" name="mapel_id">
						<option value="" selected>--Pilih Mapel--</option>
						@foreach($mapel as $x)
						@if($x->user->id == Auth::user()->id)
						<option value="{{$x->id}}">{{$x->nama_mapel}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal" class="form-control">
				</div>
			</div>

			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-10">
					<label class="switch">
						<input type="checkbox" name="status" value="1">
						<span class="slider"></span>
					</label>
				</div>
			</div>

			
			<div class="btn-group" style="float: right;">
				<a href="{{url('/soal/ujian')}}" class="btn btn-danger">Kembali</a>
				<button type="reset" class="btn btn-warning text-white">Reset</button>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>

@endsection
@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-xl-6 col-md-6 mb-4">
		
		<div class="card">
			<div class="card-header">
				<i class="bi bi-journal-plus"></i>&nbsp;Edit Soal Ujian
			</div>
			<br>
			<div class="container">

			</div>
			<form action="{{url('/ubah/soal/'.$data->id)}}" enctype="multipart/form-data" method="post">
				<div class="card-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Judul</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_ujian" value="{{$data->nama_ujian}}">
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
						<label for="inputPassword" class="col-sm-2 col-form-label">Mapel</label>
						<div class="col-sm-10">
							<select class="form-control mapel" name="mapel_id">
								<option value="{{$data->mapel_id}}" selected>
									{{$data->mapel->nama_mapel}}</option>
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
								<input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control">
							</div>
						</div>

						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<label class="switch">
									<input type="checkbox" name="status"
									 {{$data->status ? 'checked' : ''}}>
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
			
		</div>
		<div class="col-xl-6 col-md-6 mb-4">
			
			<div class="card">
				<div class="card-header">
					File
				</div>
				<div class="card-body">
					<iframe src="{{url('file/'.$data->file)}}" align="top" height="500" width="100%" frameborder="0" scrolling="auto"></iframe>
				</div>
			</div>
			
		</div>
	</div>

	@endsection
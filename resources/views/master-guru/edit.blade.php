@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-8">
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
			<form action="{{url('/update/guru/'.$edit->id)}}" method="post" enctype="multipart/form-data" method="post">
				<div class="card-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Nama Guru</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_guru" value="{{$edit->nama_guru}}">
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="tempat_lahir" 
							value="{{$edit->tempat_lahir}}">
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"
							value="{{$edit->tgl_lahir}}">
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Umur</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="umur" id="umur"
							value="{{$edit->umur}}" readonly>
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk"
								value="1" {{$edit->jk==1 ? 'checked' : ''}}>
								<label class="form-check-label">Laki-Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk" 
								value="2" {{$edit->jk==2 ? 'checked' : ''}}>
								<label class="form-check-label">Perempuan</label>
							</div>

						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="alamat">
								{{$edit->alamat}}
							</textarea>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-2 col-form-label">No Telepon/Wa</label>
						<div class="col-sm-10">
							<input type="number" name="no_tlp" class="form-control"
							value="{{$edit->no_tlp}}">
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
						<div class="col-sm-10">
							<input type="file" name="avatar" class="form-control">
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<select class="form-control" name="status">
								@if($edit->status=='guru tetap')
								<option value="guru tetap">Guru Tetap</option>
								<option value="guru honorer">Guru Honorer</option>
								@elseif($edit->status=='honorer')
								<option value="guru tetap">Guru Tetap</option>
								<option value="guru honorer">Guru Honorer</option>
								@endif
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
	</div>

	<div class="col-md-4">
		
		@if($edit->avatar==null)

		<img src="{{url('template/gambar/user.png')}}" class="img-thumbnail" alt="User Image" width="100%">

		@else

		<img src="{{url('avatar/'.$edit->avatar)}}" class="img-thumbnail" alt="User Image" width="100%">

		@endif

		
	</div>
</div>
@endsection
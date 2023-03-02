@extends('layout.main')
@section('content')
<div class="card">
	<div class="card-header">
		<i class="bi bi-journal-plus"></i>&nbsp;Edit Mapel
	</div>
	<br>
	<div class="container">
		
	</div>
	<form action="{{url('/update/mapel/'.$edit->id)}}" method="post">
		<div class="card-body">
			@csrf
			<div class="mb-3 row">
				<label class="col-sm-2 col-form-label">Kode Mapel</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kode_mapel" value="{{$edit->kode_mapel}}" readonly>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Nama Guru</label>
				<div class="col-sm-10">
					<select class="form-control" name="user_id" id="guru">
						<option value="" selected>--pilih--</option>
						@foreach($datas as $x)
						<option value="{{$x->id}}" @if($x->id) selected @endif>{{$x->guru->nama_guru}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Nama Mapel</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_mapel" value="{{$edit->nama_mapel}}">
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
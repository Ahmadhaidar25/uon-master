@extends('layout.main')
@section('content')
<div class="card-body">
	<div class="table-responsive">
		<form action="{{url('/post/pilih/mapel')}}" method="post">
			@csrf
			<table id="mapel" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Mapel</th>
						<th>Nama Mapel</th>
						<th>Pilih</th>

					</tr>
				</thead>

				<tbody>

					@foreach($data as $x)
					<tr>
						<td>{{$x->mapel->kode_mapel}}</td>
						<td>{{$x->mapel->nama_mapel}}</td>
						<td>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$x->id}}" name="listmapel_id[]">
								
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tr>
					<td colspan="3"><button type="submit" style="float: right;" class="btn btn-success">Submit</button></td>
				</tr>

			</table>
		</form>
	</div>
</div>
@endsection
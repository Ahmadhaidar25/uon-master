@extends('layout.main')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Small boxes (Stat box) -->
@if(Auth::user()->levels=='admin')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$pengguna_guru}}</h3>

        <p>Pengguna Guru</p>
      </div>
      <div class="icon">
         <i class="ion ion-person"></i>
      </div>
    
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$pengguna_siswa}}</h3>

        <p>Pengguna Siswa</p>
      </div>
      <div class="icon">
          <i class="ion ion-person"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3 class="text-white">{{$mapel}}</h3>

        <p class="text-white">Mata Pelajaran</p>
      </div>
      <div class="icon">
        <i class="ion ion-databasee"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>Unique Visitors</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
@endif



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@if(auth()->user()->levels=='siswa')
<div class="row">
  <div class="col-md-6">
    <figure class="highcharts-figure">
      <div id="container"></div>
      <button class="btn btn-primary" id="plain"><i class="bi bi-bar-chart-fill"></i>&nbsp;Plain</button>
      <button class="btn btn-warning text-white" id="inverted"><i class="bi bi-text-left"></i>&nbsp;Inverted</button>
      <button class="btn btn-success" id="polar"><i class="bi bi-pie-chart-fill"></i>&nbsp;Polar</button>
    </figure>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <i class="bi bi-megaphone-fill"></i>&nbsp;Informasi
      </div>
      <div class="card-body">
        
      </div>
    </div>
  </div>


</div>


<script type="text/javascript">
  const chart = Highcharts.chart('container', {
    title: {
      text: '{{Auth::user()->nama}}',
      align: 'center'
    },
    subtitle: {

    },
    xAxis: {
      categories: [
       @foreach($nilai as $x)
       @if($x->tugas->user->id == Auth::user()->id)
       '{{$x->tugas->plmapel->listmapel->nama_ujian}}',
       @endif
       @endforeach
       ]
    },
    series: [{
      type: 'column',
      name: 'Nilai',
      colorByPoint: true,
      data: [
       @foreach($nilai as $x)
       @if($x->tugas->user->id == Auth::user()->id)
       [{{$x->nilai}}],
       @endif
       @endforeach
       ],
      showInLegend: false
    }]
  });

  document.getElementById('plain').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: false,
        polar: false
      },
      subtitle: {

      }
    });
  });

  document.getElementById('inverted').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: true,
        polar: false
      },
      subtitle: {

      }
    });
  });

  document.getElementById('polar').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: false,
        polar: true
      },
      subtitle: {

      }
    });
  });
</script>

@endif

@endsection
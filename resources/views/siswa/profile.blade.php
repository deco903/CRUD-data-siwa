@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				@if(session('succes'))
					<div class="alert alert-success" role="alert">
					{{session('succes')}}
					</div>
				@endif
				@if(session('error'))
					<div class="alert alert-danger" role="alert">
					{{session('error')}}
					</div>
				@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" style="width:98px;height:98px;" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mata pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data diri</h4>
										<ul class="list-unstyled list-justify">
											<li>jenis kelamin<span>{{$siswa->jenis_kelamin}}</span></li>
											<li>agama<span>{{$siswa->agama}}</span></li>
											<li>Alamat<span>{{$siswa->alamat}}</span></li>
										</ul>
									</div>
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Tambah Nilai
								</button>

								<!--modal-->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										  <form action="/siswa/{{$siswa->id}}/addnilai" method="post" enctype="multipart/form-data">
										  @csrf
										  <div class="form-group">
											<label for="exampleFormControlSelect1">Mata Pelajaran</label>
											<select class="form-control" id="mapel" name="mapel">
											@foreach($mata_pelajaran as $mp)
												<option value="{{$mp->id}}">{{$mp->nama}}</option>
											@endforeach
											</select>
										</div>
                                            <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
                                                <label for="exampleFormControlInput1">nilai</label>
                                                <input type="text" name="nilai" class="form-control" id="exampleFormControlInput1" 
                                                placeholder="masukan nilai" value="{{old('nilai')}}">
                                                @if($errors->has('nilai'))
                                                    <span class="help-block">{{$errors->first('nilai')}}</span>
                                                @endif
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
										</div>
										</div>
									</div>
								</div>
						<!--end modal-->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KOde</th>
												<th>Nama mapel</th>
												<th>Smester</th>
												<th>Nilai</th>
											</tr>
										</thead>
										<tbody>
											@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->smester}}</td>
												<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" 
												data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="masukan nilai">{{$mapel->pivot->nilai}}</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- chart-->
								<div class="panel">
									<div id="chartNilai"></div>
								</div>
								<!--end of chart-->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		
@endsection

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'laporan nilai siswa'
    },
    xAxis: {
        categories: [
            'matematika',
			'bahasa indonesia',
			'agama'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'nilai',
        data: {!!json_encode($data)!!}

    }]
});

$(document).ready(function() {
    $('.nilai').editable();
});
</script>
@endsection
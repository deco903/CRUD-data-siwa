@extends('layouts.master')
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Update</h3>
								</div>
								<div class="panel-body">
                <form method="POST" action="/siswa/{{$siswa->id}}/update" enctype="multipart/form-data">
                   @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Depan</label>
                          <input name="nama_depan" type="text" value="{{$siswa->nama_depan}}" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Belakang</label>
                          <input name="nama_belakang" type="text" value="{{$siswa->nama_belakang}}" class="form-control" id="exampleInputEmail1" 
                            aria-describedby="emailHelp" placeholder="masukan nama belakang">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Agama</label>
                          <input name="agama" type="text" value="{{$siswa->agama}}" class="form-control" id="exampleInputEmail1" 
                            aria-describedby="emailHelp" placeholder="masukan agama">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Alamat</label>
                          <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" 
                            rows="6" placeholder="masukan alamat">{{$siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Avatar</label>
                          <input name="avatar" type="file" value="{{$siswa->agama}}" class="form-control" id="exampleInputEmail1" 
                            aria-describedby="emailHelp" placeholder="masukan agama">
                        </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

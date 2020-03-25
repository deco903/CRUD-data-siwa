@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">Data siswa</h3>
                                    <div class="right">
                                       
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-cross-circle"></i></button>
                                    </div>

                                    <!--modal-->
                                    <!-- popup -->
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
                                                <!--form-->
                                                <form action="/siswa/create" method="post" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
                                                        <label for="exampleFormControlInput1">nama depan</label>
                                                        <input type="text" name="nama_depan" class="form-control" id="exampleFormControlInput1" 
                                                        placeholder="masukan nama depan" value="{{old('nama_depan')}}">
                                                        @if($errors->has('nama_depan'))
                                                            <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="exampleFormControlInput1">nama belakang</label>
                                                        <input type="text" name="nama_belakang" class="form-control" id="exampleFormControlInput1" 
                                                        placeholder="masukan nama belakang" value="{{old('nama_belakang')}}">
                                                    </div>
                                                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                                        <label for="exampleFormControlInput1">Email</label>
                                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" 
                                                        placeholder="masukan email" value="{{old('email')}}">
                                                        @if($errors->has('email'))
                                                            <span class="help-block">{{$errors->first('email')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                                        <label for="exampleFormControlSelect1">Pilih jenis kelamin</label>
                                                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                                        <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
                                                        <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                                                        </select>
                                                        @if($errors->has('jenis_kelamin'))
                                                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                                                        <label for="exampleFormControlInput1">agama</label>
                                                        <input type="text" name="agama" class="form-control" id="exampleFormControlInput1" 
                                                        placeholder="masukan agama" value="{{old('agama')}}">
                                                        @if($errors->has('agama'))
                                                            <span class="help-block">{{$errors->first('agama')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                                                    </div>
                                                    <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
                                                         <label for="exampleFormControlTextarea1">Avatar</label>
                                                         <input name="avatar" type="file"  class="form-control" id="exampleInputEmail1" 
                                                         aria-describedby="emailHelp" placeholder="masukan agama" value="{{old('avatar')}}">
                                                         @if($errors->has('avatar'))
                                                            <span class="help-block">{{$errors->first('avatar')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                       <button type="submit" style="width:80px;height:50px;border-radius:5px;background-color:aqua;color:white;">Submit</button>
                                                    </form>
                                                    </div>
                                                
                                                <!--end form-->
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <!--end modal-->
								</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>no</th>
                                                <th>Nama Depan</th>
                                                <th>Nama Belakang</th>
                                                <th>Jens Kelamin</th>
												<th>Agama</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($data_siswa as $siswa)
                                            <tr>
                                             <td>{{$loop->iteration}}</td>
                                             <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                                             <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                                             <td>{{$siswa->jenis_kelamin}}</td>
                                             <td>{{$siswa->agama}}</td>
                                             <td>{{$siswa->alamat}}</td>
                                             <td>
                                                <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm" >Edit</a>
                                                <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('yakin akan menhapus ?')">Delete</a>
                                              </th>
                                              </td>
                                            </tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

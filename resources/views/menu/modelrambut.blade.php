@extends('index')
@section('modelrambut')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Model Rambut</h1>
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Model Rambut</h3>
                        <div align="right">
                            <button class="btn btn-md btn-success" data-toggle="modal" data-target="#modalTambah"
                                style="">Tambah Data</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Model Rambut</th>
                                    <th>Foto Tampak Depan</th>
                                    <th>Foto Tampak Samping</th>
                                    <th>Foto Tampak Belakang</th>
                                    <th>Kategori Model Rambut</th>
                                    <th>Jenis Model Rambut</th>
                                    <th>Detail Model Rambut</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                ?>
                                @foreach($data_model as $model)
                                <tr>
                                    <td><?=$no?></td>
                                    <td>{{$model->nama_model}}</td>
                                    <td>
                                        <center><img width="150" src="{{ url('/images/'.$model->photo1) }}"></center>
                                    </td>
                                    <td>
                                        <center><img width="150" src="{{ url('/images/'.$model->photo2) }}"></center>
                                    </td>
                                    <td>
                                        <center><img width="150" src="{{ url('/images/'.$model->photo3) }}"></center>
                                    </td>
                                    <td>{{$model->kategori}}</td>
                                    <td>{{$model->jenis_model}}</td>
                                    <td>{{$model->detail}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalEdit{{$model->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <div id="modalEdit{{$model->id}}" class="modal fade" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Model Rambut</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="model/{{$model->id}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Nama Model Rambut</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="nama_model"
                                                                    value="{{$model->nama_model}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kategori Model
                                                                    Rambut</label>
                                                                <select name="kategori" type="text" class="form-control"
                                                                    id="" placeholder="Masukkan Jenis Kelamin" required>
                                                                    <option value="{{$model->kategori}}">
                                                                        {{$model->kategori}}</option>
                                                                    <option value="Dewasa">Dewasa</option>
                                                                    <option value="Remaja">Remaja</option>
                                                                    <option value="Anak">Anak</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Model Rambut</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="jenis_model"
                                                                    value="{{$model->jenis_model}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Detail Model Rambut</label>
                                                                <textarea class="form-control" name="detail"
                                                                    id="content" rows="8"
                                                                   >{{$model->detail}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Foto Tampak Depan</label>
                                                                <input type="file" name="photo1" multiple>
                                                                <p class="help-block">Upload Foto Model Rambut Tampak
                                                                    Depan</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Foto Tampk Samping</label>
                                                                <input type="file" name="photo2" multiple>
                                                                <p class="help-block">Upload Foto Model Rambut Tampak
                                                                    Samping</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Foto Tampak Belakang</label>
                                                                <input type="file" name="photo3" multiple>
                                                                <p class="help-block">Upload Foto Model Rambut Tampak
                                                                    Belakang</p>
                                                            </div>

                                                        </div>
                                                        <!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <input type="submit" class="btn btn-success" name="simpan"
                                                                value="Simpan">
                                                            <button type="button" class="btn btn-secondary btn-md"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php
                                $no++
                                ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div id="modalTambah" class="modal fade" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Promo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createmodel')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama Model Rambut</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="nama_model">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Model Rambut</label>
                                    <select name="kategori" type="text" class="form-control" id="jenkel"
                                        placeholder="Masukkan Jenis Kelamin" required>
                                        <option value="">OPTION</option>
                                        <option value="Dewasa">Dewasa</option>
                                        <option value="Remaja">Remaja</option>
                                        <option value="Anak">Anak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Model Rambut</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="jenis_model">
                                </div>
                                <div class="form-group">
                                    <label>Detail Model Rambut</label>
                                    <textarea class="form-control" name="detail" id="content" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto Tampak Depan</label>
                                    <input type="file" name="photo1" multiple>
                                    <p class="help-block">Upload Foto Model Rambut Tampak Depan</p>
                                </div>
                                <div class="form-group">
                                    <label>Foto Tampk Samping</label>
                                    <input type="file" name="photo2" multiple>
                                    <p class="help-block">Upload Foto Model Rambut Tampak Samping</p>
                                </div>
                                <div class="form-group">
                                    <label>Foto Tampak Belakang</label>
                                    <input type="file" name="photo3" multiple>
                                    <p class="help-block">Upload Foto Model Rambut Tampak Belakang</p>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                                <button type="button" class="btn btn-secondary btn-md"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
@endsection

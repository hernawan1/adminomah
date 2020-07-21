@extends('index')
@section('tukangcukur')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Tukang Cukur</h1>
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Tukang Cukur</h3>
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
                                    <th>Nama Tukang Cukur</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Nomer Telfon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no=1;
                            ?>
                                @foreach($data_tukang as $tukang)
                                <tr>
                                    <td><?=$no?></td>
                                    <td>{{$tukang->name}}</td>
                                    <td>{{$tukang->addres}}</td>
                                    <td>{{$tukang->email}}</td>
                                    <td>{{$tukang->number}}</td>
                                </tr>
                                @endforeach
                                <?$no++?>
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
                        <h4 class="modal-title">Tambah Tukang Cukur</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createtukangcukur')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama Tukang Cukur</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="addres">
                                </div>
                                <div class="form-group">
                                    <label>Nomer Telfon</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="number">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
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

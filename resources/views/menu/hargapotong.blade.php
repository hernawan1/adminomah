@extends('index')
@section('hargapotong')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Harga Potong Rambut</h1>
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
                        <h3 class="card-title">Tabel Harga Potong Rambut</h3>
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
                                    <th>Jarak</th>
                                    <th>Harga Potong Rambut</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $no = 1;
                            ?>
                                @foreach($data_harga as $harga)
                                <tr>
                                    <td><?=$no?></td>
                                    <td>{{$harga->jarak}} KM</td>
                                    <td>Rp. {{ number_format($harga->harga, 2) }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalEdit{{$harga->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <div id="modalEdit{{$harga->id}}" class="modal fade" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Harga Potong Rambut</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="harga/{{$harga->id}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Jarak</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="jarak"
                                                                    value="{{$harga->jarak}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Harga Potongan Bedasarkan Jarak</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="harga"
                                                                    value="{{$harga->harga}}">
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
                        <h4 class="modal-title">Tambah Harga Promo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createharga')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Jarak</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="jarak">
                                </div>
                                <div class="form-group">
                                    <label>Harga Potongan Bedasarkan Jarak</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="harga">
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

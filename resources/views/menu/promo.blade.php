@extends('index')
@section('promo')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Promo</h1>
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
                        <h3 class="card-title">Tabel Promo</h3>
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
                                    <th>Judul Promo</th>
                                    <th>Banner Promo</th>
                                    <th>Detail</th>
                                    <th>Potongan Harga</th>
                                    <th>Tanggal Awal Promo</th>
                                    <th>Tanggal Selesai Promo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $no=1;
                                ?>
                                @foreach($data_promo as $promo)
                                <tr>
                                    <td><?=$no?></td>
                                    <td>{{$promo->nama}}</td>
                                    <td>
                                        <center><img width="150" src="{{ url('/images/'.$promo->photo) }}"></center>
                                    </td>
                                    <td>{{$promo->detail}}</td>
                                    <td>Rp. {{ number_format($promo->potongan, 2) }}</td>
                                    <td>{{$promo->tglawal}}</td>
                                    <td>{{$promo->tglakhir}}</td>
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal{{$promo->id}}">
                                            Hapus
                                        </button>
                                    </td>
                                    <div id="exampleModal{{$promo->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <a align="center" style="margin:0; font-size:20px;">Anda Yakin Ingin
                                                        Menghapus Data Ini?</a>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="promo/{{$promo->id}}"><button type="button"
                                                            name="id"
                                                            class="btn btn-success btn-md">Hapus</button></a>
                                                    <button type="button" class="btn btn-secondary btn-md"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                                <?php $no++?>
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
                        <form action="{{route('createpromo')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Judul Promo</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Harga Potongan</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="potongan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Aktif Promo</label>
                                    <input type="date" class="form-control" name="tglawal" placeholder="Tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Selesai Promo</label>
                                    <input type="date" class="form-control" name="tglakhir" placeholder="Tanggal">
                                </div>
                                <div class="form-group">
                                    <label>Detail Promo</label>
                                    <textarea class="form-control" name="detail" id="content" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Banner Promo</label>
                                    <input type="file" name="photo" multiple>
                                    <p class="help-block">Upload Banner Promo Dari Komputer Anda</p>
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

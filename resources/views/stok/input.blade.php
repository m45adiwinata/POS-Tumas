@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            
        </div>
        <div class="col-md text-right">
            <a href="#">Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="form">
                @csrf
                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="barcode" id="barcode" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode" id="kode">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategori" id="kategori">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="suplier" class="col-sm-2 col-form-label">Suplier Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="suplier" id="suplier">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="h_pokok" class="col-sm-2 col-form-label">Harga Pokok</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="h_pokok" id="h_pokok">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="h_grosir" class="col-sm-2 col-form-label">Harga Jual Grosir</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="h_grosir" id="h_grosir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="h_ecer" class="col-sm-2 col-form-label">Harga Jual Eceran</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="h_ecer" id="h_ecer">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_beli" class="col-sm-2 col-form-label">Tanggal Beli</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_beli" id="tgl_beli">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" id="submit">Submit</button>
            </div>
        </div>
        <div class="col-md">
            
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#barcode').keypress(function (e) {
            if (e.keyCode == 13) {
                $.get('/stok/get-data/' + $(this).val(), function(data) {
                    console.log(data);
                    $('#nama_barang').val(data.nama_barang);
                    $('#kode').val(data.kode);
                    $('#kategori').val(data.kategori);
                    $('#kode').val(data.kode);
                    $('#suplier').val(data.suplier);
                    $('#h_pokok').val(data.h_pokok);
                    $('#h_grosir').val(data.h_grosir);
                    $('#h_ecer').val(data.h_ecer);
                    $('#tgl_beli').val(data.tgl_beli);
                    $('#h_pokok').focus();
                });
                return false;
            }
        });
        $('#submit').click(function() {
            let barcode = $('#barcode').val();
            let kode = $('#kode').val();
            let nama_barang = $('#nama_barang').val();
            let kategori = $('#kategori').val();
            let suplier = $('#suplier').val();
            let tgl_beli = $('#tgl_beli').val();
            $.get('/stok/masuk/'+data, function(x) {
                console.log(x);
            });
        });
    });
</script>
@endsection
@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            
        </div>
        <div class="col-md text-right">
            <a href="/stok">Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="form-inline">
                <div class="form-group mx-sm-4 mb-2">
                    <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="barcode..." autofocus>
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="nama barang...">
                </div>
                <div class="form-group mb-2 mx-sm-4">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah...">
                </div>
                <button type="submit" class="btn btn-success mb-2">Submit</button>
            </div>
            <br>
            
        </div>
        <div class="col-md">
            <div style="height:100px;overflow:auto;">
                <table id="pembelian" >
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>H. Satuan</th>
                        <th>Total</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#barcode').keypress(function (e) {
            if (e.keyCode == 13) {
                $('#jumlah').focus();
            }
            else {
                e.target.value += e.key;
            }
            e.preventDefault();
            return false;
        });
        $('#jumlah').keypress(function (e) {
            if (e.keyCode == 13) {
                $.get('/stok/get-data/' + $('#barcode').val(), function(data) {
                    $('#pembelian').append(
                        '<tr>'+
                        '<td>'+1+'</td>'+
                        '<td>'+data.nama_barang+'</td>'+
                        '<td>'+$('#jumlah').val()+'</td>'+
                        '<td>'+data.h_ecer+'</td>'+
                        '<td>'+($('#jumlah').val() * data.h_ecer)+'</td>'+
                        '</tr>'
                    );
                });
            }
            else {
                e.target.value += e.key;
            }
            e.preventDefault();
            return false;
        });
    });
</script>
@endsection
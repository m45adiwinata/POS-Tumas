@extends('layout')
@section('content')
<div class="container">
    @include('header')
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
                <button type="submit" class="btn btn-success mb-2">BAYAR</button>
            </div>
            <br>
            
        </div>
        <div class="col-md">
            <div style="height:70vh;overflow:auto;">
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
            Total Belanja <span class="float-right mx-1-right" id="totalbelanja"></span>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var totalbelanja = 0;
        $('#barcode').keypress(function (e) {
            if (e.keyCode == 13) {
                $.get('/stok/get-data/' + $('#barcode').val(), function(data) {
                    if(data == "tidak ada") {
                        alert("DATA BARANG TIDAK DITEMUKAN.");
                    }
                    else {
                        $('#jumlah').focus();
                    }
                });
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
                    if(data == "tidak ada") {
                        alert("DATA BARANG TIDAK DITEMUKAN.");
                    }
                    else {
                        $('#pembelian').append(
                            '<tr>'+
                            '<td>'+1+'</td>'+
                            '<td>'+data.nama_barang+'</td>'+
                            '<td>'+$('#jumlah').val()+'</td>'+
                            '<td>'+data.h_ecer+'</td>'+
                            '<td>'+($('#jumlah').val() * data.h_ecer)+'</td>'+
                            '</tr>'
                        );
                        totalbelanja += $('#jumlah').val() * data.h_ecer;
                        $('#totalbelanja').html(formatRupiah(totalbelanja.toString(), 'Rp. '));
                    }
                });
            }
            else {
                e.target.value += e.key;
            }
            e.preventDefault();
            return false;
        });
    });

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection
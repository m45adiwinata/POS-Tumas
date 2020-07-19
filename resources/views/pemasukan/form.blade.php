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
            <form class="form-inline">
                <div class="form-group mx-sm-4 mb-2">
                    <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="barcode...">
                </div>
                <div class="form-group mb-2">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah...">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="number" class="form-control" readonly name="harga-satuan" id="harga-satuan" placeholder="harga satuan...">
                </div>
                <div class="form-group mb-2">
                    <input type="number" class="form-control" readonly name="total" id="total" placeholder="total...">
                </div>
                <button type="submit" class="btn btn-success mx-sm-3 mb-2">Submit</button>
            </form>
            <br>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row" class="text-right" style="width:150px;">Nama Barang: </th>
                        <td id="nama-barang" style="width:300px;" class="text-left"></td>
                        <td style="width:40px;"></td>
                        <th scope="row" style="width:150px;" class="text-right">Kode: </th>
                        <td id="kode-barang" style="width:300px;" class="text-left"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Kategori: </th>
                        <td id="kategori-barang" class="text-left"></td>
                        <td></td>
                        <th scope="row" class="text-right">Isi: </th>
                        <td id="isi-barang" class="text-left"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-right">Satuan: </th>
                        <td id="kategori-barang" class="text-left"></td>
                        <td></td>
                        <th scope="row" class="text-right">Berat: </th>
                        <td id="berat-barang" class="text-left"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md">
            
        </div>
    </div>
</div>
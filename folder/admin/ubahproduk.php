<h2>Ubah Produk</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

/*echo "<pre>";
echo print_r($pecah);
echo "</pre>";*/

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Produk</label>
        <input type="text" name="nama" class="form-control"
        <?php echo $pecah['nama_produk'];?>>
    </div>
    <div class="form-group">
        <label for="">Harga Produk</label>
        <input type="number" name="harga" class="form-control"
        <?php echo $pecah['harga_produk'];?>>
    </div>
    <div class="form-group">
        <label for="">Berat Produk</label>
        <input type="number" name="berat" class="form-control"
        <?php echo $pecah['berat_produk']?>>
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="200">
    </div>
    <div class="form-group">
        <label for=""> Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10">
            <?php echo $pecah['deskripsi_produk'];?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset ($_POST['ubah'])) {
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_files['foto']['tmp_name'];
    //bila foto diubah
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

        $koneksi->query("UPDATE produk SET nama_produk ='$_POST[nama]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
        foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE produk SET nama_produk ='$_POST[nama]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
        deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]'");
    }
    
    echo "<script> alert ('Data telah berubah');</script>";
    echo "<script>location='index.php?halaman=produk'</script>";
}

?>
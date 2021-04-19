 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM db_buku WHERE id_buku='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buku</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        font-size: 30px;
        text-transform: uppercase;
        color: #2a7806;
      }
    button {
          background-color: #2a7806;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #2a7806;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>

  </head>
  <body>
      <br><center>
        <h1>Edit Buku</h1>

        <nav class="navbar">
        <div class="container">
                <img src="assets/LOGOO.PNG" alt="logo" width="100" height="100">
        </nav>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id_buku']; ?>"  hidden />
        <div>
          <label>Judul</label>
          <input type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required=""value="<?php echo $data['penerbit']; ?>" />
        </div>
        <div>
          <label>Persediaan</label>
         <input type="text" name="persediaan" required="" value="<?php echo $data['persediaan']; ?>"/>
        </div>
        <div>
          <label>Gambar</label>
          <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar" />
          <i style="float: left;font-size: 11px;color: #2a7806">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button style="float: left;font-size: 11px;type="submit">Simpan Perubahan</button>
        </div>
        <div>
         <button type="cancel">Batal</button>
        </div>
        </section>
      </form>
  </body>
</html>
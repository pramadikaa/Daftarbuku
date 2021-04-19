<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
    a:link, a:visited {
          background-color: #2a7806;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    </style>
  </head>
  <body>
      <center>
      <br>  <h1>Tambah Buku</h1>

      <nav class="navbar">
        <div class="container">
                <img src="assets/LOGOO.PNG" alt="logo" width="100" height="100">
       </nav>

      <br><center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" />
        </div>
        <div>
          <label>Persediaan</label>
         <input type="text" name="persediaan" required="" />
        </div>
        <div>
          <label>Gambar</label>
         <input type="file" name="gambar" required="" />
        </div>
        <div>
         <button type="submit">Simpan Produk</button>
         <a href="index.php">Batal</a>
        </div>
        </section>
      </form>
  </body>
  <br>
</html>
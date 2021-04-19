<?php
  error_reporting(0);
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
       <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="bs5/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/body.css">

    <title>CRUD Buku</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h2 {
        font-size: 30px;
        text-transform: uppercase;
        color: #2a7806;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: #2a7806;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 15px;
    }
    form{
      border: solid 1px #fff;
      border-collapse: collapse;
      border-spacing: 100%;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    
  </style>
  </head>
  <body>
  <nav class="navbar">
       <div class="container">
            <center><img src="assets/LOGOO.PNG" alt="logo" width="100" height="100"></center>
            <a href="index.html">Home</a>
        </div>   
  </nav>

  <nav class="navbar">
    <div class="container" >
      <h2>Daftar Buku</h2>
    </div>   
  </nav>

  <nav class="navbar">
       <form action="" method="POST">
			<input type="text" name="query" placeholder="Cari Data" />
			<input type="submit" name="cari" value="Search"> 
      <a href="tambah_buku.php">Tambah Buku</a> 
  </nav>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Persediaan</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <body>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      // $query = "SELECT * FROM db_buku ORDER BY id_buku ASC";
      // $result = mysqli_query($koneksi, $query);
      // //mengecek apakah ada error ketika menjalankan query
      // if(!$result){
      //   die ("Query Error: ".mysqli_errno($koneksi).
      //      " - ".mysqli_error($koneksi));
      // }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while

      $query = $_POST['query'];
      if ($query != ''){
        $result = mysqli_query($koneksi, 'SELECT * FROM db_buku WHERE judul LIKE "%'.$query.'%"');
      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM db_buku");
      }

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo $row['pengarang'];?></td>
          <td><?php echo $row['penerbit'];?></td>
          <td><?php echo $row['persediaan']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_buku.php?id=<?php echo $row['id_buku']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
  <br>
</html>
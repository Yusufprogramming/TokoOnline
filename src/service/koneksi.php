<?php
// koneksi Database
$conn = mysqli_connect("localhost","root","","Toko");

// query database
function query($databarang) {
    global $conn;
    $hasil = mysqli_query($conn, $databarang);
    $penampungan = [];
    while ($data = mysqli_fetch_assoc($hasil)) {
        $penampungan[] = $data;
    }
    return $penampungan;
}

function tambah($data) {
    global $conn;
  
    $id = htmlspecialchars($data["id"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $merk = htmlspecialchars($data["Merk"]);

    $Gambar = upload();
    if (!$Gambar) {
       return false;
    }


  $tambah ="INSERT INTO barang (id, Gambar ,nama_barang, harga, jumlah, Merk)
  VALUES ('$id','$Gambar','$nama_barang','$harga','$jumlah','$merk')";
  mysqli_query($conn, $tambah);

 return mysqli_affected_rows($conn);

}

function upload() {
  $namaFile = $_FILES['Gambar']['name'];
  $ukuranfile = $_FILES['Gambar']['size'];
  $error = $_FILES['Gambar']['error'];
  $tmpName = $_FILES['Gambar']['tmp_name'];


// Cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
     echo " <script>
          alert('Pilih gambar terlebih dahulu!');
       </script>
     ";
     return false;
  }
 
  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.',$namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo " <script>
          alert('Yang anda upload bukan gambar!');
         </script>
     ";
     return false;
  }

// Cek jika ukurannya terlalu besar
if ($ukuranfile > 100000000) {
  echo " <script>
          alert('Ukuran gambar terlalu besar!');
        </script>
      ";
  return false;
}

// Generate name gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


// Lolos pengecekan, gambar siap di upload
  move_uploaded_file($tmpName, '../img/'.$namaFileBaru);
  return $namaFileBaru;
}
  
// fungsi hapus
function hapus($hapus) {
    global $conn;
    $hapus = ("DELETE FROM barang WHERE id = '$hapus'");
    mysqli_query($conn, $hapus);
    
    return mysqli_affected_rows($conn);
}

function hapuspetugas($hapuspetugas) {
  global $conn;
  $hapus = ("DELETE FROM penggunaa WHERE id = '$hapuspetugas'");
  mysqli_query($conn, $hapus);
  
  return mysqli_affected_rows($conn);
}

// fungsi Edit
function edit($data) {
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $merk = htmlspecialchars($data["Merk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

   // cek apakah user pilih gambar baru atau tidak
   if ($_FILES['Gambar']['error'] === 4 ) {
      $Gambar = $gambarLama;
   } else {
    $Gambar = upload();
   }
    
  $edit ="UPDATE barang SET 
             id = '$id',
             Gambar = '$Gambar',
             Nama_Barang = '$nama_barang',
             Harga = '$harga',
             Jumlah  = '$jumlah',
             Merk = '$merk'
           WHERE id = $id
          ";
  mysqli_query($conn,$edit);
 return mysqli_affected_rows($conn);
}

// fungsi cari
function caripetugas($keyword){
   $read = "SELECT * FROM `penggunaa`
     WHERE 
    id LIKE '%$keyword%' OR
    nama_pengguna LIKE '%$keyword%' OR
    kata_sandi LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jabatan LIKE '%$keyword%'
   ";
   return query($read);
}

// fungsi cari
function cari($keyword){
  $read = "SELECT * FROM `barang`
    WHERE 
   id LIKE '%$keyword%' OR
   nama_barang LIKE '%$keyword%' OR
   harga LIKE '%$keyword%' OR
   jumlah LIKE '%$keyword%' OR
   merk LIKE '%$keyword%'
  ";
  return query($read);
}

// fungsi daftar
function daftar($data) {
  global $conn;

  $namaPengguna = strtolower(stripslashes($data["pengguna"]));
  $kataSandi = mysqli_real_escape_string($conn, $data["katasandi"]);
  $kataSandi2 = mysqli_real_escape_string($conn, $data["katasandi2"]);
  $email = mysqli_real_escape_string($conn, $data["email"]);
  $jabatan = mysqli_real_escape_string($conn, $data["jabatan"]);
  
// Cek Nama pengguna sudah ada apa belum
$hasil = mysqli_query($conn, "SELECT nama_pengguna FROM penggunaa WHERE nama_pengguna = '$namaPengguna'");
if (mysqli_fetch_assoc($hasil)) {
  echo "<script>
  alert('Nama Pengguna Sudah Terdaftar!');
  </script>";
  return false;
}

 // Cek konfirmasi kata sandi
 if ($kataSandi !== $kataSandi2) {
  echo "<script>
  alert('Konfirmasi Kata Sandi Tidak Sesuai!');
  </script>";
  return false;
}

 // Enkripsi Kata sandi
 $kataSandi = password_hash($kataSandi, PASSWORD_DEFAULT);

 // Tambahkan Pengguna Baru ke Database
 mysqli_query($conn, "INSERT INTO penggunaa VALUES('', '$namaPengguna','$kataSandi','$email','$jabatan')");

 return mysqli_affected_rows($conn);
}

// fungsi tambah petugas
function tambahpetugas($data) {
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $nama_pengguna = htmlspecialchars($data["pengguna"]);
  $email = htmlspecialchars($data["email"]);
  $kata_sandi = htmlspecialchars($data["kata_sandi"]);
  $jabatan = htmlspecialchars($data["jabatan"]);

$tambahpetugas ="INSERT INTO penggunaa (id,nama_pengguna, kata_sandi, email, jabatan)
VALUES ('$id','$nama_pengguna','$kata_sandi','$email','$jabatan')";
mysqli_query($conn, $tambahpetugas);

return mysqli_affected_rows($conn);

}

// fungsi Edit
function editpgs($data) {
  global $conn;

  $id = htmlspecialchars($data["id"]);
  $nama_pengguna = htmlspecialchars($data["nama_pengguna"]) ?? '';
  $kata_sandi = htmlspecialchars($data["kata_sandi"]) ?? '';
  $email = htmlspecialchars($data["email"]) ?? '';
  $jabatan = htmlspecialchars($data["jabatan"]) ?? '';
  
$edit ="UPDATE petugas SET 
           id = '$id',
           Nama_pengguna = '$nama_pengguna',
           kata_sandi= '$kata_sandi',
           email  = '$email',
           jabatan = '$jabatan'
         WHERE id = $id
        ";
mysqli_query($conn,$edit);
return mysqli_affected_rows($conn);
}
?>
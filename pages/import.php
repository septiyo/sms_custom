<?php
include "../koneksi.php";
include "excel_reader.php";



$chek = $_FILES['IMPORT']['tmp_name'];

if($chek == ""){

  echo "<script>
           alert('Harus Diisi File dengan Format Excel..!');
           window.location='index.php?IDNE=single'; 
        </script>";

}

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['IMPORT']['tmp_name']);

//echo $data;


// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=1; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-1)
  $destination = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $text = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  //$alamat = $data->val($i, 3);

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  //$query = "INSERT INTO outbox VALUES ('$destination', '$text', 'Gammu');";

   $query = "INSERT INTO outbox 
             SET DestinationNumber = '$destination',
                              Text = '$text',
                         CreatorID = 'Gammu';";


  // echo $query;
  // exit;
  $hasil = mysqli_query($mysqli, $query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal



echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";









?>
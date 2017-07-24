<?php
include ".../koneksi.php";


  
      // $nama = mysqli_real_escape_string($mysqli, $_POST['USER']);
      // $pass = mysqli_real_escape_string($mysqli, $_POST['PASS']);

$destination = mysqli_real_escape_string($mysqli, $_POST['HP']);
$text        = mysqli_real_escape_string($mysqli, $_POST['PESAN']);

   $query = "INSERT INTO outbox 
             SET DestinationNumber = '$destination',
                              Text = '$text',
                         CreatorID = 'Gammu';";


  // echo $query;
  // exit;
  $hasil = mysqli_query($mysqli, $query);


  if($hasil){

    echo "<script>
              alert('Send SMS berhasil..!');
              window.location='index.php?IDNE=single'; 
          </script>";


  }
  else{


    echo "<script>
              alert('Send SMS Gagal, Mohon Periksa lagi..');
              window.location='index.php?IDNE=single';
          </script>";

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="member" placeholder="Nama Pelanggan">
    <input type="number" name="waktuRental" placeholder="Waktu Rental">
    <select name="jenisMotor" id="jenisMotor">
      <option value="honda">Honda</option>
      <option value="yamaha">Yamaha</option>
      <option value="scooter">Scooter</option>
      <option value="sport">Sport</option>
    </select>
    <button type="submit" name="submit">Kirim</button>
  </form>

  <?php
  include "logic.php";
  $rental = new Rental();
  $rental->setHarga(70000, 80000, 90000, 100000);
  $rental->getHarga();

  if(isset($_POST['submit'])) {
    $rental->member = $_POST['member'];
    $rental->waktu = $_POST['waktuRental'];
    $rental->jenis = $_POST['jenisMotor'];
    $rental->hargaRental();
    $rental->pembayaran();
  } 
  ?>
</body>
</html>
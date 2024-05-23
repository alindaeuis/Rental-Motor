<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Motor</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Freeman&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="rental-motor">
    <div class="container">
      <div class="header-form">
        <h1>Rental Motor</h1>
      </div>
      <div class="form-field">
        <form id="rentalMotor" action="" method="post">
          <input name="namaPelanggan" type="namaPelanggan" id="namaPelanggan" class="form-control mb-2"
            aria-describedby="namaPelanggan" placeholder="name.." required>
          <input type="number" name="waktuRental" id="waktuRental" class="form-control mb-2"
            aria-describedby="waktuRental" placeholder="waktu rental (per-hari)" required>
          <select class="form-select mb-2" aria-label="Default select example" name="jenisMotor" id="jenisMotor" required>
            <option value="">Open this select menu</option>
            <option value="Honda">Honda</option>
            <option value="Yamaha">Yamaha</option>
            <option value="Scooter">Scooter</option>
            <option value="Vespa">Vespa</option>
          </select>
          <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
        </form>
      </div>
      <hr>
      <div class="php-section">
        <?php
        class RentalMotor
        {
          public $namaPelanggan,
          $waktuRental,
          $jenisMotor;
          private $member = [],
                  $hargaMotor = [];
                  // $diskon;

          public function __construct($nama, $waktuRental, $jenisMotor)
          {
            $this->namaPelanggan = $nama;
            $this->waktuRental = $waktuRental;
            $this->jenisMotor = $jenisMotor;
            $this->member = ["ana", "violine", "alinda", "elsa"];
            $this->hargaMotor = [
              "Honda" => 70000,
              "Yamaha" => 85000,
              "Scooter" => 150000,
              "Vespa" => 250000
            ];
            // $this->diskon = 5%;
          }

          public function hitungHargaRental()
          {
            // $jenisMotor = $this->jenisMotor;
            $hargaPerhari = $this->hargaMotor[$this->jenisMotor];
            $totalHarga = $hargaPerhari * $this->waktuRental + 10000;

            if (in_array($this->namaPelanggan, $this->member)) {
              $diskon = $totalHarga * 5/100;
              $totalHarga -= $diskon;
              $statusPelanggan = "<b>".$this->namaPelanggan . "</b>". " berstatus sebagai Member mendapatkan diskon sebesar" . "<b>". " 5%". "</b>";
            } else {
              $statusPelanggan = "<b>". $this->namaPelanggan. "</b>" . " tidak berstatus sebagai Member ";
            }
            return $statusPelanggan . "<br>" . " Jenis motor yang dirental adalah " . "<b>". $this->jenisMotor. "</b>" . " selama " . "<b>". $this->waktuRental . "</b>". " hari " . "<br>" . " Harga rental per-harinya: " . "<b>". $hargaPerhari . "</b>". "<br><br>" . "Besar yang harus dibayarkan adalah " . "<b>". " Rp " . number_format($totalHarga, 2, ",", "."). "</b>";


          }
        }

        if (isset($_POST['submit'])) {
          $namaPelanggan = $_POST['namaPelanggan'];
          $waktuRental = $_POST['waktuRental'];
          $jenisMotor = $_POST['jenisMotor'];

          $rentalMotor = new RentalMotor($namaPelanggan, $waktuRental, $jenisMotor);
          echo $rentalMotorBaru = $rentalMotor->hitungHargaRental();
        }
        ?>
      </div>
    </div>
  </div>
  <p class="copywrite" style="text-align: center;
  color: rgba(255, 255, 255, 0.1); text-shadow: -0 -0 8px solid #fff;"><a href="https://www.instagram.com/alindaacy_/?hl=id" style="text-decoration:none;color:rgba(255, 255, 255, 0.1); cursor:pointer;">&copy;alindaeuissoleha</a></p>
</body>

</html>
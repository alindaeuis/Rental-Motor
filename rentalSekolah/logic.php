<?php 
class Data {
  public $member,
         $jenis,
         $waktu,
         $diskon;
  protected $pajak;
  private $honda, $yamaha, $scooter, $sport;
  private $listMember = ['ana', 'sam', 'alex', 'ara'];

  public function __construct() {
    $this->pajak = 10000;
  }

  public function getMember() {
    if(in_array($this->member, $this->listMember)) {
      return "Member";
    }else {
      return "Non Member";
    }
  }

  public function setHarga($jenis1, $jenis2, $jenis3, $jenis4) {
    $this->honda = $jenis1;
    $this->yamaha = $jenis2;
    $this->scooter = $jenis3;
    $this->sport = $jenis4;
  }

  public function getHarga() {
    $dataMotor['honda'] = $this->honda;
    $dataMotor["yamaha"] = $this->yamaha;
    $dataMotor["scooter"] = $this->scooter;
    $dataMotor["sport"] = $this->sport;
    return $dataMotor;
  }
}

class Rental extends Data {
  public function hargaRental() {
    $dataHarga = $this->getHarga()[$this->jenis];
    $diskon = $this->getMember() == "Member" ? 5:0;

    if($this->waktu === 1) {
      $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
    }else {
      $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon /100)) + $this->pajak;
    }

    return[$bayar, $diskon];
  }

  public function pembayaran() {
    echo "<center>";
    echo $this->member. " berstatus sebagai ". $this->getMember() . " mendapat diskon sebesar ". $this->hargaRental()[1] . " % " . "<br>"; 
    echo " jenis motor yang dirental adalah " . $this->jenis. " selama ". $this->waktu . " hari". "<br>"; 
    echo " Harga rental per-harinya: ". " Rp ". $this->getHarga()[$this->jenis] . "<br>";
    echo " besar yang harus dibayarkan adalah ". "Rp ". number_format($this->hargaRental()[0], 0 , ",", ".");
    echo "</center>";
  }
}
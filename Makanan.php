<?php

class Makanan extends Menu {
    private $jenis;

    public function __construct($nama, $harga, $jenis) {
        parent::__construct($nama, $harga);
        $this->jenis = $jenis;
    }

    public function getJenisMakanan () {
        return $this->jenis;
    }
    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Jenis: {$this->jenis} \n";
    }
}

?>

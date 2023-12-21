<?php

class Minuman extends Menu {
    private $ukuran;

    public function __construct($nama, $harga, $ukuran) {
        parent::__construct($nama, $harga);
        $this->ukuran = $ukuran;
    }

    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Ukuran: {$this->ukuran} ml \n";
    }
}

?>

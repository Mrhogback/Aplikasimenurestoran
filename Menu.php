<?php

class Menu {
    protected $nama;
    protected $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

    public function tampilkanInfo() {
        echo "Nama: {$this->nama}, Harga: {$this->harga} \n";
    }
}

?>

<?php

class Restoran {
    private $daftarMenu = [];

    public function tambahMenu(Menu $menu) {
        $this->daftarMenu[] = $menu;
    }

    public function getDaftarMenu() {
        return $this->daftarMenu;
    }

    public function editHargaMenu($nama, $hargaBaru) {
        foreach ($this->daftarMenu as $menu) {
            if ($menu->getNama() == $nama) {
                $menu->setHarga($hargaBaru);
                echo "Harga menu {$nama} berhasil diubah menjadi {$hargaBaru} \n";
                return;
            }
        }

        echo "Menu {$nama} tidak ditemukan \n";
    }
}

?>

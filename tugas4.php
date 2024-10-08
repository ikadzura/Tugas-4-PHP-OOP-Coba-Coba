<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP - Pakaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .output {
            font-family: monospace;
            background-color: #f8f8f8;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <h2>PHP OOP - Konsep Pakaian</h2>

    <table>
        <thead>
            <tr>
                <th>Konsep</th>
                <th>Hasil Output</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kelas dan Objek</td>
                <td class="output">
                    <?php
                    class Pakaian
                    {
                        public $nama;
                        public $jenis;

                        public function __construct($nama, $jenis)
                        {
                            $this->nama = $nama;
                            $this->jenis = $jenis;
                        }

                        public function tampilkanInfo()
                        {
                            return "Nama: $this->nama, Jenis: $this->jenis";
                        }
                    }

                    $jaket = new Pakaian("Jaket Kulit", "Atasan");
                    echo $jaket->tampilkanInfo();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Encapsulation</td>
                <td class="output">
                    <?php
                    class PakaianWithEncapsulation
                    {
                        private $harga;

                        public function __construct($harga)
                        {
                            $this->harga = $harga;
                        }

                        public function getHarga()
                        {
                            return $this->harga;
                        }

                        public function setHarga($hargaBaru)
                        {
                            $this->harga = $hargaBaru;
                        }
                    }

                    $jaket = new PakaianWithEncapsulation(250000);
                    echo "Harga Jaket: Rp " . $jaket->getHarga();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Pewarisan / Inheritance</td>
                <td class="output">
                    <?php
                    class Kaos extends Pakaian
                    {
                        public $ukuran;

                        public function __construct($nama, $jenis, $ukuran)
                        {
                            parent::__construct($nama, $jenis);
                            $this->ukuran = $ukuran;
                        }

                        public function tampilkanInfo()
                        {
                            return parent::tampilkanInfo() . ", Ukuran: $this->ukuran";
                        }
                    }

                    $kaos = new Kaos("Kaos Oblong", "Atasan", "L");
                    echo $kaos->tampilkanInfo();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Polimorfisme</td>
                <td class="output">
                    <?php
                    class Celana extends Pakaian
                    {
                        public $panjang;

                        public function __construct($nama, $jenis, $panjang)
                        {
                            parent::__construct($nama, $jenis);
                            $this->panjang = $panjang;
                        }

                        public function tampilkanInfo()
                        {
                            return parent::tampilkanInfo() . ", Panjang: $this->panjang cm";
                        }
                    }

                    $celana = new Celana("Celana Jeans", "Bawahan", 100);
                    echo $celana->tampilkanInfo();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Abstraction</td>
                <td class="output">
                    <?php
                    abstract class PakaianAbstract
                    {
                        abstract public function tampilkanInfo();
                    }

                    class Kemeja extends PakaianAbstract
                    {
                        private $nama;

                        public function __construct($nama)
                        {
                            $this->nama = $nama;
                        }

                        public function tampilkanInfo()
                        {
                            return "Pakaian: $this->nama";
                        }
                    }

                    $kemeja = new Kemeja("Kemeja Putih");
                    echo $kemeja->tampilkanInfo();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Penggunaan Access Modifier</td>
                <td class="output">
                    <?php
                    class PakaianLain
                    {
                        public $Jenis = "Nama: Dress Pesta, ";

                        public function harga()
                        {
                            return "Harga: Rp 350000";
                        }
                    }

                    $dress = new PakaianLain();
                    echo $dress->Jenis;
                    echo $dress->harga();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Menggunakan require/include</td>
                <td class="output">
                    <?php
                    require_once 'rok1.php';
                    require_once 'cawed1.php';

                    $kemeja = new rok1();
                    echo $kemeja->caraPakai();
                    $rok = new cawed1();
                    echo $rok->caraPakai();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Menggunakan spl_autoload_register</td>
                <td class="output">
                    <?php
                    spl_autoload_register(function ($class_name) {
                        include $class_name . '.php';
                    });

                    class Kemeja1
                    {
                        public function caraPakai()
                        {
                            return "Kemeja dipakai dengan cara dikenakan di tubuh.";
                        }
                    }

                    class Rok2
                    {
                        public function caraPakai()
                        {
                            return "Rok dipakai dengan cara dikenakan di bagian bawah.";
                        }
                    }

                    $kemeja = new Kemeja1();
                    echo $kemeja->caraPakai();
                    $rok = new Rok1();
                    echo $rok->caraPakai();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Menggunakan Composer Autoload</td>
                <td class="output">
                    <?php
                    // Menggunakan Composer Autoload
                    // Sertakan autoload Composer
                    require 'vendor/autoload.php';

                    use pakaian\Hoodie;
                    use pakaian\Jumper;

                    $hoodie = new Hoodie();
                    echo "Jenis Pakaian: " . $hoodie->getPakaianType() . "<br>"; // Output: Tommy Hilfiger
                    
                    $jumper = new Jumper();
                    echo "Jenis Pakaian: " . $jumper->getPakaianType(); // Output: Travis Scott
                    ?>
                </td>
            </tr>

        </tbody>
    </table>

</body>

</html>
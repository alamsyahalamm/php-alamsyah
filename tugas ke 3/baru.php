<?php
class Vehicle
{
    private $numberPolice;
    private $type;

    public function __construct($numberPolice, $type)
    {
        $this->numberPolice = $numberPolice;
        $this->type = $type;
    }

    public function getNumberPolice()
    {
        return $this->numberPolice;
    }

    public function getType()
    {
        return $this->type;
    }
}

class Parking
{
    private $maxParking;
    private $showVehicleParking;

    public function __construct($maxParking)
    {
        $this->maxParking = $maxParking;
        $this->showVehicleParking = array();
    }

    public function parkVehicle($vehicle)
    {
        if (count($this->showVehicleParking) >= $this->maxParking) {
            return "Maaf, area parkir penuh.";
        } else {
            array_push($this->showVehicleParking, $vehicle);
            return "Kendaraan dengan nomor polisi " . $vehicle->getNumberPolice() . " dan tipe " . $vehicle->getType() . " berhasil diparkir.";
        }
    }

    public function removeVehicle($numberPolice)
    {
        foreach ($this->showVehicleParking as $key => $vehicle) {
            if ($vehicle->getNumberPolice() == $numberPolice) {
                unset($this->showVehicleParking[$key]);
                return "Kendaraan dengan nomor polisi " . $vehicle->getNumberPolice() . " dan tipe " . $vehicle->getType() . " berhasil dikeluarkan.";
            }
        }
        return "Maaf, kendaraan dengan nomor polisi " . $numberPolice . " tidak ditemukan.";
    }

    public function getStatus()
    {
        $totalVehicle = count($this->showVehicleParking);
        if ($totalVehicle > 0) {
            $status = "Jumlah kendaraan yang diparkir: " . $totalVehicle . "<br>";
            foreach ($this->showVehicleParking as $vehicle) {
                $status .= "Nomor polisi: " . $vehicle->getNumberPolice() . " - Tipe: " . $vehicle->getType() . "<br>";
            }
        } else {
            $status = "Belum ada kendaraan yang diparkir.";
        }
        return $status;
    }
}

// Mengecek apakah ada data yang disubmit melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inisialisasi objek parkir dengan kapasitas maksimal 5 kendaraan
    $parking = new Parking(5);

    // Memeriksa tindakan apa yang diminta oleh pengguna
    if (isset($_POST['submit'])) {
        switch ($_POST['submit']) {
            case 'Parkir':
                // Memasukkan kendaraan ke dalam parkir
                $numberPolice = $_POST['numberPolice'];
                $type = $_POST['type'];
                $vehicle = new Vehicle($numberPolice, $type);
                $message = $parking->parkVehicle($vehicle);
                break;

            case 'Keluar':
                // Mengeluarkan kendaraan dari parkir
                $numberPolice = $_POST['numberPolice'];
                $message = $parking->removeVehicle($numberPolice);
                break;

            case 'Status':
                // Melihat status parkir
                $message = $parking->getStatus();
                break;

            default:
                $message = "Aksi tidak valid.";
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistem Parkir</title>
</head>

<body>
    <h1>Sistem Parkir</h1>

    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <h2>Parkir Kendaraan</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="numberPolice">Nomor Polisi:</label>
        <input type="text" name="numberPolice" id="numberPolice" required><br>

        <label for="type">Tipe Kendaraan:</label>
        <input type="text" name="type" id="type" required><br>

        <input type="submit" name="submit" value="Parkir">
    </form>

    <h2>Keluar Kendaraan</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="numberPoliceExit">Nomor Polisi:</label>
        <input type="text" name="numberPolice" id="numberPoliceExit" required><br>

        <input type="submit" name="submit" value="Keluar">
    </form>

    <h2>Status Parkir</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="submit" value="Status">
    </form>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title>Konverter Desimal ke Heksadesimal Manual</title>
</head>
<body>
    <h3>Konversi Desimal ke Heksadesimal (Logika Manual)</h3>
    <form method="post">
        Masukkan bilangan desimal: 
        <input type="number" name="desimal" min="0" required>
        <button type="submit">Konversi</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $desimal = $_POST["desimal"];
        $karakterHeks = "0123456789ABCDEF"; // Karakter dasar heksadesimal
        $heksadesimal = "";

        // Kasus khusus jika input adalah 0
        if ($desimal == 0) {
            $heksadesimal = "0";
        } else {
            // Proses pembagian berulang dengan 16
            while ($desimal > 0) {
                $sisa = $desimal % 16;
                $heksadesimal = $karakterHeks[$sisa] . $heksadesimal;
                $desimal = (int)($desimal / 16);
            }
        }

        echo "<p>Hasil konversi: <b>" . $heksadesimal . "</b></p>";
    }
    ?>
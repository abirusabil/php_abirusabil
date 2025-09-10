<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";

for ($a = $jml; $a > 0; $a--) {
    // Hitung total untuk baris ini
    $total = 0;
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }

    // Cetak baris total
    echo "<tr><td colspan='$jml'>TOTAL: $total</td></tr>\n";

    // Cetak baris angka
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}

echo "</table>";
?>

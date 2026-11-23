
<?php

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

echo "Diskon 10%: Rp " . hitungDiskon(200000);

echo "<br>";

echo "Diskon 15%: Rp " . hitungDiskon(200000, 15);

?>

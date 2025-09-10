<?php
session_start();

$step = isset($_POST['step']) ? $_POST['step'] : 1;

if ($step == 1) {
    if (isset($_POST['nama'])) {
        $_SESSION['nama'] = $_POST['nama'];
        $step = 2;
    }
} elseif ($step == 2) {
    if (isset($_POST['umur'])) {
        $_SESSION['umur'] = $_POST['umur'];
        $step = 3;
    }
} elseif ($step == 3) {
    if (isset($_POST['hobi'])) {
        $_SESSION['hobi'] = $_POST['hobi'];
        $step = 4;
    }
}

if ($step == 1) {
    ?>
    <form method="post">
        Nama Anda: <input type="text" name="nama" required><br><br>
        <input type="hidden" name="step" value="1">
        <input type="submit" value="SUBMIT">
    </form>
    <?php
} elseif ($step == 2) {
    ?>
    <form method="post">
        Umur Anda: <input type="number" name="umur" required><br><br>
        <input type="hidden" name="step" value="2">
        <input type="submit" value="SUBMIT">
    </form>
    <?php
} elseif ($step == 3) {
    ?>
    <form method="post">
        Hobi Anda: <input type="text" name="hobi" required><br><br>
        <input type="hidden" name="step" value="3">
        <input type="submit" value="SUBMIT">
    </form>
    <?php
} elseif ($step == 4) {
   
    echo "<b>Nama:</b> " . htmlspecialchars($_SESSION['nama']) . "<br>";
    echo "<b>Umur:</b> " . htmlspecialchars($_SESSION['umur']) . "<br>";
    echo "<b>Hobi:</b> " . htmlspecialchars($_SESSION['hobi']) . "<br>";
    session_destroy();
}
?>

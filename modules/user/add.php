<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once __DIR__ . '/../../config/database.php';

    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($nama == "" || $email == "") {
        $error = "Nama dan email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO users (nama, email) VALUES (?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ss", $nama, $email);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            header("Location: ../../index.php?page=user");
            exit;
        } else {
            $error = "Gagal menambahkan user.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}

?>

<h2>Tambah User</h2>

<div class="card">

    <?php if ($error != ""): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error); ?>
        </p>
    <?php endif; ?>

    <form action="modules/user/add.php" method="POST">

        <label>Nama User</label>
        <input
            type="text"
            name="nama"
            placeholder="Masukkan nama user"
            required
        >

        <br><br>

        <label>Email</label>
        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
            required
        >

        <br><br>

        <button type="submit">Simpan User</button>

    </form>

</div>
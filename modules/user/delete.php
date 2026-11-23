<?php

require_once __DIR__ . '/../../config/database.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: ../../index.php?page=user");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM users WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header("Location: ../../index.php?page=user");
        exit;
    } else {
        $error = "Gagal menghapus user.";
    }

    mysqli_stmt_close($stmt);
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM users WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>

<h2>Hapus User</h2>

<div class="card">

    <?php if (!$user): ?>

        <p>User tidak ditemukan.</p>

    <?php else: ?>

        <h3>Konfirmasi Hapus</h3>

        <p>Apakah kamu yakin ingin menghapus user ini?</p>

        <p>
            Nama: <?= htmlspecialchars($user['nama']); ?>
        </p>

        <p>
            Email: <?= htmlspecialchars($user['email']); ?>
        </p>

        <?php if ($error != ""): ?>
            <p style="color: red;">
                <?= htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form
            action="modules/user/delete.php?id=<?= $id; ?>"
            method="POST"
        >
            <button type="submit">Ya, Hapus</button>
            <a href="index.php?page=user">Batal</a>
        </form>

    <?php endif; ?>

</div>
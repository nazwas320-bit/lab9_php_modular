<?php

require_once __DIR__ . '/../../config/database.php';

$id = intval($_GET['id'] ?? 0);
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($nama == "" || $email == "") {
        $error = "Nama dan email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE users SET nama = ?, email = ? WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "ssi", $nama, $email, $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            header("Location: ../../index.php?page=user");
            exit;
        } else {
            $error = "Gagal mengubah data user.";
        }

        mysqli_stmt_close($stmt);
    }
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

<h2>Edit User</h2>

<div class="card">

    <?php if (!$user): ?>

        <p>User tidak ditemukan.</p>

    <?php else: ?>

        <?php if ($error != ""): ?>
            <p style="color: red;">
                <?= htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form
            action="modules/user/edit.php?id=<?= $id; ?>"
            method="POST"
        >

            <label>Nama User</label>
            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($user['nama']); ?>"
                required
            >

            <br><br>

            <label>Email</label>
            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($user['email']); ?>"
                required
            >

            <br><br>

            <button type="submit">Update User</button>

        </form>

    <?php endif; ?>

</div>
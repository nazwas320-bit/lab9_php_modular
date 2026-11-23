<?php

require_once __DIR__ . '/../../config/database.php';

$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC");

?>

<h2>Daftar User</h2>

<div class="card">
    <h3>Data User</h3>

    <p>
        <a href="index.php?page=user_add">
            <button type="button">+ Tambah User</button>
        </a>
    </p>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($user = mysqli_fetch_assoc($query)):
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($user['nama']); ?></td>
            <td><?= htmlspecialchars($user['email']); ?></td>
            <td>
                <a href="index.php?page=user_edit&id=<?= $user['id']; ?>">
                    Edit
                </a>
                |
                <a href="index.php?page=user_delete&id=<?= $user['id']; ?>">
                    Hapus
                </a>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>
</div>

<?php
mysqli_close($conn);
?>
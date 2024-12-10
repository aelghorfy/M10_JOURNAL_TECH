<?php
include 'connexion.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM journal WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header('Location: index.php');
    exit();
} else {
    echo "ID invalide.";
}
?>

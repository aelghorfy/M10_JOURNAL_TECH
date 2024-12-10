<?php
session_start();

$host = 'localhost';
$dbname = 'journal';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_SESSION['message_displayed'])) {
        echo "<div id='successMessage' class='alert alert-success'>Connecté à $dbname sur $host avec succès.</div>";
        $_SESSION['message_displayed'] = true;
    }
} catch (PDOException $e) {
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
}
?>

<script>
    setTimeout(function() {
        let successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000); 
</script>

<?php
include 'header.php';
include 'connexion.php';


$sql = "SELECT * FROM journal";
$stmt = $conn->prepare($sql);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Special News</h1>
    <?php if (count($articles) > 0): ?>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <h3><?php echo $article['titre']; ?></h3>
                    <p><?php echo $article['contenu']; ?></p>
                    <p><strong>Date:</strong> <?php echo $article['date']; ?></p>
                    <p><strong>Auteur:</strong> <?php echo $article['auteur']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>

<?php
include 'header.php';
include 'connexion.php';


$sql = "SELECT * FROM journal";
$stmt = $conn->prepare($sql);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];
    $auteur = $_POST['auteur'];

    $sql = "UPDATE journal SET titre = ?, contenu = ?, date = ?, auteur = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $contenu, $date, $auteur, $id]);

    header('Location: edit.php');
    exit();
} elseif ($id > 0) {
    $sql = "SELECT * FROM journal WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        echo "Article non trouvé.";
        exit();
    }
}
?>

<div class="container">
    <?php if ($id > 0 && isset($article)): ?>
        <h1>Modifier l'Article</h1>
        <form method="post">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?php echo htmlspecialchars($article['titre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu" required><?php echo htmlspecialchars($article['contenu'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($article['date'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="<?php echo htmlspecialchars($article['auteur'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    <?php else: ?>
        <h1>Modifier un Article</h1>
        <p>Sélectionnez un article à modifier dans la liste ci-dessous.</p>
        <?php if (count($articles) > 0): ?>
            <ul>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
                        <p><?php echo htmlspecialchars($article['contenu']); ?></p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($article['date']); ?></p>
                        <p><strong>Auteur:</strong> <?php echo htmlspecialchars($article['auteur']); ?></p>
                        <a href="edit.php?id=<?php echo $article['id']; ?>" class="btn btn-primary">Modifier</a>
                        <a href="delete.php?id=<?php echo $article['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>

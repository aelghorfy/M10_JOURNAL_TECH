<?php
include 'header.php';
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];
    $auteur = $_POST['auteur'];

    $sql = "INSERT INTO journal (titre, contenu, date, auteur) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $contenu, $date, $auteur]);

    header('Location: index.php');
    exit();
}
?>

<div class="container">
    <h1>Publier un Nouvel Article</h1>
    <form method="post">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <button type="submit" class="btn btn-success">Publier</button>
    </form>
</div>

<?php
include 'footer.php';
?>

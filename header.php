<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TechNewz</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px; 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#"></a>
            <img src="./logo ang.png" alt="Logo" style="height: 40px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'add.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="add.php">Publier</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'edit.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="edit.php">Modifier</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

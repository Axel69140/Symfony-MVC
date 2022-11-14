<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Mes pages</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/test">Test</a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Favoris</a>
                <div class="dropdown-menu">
                    <a href="/favorites/artists" class="dropdown-item nav-link">Artistes</a>
                    <a href="/favorites/tracks" class="dropdown-item nav-link">Musiques</a>
                </div>
            </li>
        </ul>
    </div>
    <div>
        <form class="p-2" method="post" enctype="multipart/form-data" action="/artist/search">
            <div class="input-group container">
                <label class="d-none" for="artist">Sujet :</label>
                <input name="artist" id="artist" type="text" class="form-control" placeholder="Artiste">
                <button type="submit" class="btn btn-secondary">Chercher</button>
            </div>
        </form>
    </div>
</nav>

<div class="container">
    <!--        --><?php //if(!empty($_SESSION['erreur'])): ?>
    <!--            <div class="alert alert-danger" role="alert">-->
    <!--                --><?php //echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
    <!--            </div>-->
    <!--        --><?php //endif; ?>
    <!--        --><?php //if(!empty($_SESSION['message'])): ?>
    <!--            <div class="alert alert-success" role="alert">-->
    <!--                --><?php //echo $_SESSION['message']; unset($_SESSION['message']); ?>
    <!--            </div>-->
    <!--        --><?php //endif; ?>
    <?= $contenu ?>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
        VETOMAX
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>AJOUTER UN EMPLOYER</h3>
                </div>
                <a href="/worker" class="btn btn-primary">RETOUR</a>
                <div class="card-content">
                    <form method="post" action="/worker/add">
                        <?php
                        if (isset($add_for)) {
                            ?>
                            <input type="hidden" name="user" value="<?=$add_for?>">
                            <input type="hidden" name="add_for" value="<?=$add_for?>">
                            <?php
                        }
                        ?>
                        </br>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nom">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Prénom">
                        </div>
                        <div class="mb-3">
                            <label for="sexe" class="form-label">Sexe</label>
                            <select class="custom-select" id="sexe" name="sexe">
                                <option value="man">Homme</option>
                                <option value="women">Femme</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">email</label>
                            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">photo</label>
                            <input type="file" class="form-control" name="libelle" id="libelle">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Spécialité</label>
                            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libellé de la todo liste.">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Nombre de soins max/jour</label>
                            <input type="number" class="form-control" name="libelle" id="libelle" placeholder="Libellé de la todo liste.">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">supérieur</label>
                            <select class="custom-select">
                                <option value="man">Aucun</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Date d'enteé</label>
                            <input type="date" class="form-control" name="libelle" id="libelle" placeholder="Libellé de la todo liste.">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Date de sortie</label>
                            <input type="date" class="form-control" name="libelle" id="libelle" placeholder="Libellé de la todo liste.">
                        </div>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Date de sortie</label>
                            <textarea name="other" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-dark">AJOUTER</button>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
</html>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Animal n°<?=$animal?$animal->getId():"invalide"?></h3>
                </div>
                <a href="/animal" class="btn btn-primary">RETOUR</a>
                <div>
                    <?php
                    if (!$animal) {
                        ?>
                        <p>ID de l'animal invalide</p>
                        <?php
                    } else {
                        ?>
                        <div>
                            <div class="image_info">
                                <img src="/public/assets/<?=$animal->picture?>" alt="profile de <?=$animal->name?>">
                            </div>
                            <div class="info_detail">
                                <h2><?=$animal->name?></h2>
                                <p class="bold">Information de l'animal:</p>
                                <ul>
                                    <li>Puce: <?=$animal->chip?></li>
                                    <li>Genre: <?=$animal->sexe?></li>
                                    <li>Espèce: <?=$animal->species?></li>
                                    <li>Poids: <?=$animal->weight?> Kg</li>
                                    <li>Soignant favoris: <?=$animal->favorite_worker_last_name?> <?=$animal->favorite_worker_first_name?> 
                                        <?= $animal->favorite_healer_id ? "<a href='/worker/information?id=$animal->favorite_healer_id'>Voir plus....</a>" :  "'aucun soignant favoris renseigné'" ?>
                                    </li>
                                    <li>Date de première visite: <?=$animal->date_visit?></li>
                                    <li>Date de naissance: <?=$animal->date_birth?></li>
                                    <li>Date de décès: <?=$animal->date_death?$animal->date_death:"'Aucune date de décès renseigné'"?></li>
                                </ul>
                                <p class="bold">Information du Propriétaire:</p>
                                <ul>
                                    <li>Nom: <?=$animal->owner_last_name?> <?=$animal->owner_first_name?></li>
                                    <li>email: <?=$animal->owner_mail?></li>
                                    <li>Télépone: <?=$animal->owner_phone?></li>
                                    <li><a href='/owner/information?id=<?=$animal->owner_id?>'>Voir plus....</a></li>
                                </ul>
        
                                <p><span class="bold">Autre information:</span> <?=$animal->other?"":"'Aucune autre information'"?></p>
                                <p>&nbsp&nbsp&nbsp&nbsp <?=$animal->other?></p>
                               
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
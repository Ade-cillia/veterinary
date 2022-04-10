<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Employer n°<?=$worker?$worker->getId():"invalide"?></h3>
                </div>
                <a href="/worker" class="btn btn-primary">RETOUR</a>
                <div>
                    <?php
                    if (!$worker) {
                        ?>
                        <p>ID de l'employer invalide</p>
                        <?php
                    } else {
                        ?>
                        <div>
                            <div class="image_info">
                                <img src="/public/assets/<?=$worker->picture?>" alt="profile de <?=$worker->getLastName()?> <?=$worker->getFirstName()?>">
                            </div>
                            <div class="info_detail">
                                <h2><?=$worker->getLastName()?> <?=$worker->getFirstName()?></h2>
                                <p class="bold">Information de l'employer:</p>
                                <ul>
                                    <li>Genre: <?=$worker->sexe?></li>
                                    <li>Téléphone: <?=$worker->phone?></li>
                                    <li>Email: <?=$worker->mail?></li>
                                    <li>spécialités: <?=$worker->specialties?></li>
                                    <li>Nombre de soin maximum par jour : <?=$worker->nb_heal_max?></li>
                                    <li>Date d'entrée: <?=$worker->date_in?></li>
                                    <li>Date de sortie: <?=$worker->date_out?$worker->date_out:"'Aucune date de prévue'"?></li>
                                </ul>
                                <p class="bold">Cabinet: </p>
                                <ul>
                                    <li>Nom du Cabinet: <?=$worker->cabinet_id?$worker->cabinet_name:"'aucun cabinet attribué'"?></li>
                                    <li>Téléphone du Cabinet: <?=$worker->cabinet_id?$worker->cabinet_phone:"'aucun cabinet attribué'"?></li>
                                    <li>Adresse du Cabinet: <?=$worker->cabinet_id?$worker->cabinet_adress:"'aucun cabinet attribué'"?></li>
                                </ul>
                                <p class="bold">Supérieur: </p>
                                <ul>
                                    <li>Nom du Supérieur: <?=$worker->upper_id?$worker->upper_last_name." ".$worker->upper_first_name:"'aucun Supérieur attribué'"?></li>
                                    <li>Information du supérieur: 
                                        <?= $worker->upper_id ? "<a href='/worker/information?id=$worker->upper_id'>Voir plus....</a>" :  "'aucun Supérieur attribué'" ?>
                                    </li>
                                </ul>
                                <p><span class="bold">Autre information:</span> <?=$worker->other?"":"'Aucune autre information'"?></p>
                                <p>&nbsp&nbsp&nbsp&nbsp <?=$worker->other?></p>
                               
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
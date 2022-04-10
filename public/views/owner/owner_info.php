<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Propriétaire n°<?=$owner?$owner->getId():"invalide"?></h3>
                </div>
                <a href="/owner" class="btn btn-primary">RETOUR</a>
                <div>
                    <?php
                    if (!$owner) {
                        ?>
                        <p>ID du propriétaire invalide</p>
                        <?php
                    } else {
                        ?>
                        <div>
                            <div class="info_detail">
                                <h2><?=$owner->getLastName()?> <?=$owner->getFirstName()?></h2>
                                <div>
                                    <p class="bold">Information du propriétaire:</p>
                                    <ul>
                                        <li>Téléphone: <?=$owner->phone?></li>
                                        <li>Email: <?=$owner->mail?></li>
                                        <li>Adresse: <?=$owner->adress?></li>
                                        <li>Date D'inscription: <?=$owner->date_inscription?></li>
                                    </ul>
                                    <p><span class="bold">Autre information:</span> <?=$owner->other?"":"'Aucune autre information'"?></p>
                                    <p>&nbsp&nbsp&nbsp&nbsp <?=$owner->other?></p>
                                </div>
                                <div>
                                    <p class="bold">Ses animaux:</p>
                                    <?php
                                        if (empty($allAnimalForOneOwner)) {
                                            ?>
                                            <p>Aucun animal enregistré</p>
                                            <?php
                                        } else {
                                            foreach ($allAnimalForOneOwner as $key => $value) {
                                                ?>
                                                <div class="flex">
                                                    <div class="litle_picture">
                                                        <img src="/public/assets/<?=$value->picture?>" alt="profile de <?=$value->name?>">
                                                    </div>
                                                    <ul>
                                                        <li>Nom: <?=$value->name?></li>
                                                        <li>Puce : <?=$value->chip?></li>
                                                        <li>Espèce : <?=$value->species?></li>
                                                        <li>Chiffre d'affaire : <?=$value->calculateTurnover()->getTurnover()?>€</li>
                                                        <li><a href="/animal/information?id=<?=$value->getId()?>">Plus de détails ...</a></li>
                                                    </ul>
                                                </div>
                                               
                                                <p>-------------------</p>
                                                <?php
                                            }
                                        }
                                       
                                    ?>
                                    <p class="bold">Chiffre d'affaire générer par ce propriétaire: <?= $owner->calculateTurnover($allAnimalForOneOwner)->getTurnover();?>€</p>
                                </div>
                                
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
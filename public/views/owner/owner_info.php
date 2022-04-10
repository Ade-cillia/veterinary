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
                                    var_dump($allAnimalForOneOwner);
                                        if (empty($allAnimalForOneOwner)) {
                                            ?>
                                            <p>Aucun animal enregistré</p>
                                            <?php
                                        } else {
                                            foreach ($allAnimalForOneOwner as $key => $value) {
                                                ?>
                                                <ul>
                                                    <li>Nom du soi</li>
    
                                                </ul>
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
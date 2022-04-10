<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Soins n°<?=$heal?$heal->getId():"invalide"?></h3>
                </div>
                <a href="/heal" class="btn btn-primary">RETOUR</a>
                <div>
                    <div>
                        <h3>Intitulé: <?=$heal->name?></h3>
                        <p>Début: <?=$heal->date_start?></p>
                        <p>Fin: <?=$heal->date_start?></p>
                        <p>Prix: <?=$heal->price?></p>
                        <p>Payer: <?php 
                        if ($heal->payd == 1) {
                            echo "<span class='green'>OUI</span>";
                        } else if($heal->payd == 0){
                            echo "<span class='red'>Non</span>";
                        }
                        ?></p>
                        <p>Fini: <?php 
                        if ($heal->finish == 1) {
                            echo "<span class='green'>OUI</span>";
                        } else if($heal->finish == 0){
                            echo "<span class='red'>Non</span>";
                        }
                        ?></p>
                    </div>
                    <div>
                        <h4 class='bold'>Soigneur affécté :</h4>
                        <ul>
                            <?php
                            
                            foreach ($worker as $key => $value) {
                                ?>
                                <li>Nom: <?=$value->getLastName()?> <?=$value->getFirstName()?></li>
                                <li>Téléphone : <?=$value->phone?></li>
                                <li>Spécialité : <?=$value->specialties?></li>
                                <li>Nombre de soins max/jour : <?=$value->nb_heal_max?></li>
                                <li><a href="/worker/information?id=<?=$value->getId()?>">Plus de détails ...</a></li>
                                <p>-------------------------------</p>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
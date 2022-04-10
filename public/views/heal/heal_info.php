<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Soins n°<?=$heal?$heal->getId():"invalide"?></h3>
                </div>
                <a href="/heal" class="btn btn-primary">RETOUR</a>
                <div>
                <h3><?=$heal->name?></h3>
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
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
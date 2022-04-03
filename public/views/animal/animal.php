<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>Tous les animaux</h3>
                </div>
                <a href="/" class="btn btn-primary">RETOUR</a>
                <div class="my-2">
                    <a href="/animal/add" class="float-end btn btn-success">AJOUTER</a>
                </div>
                <div class="card_container">
                    <?
                        foreach ($allAnimals as $key => $value) {
                            include "./public/components/animal_card.php";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
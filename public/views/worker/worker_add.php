<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>AJOUTER UN EMPLOYER</h3>
                </div>
                <a href="/worker" class="btn btn-primary">RETOUR</a>
                <div class="">
                    <form method="post" action="/worker/add">
                        </br>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nom<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Prénom<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Prénom" required>
                        </div>
                        <div class="mb-3">
                            <label for="sexe" class="form-label">Sexe<span class="required_input">*</span></label>
                            <select class="custom-select" id="sexe" name="sexe" required>
                                <option value="man">Homme</option>
                                <option value="women">Femme</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">email<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="mail" id="mail" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone<span class="required_input">*</span></label>
                            <input type="tel" id="phone" name="phone" pattern="^[0-9]{10}$" required>

                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">photo</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/png, image/jpeg">
                        </div>
                        <div class="mb-3">
                            <label for="specialties" class="form-label">Spécialité<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="specialties" id="specialties" placeholder="Spécialité" required>
                        </div>
                        <div class="mb-3">
                            <label for="nb_heal_max" class="form-label">Nombre de soins max/jour<span class="required_input">*</span></label>
                            <input type="number" class="form-control" name="nb_heal_max" id="nbHeal" placeholder="Nombre de soins maximum éffectués par jour" required>
                        </div>
                        <div class="mb-3">
                            <label for="upper_id" class="form-label">supérieur<span class="required_input">*</span></label>
                            <select class="custom-select" id="upper_id" name="upper_id" required>
                                <option value="null">Aucun</option>
                                <?php
                                foreach ($allWorker as $key => $workerUpper) {
                                    ?>
                                    <option value="<?=$workerUpper->id?>"><?=$workerUpper->last_name?> <?=$workerUpper->first_name?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cabinet_id" class="form-label">Cabinet<span class="required_input">*</span></label>
                            <select class="custom-select" id="cabinet_id" name="cabinet_id" required>
                                <option value="null">Aucun</option>
                                <?php
                                foreach ($allCabinet as $key => $cabinet) {
                                    ?>
                                    <option value="<?=$cabinet->id?>"><?=$cabinet->name?></option>
                                    <?php
                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_in" class="form-label">Date d'enteé<span class="required_input">*</span></label>
                            <input type="date" class="form-control" name="date_in" id="date_in" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_out" class="form-label">Date de sortie</label>
                            <input type="date" class="form-control" name="date_out" id="date_out">
                        </div>
                        <div class="mb-3">
                            <label for="other" class="form-label">Autre informations</label></br>
                            <textarea name="other" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <p><span class="required_input">*</span> = champ obligatoire</p>
                        </div>
                        </br>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-dark">AJOUTER</button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>

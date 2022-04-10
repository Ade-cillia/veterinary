<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>AJOUTER UN ANIMAL</h3>
                </div>
                <a href="/animal" class="btn btn-primary">RETOUR</a>
                <div class="">
                    <form method="post" action="/animal/add">
                        </br>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="<?=isset($_POST['name'])?$_POST['name']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="chip" class="form-label">Numéro de puce<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="chip" id="chip" placeholder="Numéro de puce" value="<?=isset($_POST['chip'])?$_POST['chip']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="species" class="form-label">Espèce<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="species" id="species" placeholder="Espèce" value="<?=isset($_POST['species'])?$_POST['species']:''?>" required>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="picture" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/png, image/jpeg">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Poids<span class="required_input">*</span></label>
                            <input type="number" step="any" class="form-control" name="weight" id="weight" placeholder="Poids" value="<?=isset($_POST['weight'])?$_POST['weight']:''?>"  required>
                        </div>
                        <div class="mb-3">
                            <label for="sexe" class="form-label">Sexe<span class="required_input">*</span></label>
                            <select class="custom-select" id="sexe" name="sexe" value="<?=isset($_POST['sexe'])?$_POST['sexe']:''?>"  required>
                                <option value="man" <?= isset($_POST['sexe'])?($_POST['sexe']==="man"?"selected":""):""?>>Male</option>
                                <option value="women" <?= isset($_POST['sexe'])?($_POST['sexe']==="women"?"selected":""):""?>>Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="favorite_healer_id" class="form-label">Soigneur Favoris<span class="required_input">*</span></label>
                            <select class="custom-select" id="favorite_healer_id" name="favorite_healer_id"   required>
                                <option value="null">Aucun</option>
                                <?php
                                foreach ($allWorker as $key => $loveWorker) {
                                    ?>
                                    <option value="<?=$loveWorker->getId()?>" <?= isset($_POST['favorite_healer_id'])?($_POST['favorite_healer_id']==$loveWorker->getId()?"selected":""):""?>><?=$loveWorker->getLastName()?> <?=$loveWorker->getFirstName()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="owner_id" class="form-label">Propriétaire<span class="required_input">*</span></label>
                            <?php
                            if (!empty($allOwner)){
                                ?>
                                <select class="custom-select" id="owner_id" name="owner_id" required>
                                    <?php
                                    foreach ($allOwner as $key => $owner) {
                                        ?>
                                        <option value="<?=$owner->getId()?>"  <?= isset($_POST['owner_id'])?($_POST['owner_id']==$owner->getId()?"owner_id":""):""?>><?=$owner->getLastName()?> <?=$owner->getFirstName()?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p>(Rajouter un propriétaire ici :</span> <a href="/owner/add">Ajouter un propriétaire...</a>)</p>
                                <?php
                            } else {
                            ?>
                                <p><span class="required_input">Auncun Propriétaire existant,Merci de rajouter un propriétaire ici :</span> <a href="/owner/add">Ajouter un propriétaire...</a></p>
                            <?php
                            }
                            ?>
                                
                            
                        </div>
                        <div class="mb-3">
                            <label for="date_visit" class="form-label">Date de Première visite</label>
                            <input type="date" class="form-control" name="date_visit" id="date_visit" placeholder="Date de Première visite" value="<?=isset($_POST['date_visit'])?$_POST['date_visit']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_birth" class="form-label">Date de naissance<span class="required_input">*</span></label>
                            <input type="date" class="form-control" name="date_birth" id="date_birth" placeholder="Date de naissance" value="<?=isset($_POST['date_birth'])?$_POST['date_birth']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_death" class="form-label">Date de décès</label>
                            <input type="date" class="form-control" name="date_death" id="date_death" value="<?=isset($_POST['date_death'])?$_POST['date_death']:''?>">
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

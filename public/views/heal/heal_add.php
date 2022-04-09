<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>AJOUTER UN SOINS</h3>
                </div>
                <a href="/heal" class="btn btn-primary">RETOUR</a>
                <div class="">
                    <form method="post" action="/heal/add">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du soin<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nom du soin" value="<?=isset($_POST['name'])?$_POST['name']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_start" class="form-label">Date-heure de début<span class="required_input">*</span></label>
                            <input type="datetime-local" class="form-control" name="date_start" id="date_start" placeholder="Date de début du soin" value="<?=isset($_POST['date_start'])?$_POST['date_start']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_end" class="form-label">Date-heure de Fin<span class="required_input">*</span></label>
                            <input type="datetime-local" class="form-control" name="date_end" id="date_end" placeholder="Date de fin du soin" value="<?=isset($_POST['date_start'])?$_POST['date_start']:''?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix<span class="required_input">*</span></label>
                            <input type="number" step="any" class="form-control" name="price" id="price" placeholder="Prix" value="<?=isset($_POST['price'])?$_POST['price']:''?>" min=0 required>
                        </div>
                        <div class="mb-3">
                            <label for="animal_id" class="form-label">Animal<span class="required_input">*</span></label>
                            <?php
                            if (!empty($allAnimal)){
                                ?>
                                <select class="custom-select" id="animal_id" name="animal_id" required>
                                    <option value="null" disabled selected>----SELECTIONNER UN ANIMAL-----</option>
                                    <?php
                                    foreach ($allAnimal as $key => $animal) {
                                        ?>
                                        <option value="<?=$animal->id?>"  <?= isset($_POST['animal_id'])?($_POST['animal_id']==$animal->id?"selected":""):""?>><?=$animal->name?> de <?=$animal->owner_last_name?> <?=$animal->owner_first_name?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p>(Rajouter un Animal ici :</span> <a href="/animal/add">Ajouter un animal...</a>)</p>
                                <?php
                            } else {
                            ?>
                                <p><span class="required_input">Auncun Animal existant,Merci de rajouter un animal ici :</span> <a href="/animal/add">Ajouter un animal...</a></p>
                            <?php
                            }
                            ?>  
                            
                        </div>
                        <div class="mb-3">
                            <label for="healer" class="form-label">Soigneur:<span class="required_input">*(min 1)</span></label>
                            <div id="allSelectedHealer"></div>
                            <?php
                            if (!empty($allWorker)){
                            ?>
                                <select id="healer">
                                    <option value="null" disabled selected>----SELECTIONNER UN SOIGNEUR-----</option>
                                    <?php

                                    foreach ($allWorker as $key => $worker) {
                                        ?>
                                        <option value="<?=$worker->id?>"><?=$worker->last_name?> <?=$worker->first_name?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                                <p>(Rajouter un Soigneur ici :</span> <a href="/worker/add">Ajouter un Soigneur...</a>)</p>
                            <?php
                            } else {
                                ?>
                                <p><span class="required_input">Auncun Soigneur existant,Merci de rajouter un soigneur ici :</span> <a href="/worker/add">Ajouter un employer...</a></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="room_id" class="form-label">Salle utilisé:<span class="required_input">*</span></label>
                            <?php
                            if (!empty($allRoom)){
                            ?>
                                <select name="room_id" id="room_id">
                                <?php
                                foreach ($allRoom as $key => $room) {
                                    ?>
                                    <option value="<?=$room->id?>"><?=$room->name?>-<?=$room->type?>-<?=$room->cabinet_name?></option>
                                    <?php
                                }
                                ?>
                                </select>
                            <?php
                            } else {
                                ?>
                                <p><span class="required_input">Erreur, Merci de rajouter une salle (directement en db héhé car po le temps de faire les add de cabinet ^^):</span></p>
                                <?php
                            }
                            ?>
                            
                            
                        </div>
                        <div class="mb-3">
                            <label for="payd" class="form-label">Payé<span class="required_input">*</span></label>
                            <label>
                                <input type="radio" name="payd" value="true" required>
                                Oui
                            </label>
                            <label>
                                <input type="radio" name="payd" value="false" checked required>
                                Non
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="finish" class="form-label">Soin fini<span class="required_input">*</span></label>
                            <label>
                                <input type="radio" name="finish" value="true" required>
                                Oui
                            </label>
                            <label>
                                <input type="radio" name="finish" value="false" checked required>
                                Non
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="other" class="form-label">Autre informations</label></br>
                            <textarea name="other" id="" cols="30" rows="10"></textarea>
                        </div>
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

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 card shadow mx-auto mt-3">
                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>AJOUTER UN PROPRIETAIRE</h3>
                </div>
                <a href="/owner" class="btn btn-primary">RETOUR</a>
                <div class="">
                    <form method="post" action="/owner/add">
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
                            <label for="mail" class="form-label">email<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="mail" id="mail" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone<span class="required_input">*</span></label>
                            <input type="tel" id="phone" name="phone" pattern="^[0-9]{10}$" required>

                        </div>
                        <div class="mb-3">
                            <label for="adress" class="form-label">Adresse<span class="required_input">*</span></label>
                            <input type="text" class="form-control" name="adress" id="adress" placeholder="Adresse" required>
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

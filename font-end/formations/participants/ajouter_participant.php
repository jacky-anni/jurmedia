<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content c-square">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myLargeModalLabel"><b>Ajouter un autre participant</b></h4>
            </div>
            <div class="modal-body">
            <form action="" method="post" role="form" data-parsley-validate action="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                                if (isset($_POST['valider'])) {
                                    extract($_POST);
                                    $participant = Participant::ajouer_participant($nom, $sexe,$email, $commune, $departement, $telephone, $telephone2, $profession, $fonction);
                                }
                            ?>
                            <!-- <h4 class="text-primary"><b><?= $user->nom_organisation ?></b></h4>
                            <small><b><?= $user->sigle ?></b></small> -->
                            <div class="form-group col-md-12">
                                <label class="">Nom complet</label>
                                <input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" class="form-control" placeholder="Jacky Anizaire" required="">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Sexe </label>
                                <select name="sexe" class="form-control"  required="">
                                        <option value="">Choisir votre sexe</option>
                                    <option value="Homme" <?php if (isset($_POST['sexe']) == 'Homme') {
                                        echo "selected";
                                    } ?> >Homme</option>
                                    <option value="Femme" <?php if (isset($_POST['sexe'])== 'Femme') {
                                        echo "selected";
                                    } ?>>Femme</option>
                                </select>
                            </div>

                             <div class="form-group col-md-6">
                                <label class="">Email</label>
                                <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" class="form-control" placeholder="jurimediahaiti@gmail.com" required="">
                            </div>

                                <div class="form-group col-md-6">
                                    <label class="">Commune de residence</label>
                                    <input type="text" name="commune" value="" class="form-control" placeholder="Port-Margot" required="">
                                </div>
                            <div class="col-md-6">
                                <label class="">Département</label>
                                <select name="departement" class="form-control"  required="">
                                        <option value="">Choisir un département</option>
                                    <option value="Nord" <?php if (isset($_POST['departement']) == 'Nord') {
                                        echo "selected";
                                    } ?> >Nord</option>

                                    <option value="Nord-Est" <?php if (isset($_POST['departement']) == 'Nord-Est') {
                                        echo "selected";
                                    } ?>>Nord-Est</option>

                                    <option value="Nord-Ouest" <?php if (isset($_POST['departement']) == 'Nord-Ouest') {
                                        echo "selected";
                                    } ?>>Nord-Ouest</option>

                                    <option value="Sud" <?php if (isset($_POST['departement']) == 'Sud') {
                                        echo "selected";
                                    } ?>>Sud</option>

                                    <option value="Sud-Est" <?php if (isset($_POST['sexe']) == 'Sud-Est') {
                                        echo "selected";
                                    } ?>>Sud-Est</option>

                                    <option value="Ouest" <?php if (isset($_POST['sexe']) == 'Ouest') {
                                        echo "selected";
                                    } ?>>Ouest</option>

                                    <option value="Centre" <?php if (isset($_POST['sexe']) == 'Centre') {
                                        echo "selected";
                                    } ?>>Centre</option>

                                    <option value="Artibonite" <?php if (isset($_POST['sexe']) == 'Artibonite') {
                                        echo "selected";
                                    } ?>>Artibonite</option>

                                    <option value="Nippes" <?php if (isset($_POST['sexe']) == 'Nippes') {
                                        echo "selected";
                                    } ?>>Nippes</option>
                                    <option value="Grand-Anse" <?php if (isset($_POST['sexe']) == 'Grand-Anse') {
                                        echo "selected";
                                    } ?>>Grand-Anse</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="">Téléphone</label>
                                    <input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])){echo $_POST['telephone'];} ?>" class="form-control" placeholder="+5094872 0022" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">Téléphone Whatsapp</label>
                                    <input type="text" name="telephone2" value="<?php if(isset($_POST['telephone2'])){echo $_POST['telephone2'];} ?>" class="form-control" placeholder="+5093349-90" required="">
                                </div>
                            </div>
                        </div>

                            <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="">Profession</label>
                                    <input type="text" name="profession" value="<?php if(isset($_POST['profession'])){echo $_POST['profession'];} ?>" class="form-control" placeholder="Avocat" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">Fonction dans l'lorganisation</label>
                                    <input type="text" name="fonction" value="<?php if(isset($_POST['fonction'])){echo $_POST['fonction'];} ?>" class="form-control" placeholder="Secretaire" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                    </div>
            
            </div>
            <div class="modal-footer">								
                <button type="submit" name="valider" class="btn c-btn-dark c-btn-square c-btn-bold c-btn-uppercase">Ajouter</button>
                <button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
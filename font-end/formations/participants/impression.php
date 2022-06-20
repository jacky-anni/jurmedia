<?php
	 require  'font-end/assets/vendor/autoload.php';
	 require  'admin/class/bdd/bdd.php';
	 require  'admin/class/Query.php';
	use Dompdf\Dompdf;
	// instantiate and use the dompdf class
		$user = Query::affiche('participant',$_GET['user'],'id');
		// $etudiant = Manager::affiche('infopersonnelles',$_GET['etudiant'],'idplus');
		ob_start();

	if($user){
?>


<div>
	<center><img src="admin/dist/img/logo/logo.jpg"  style="width: 15%; position: relative;left: -60px;"></center>
	<h3><center>PROGRAMME DE FORMATION EN SUIVI ET ÉVALUATION DES POLITIQUES PUBLIQUES</center></h3>
	<h4><center>Formulaire d’inscription des participant-e-s</center></h4>
</div><hr>

<div>
	<h4>A-	RENSEIGNEMENTS PERSONNELS </h4>
</div>

<table class="table table-striped">
  <tbody>
    <tr>
      <th>Nom :  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->nom ?></td>
    </tr>

	<tr>
      <th>Prenom :  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->prenom ?></td>
    </tr>

	<tr>
      <th>Sexe : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->sexe ?></td>
    </tr>

	<tr>
      <th>Dépaertement : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->departement ?></td>
    </tr>


	<tr>
      <th>Commune :  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->commune ?></td>
    </tr>

	<tr>
      <th>Email :  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->email ?></td>
    </tr>

	<tr>
      <th>Téléphone : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->telephone ?></td>
    </tr>
  </tbody>
</table>

<div><br>
	<h4>B-	RÉFÉRENCE </h4>
</div>

<table class="table table-striped">
  <tbody>
    <tr>
      <th>1- Nom du parti politique ou Organisation :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->nom_parti ?></td>
    </tr>

	<tr>
      <th>2- Adresse du parti politique ou Organisation :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->adresse ?></td>
    </tr>

	<tr>
      <th>3)	Nom et Prénom du dirigeant ou de la dirigeante  :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->nom_dirigeant	?></td>
    </tr>

	<tr>
      <th>4) Téléphone  :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->telephone_dirigeant	?></td>
    </tr>

	<tr>
      <th>5) Email  :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <td><?= $user->email_dirigeant	?></td>
    </tr>
  </tbody>
</table>

<div><br><br><br><br>

<p>

</p>
<center>

____________________________________________<br><span>Signature du dirigeant ou de la dirigeante </span>

</center>


</div>

<?php } ?>


<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render(); 
// $dompdf->stream("sample.pdf");
$dompdf->stream( "dddd" , array( 'Attachment'=>0 ) );
?>



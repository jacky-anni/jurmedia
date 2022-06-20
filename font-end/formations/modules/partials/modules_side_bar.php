<div class="tab-content">
    <div class="tab-pane active" id="all">
        <div class="c-content-accordion-1">
			<div class="panel-group" id="accordion" role="tablist">
				<?php foreach (Module::liste($url[1]) as $key => $module ): ?>
					<?php
						$_index = null;
						$_id=null;

						foreach(Module::liste($url[1]) as $index => $module1)
						{
						    if($key == $index AND $module->id ==$module->id) // if($key == 550)
						    {
						        break;
						    }
						    $_index = $index;
						    $_id = $module1->id;
						}
						// verfier la note de quiz est superiur a 60
						$note= Quiz::resultat_quiz($_SESSION['id_user'],$_id);
					?>
				<div class="panel">
					<div class="panel-heading" role="tab" id="heading1">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#<?= $module->id ?>" aria-expanded="true" aria-controls="collapse1" style="font-size: 15px; color: black; font-weight: bold; line-height: 23px;"> <i class="c-theme-font fa fa-check-circle-o c-theme-font"></i> <?= $module->titre ?></a>
						</h4>
					</div>
					<div id="<?= $module->id ?>" class="panel-collapse <?php if($key==0){echo 'collapse in';}else{echo 'collapse';} ?>" role="tabpanel" aria-labelledby="heading1">
						<div class="panel-bo
						dy">
							<div class="c-boldy">
								<div class="col-md-1k2">
<!-- 									<p style="font-size: 14px;">
										<?= $module->description ?></br>
										<small><i class="fa fa-user"></i> <?= $module->intervenant ?> </small>
									</p> -->
									<table class="table table-striped">
										<tbody>
											<?php $doc= Query::count_prepare('document',$module->id,'reference'); ?>
											<?php $video_count= Query::count_prepare('video',$module->id,'reference'); ?>
											<?php $audio_count= Query::count_prepare('audio',$module->id,'reference'); ?>

											<?php $quiz_count= Query::count_prepare('quiz',$module->id,'id_module'); ?>

											<?php if($doc>=1): ?>
												<tr>
													<td style="background-color: #25a8b4; color: white;"><?= $module->description ?></br><small style="color: yellow;"> <i class="fa fa-user"></i> <b><i><?= $module->intervenant ?></i></b> </small></td>
												</tr>
												<?php foreach(Query::liste_prepare ('document',$module->id,'reference') as $document): ?>
													<tr>
														<td  style="<?php if(Fonctions::count_element($_SESSION['id_user'],$document->id,'document')){echo "background-color: #e9facb;";} ?>"><a <?php if($key!=0 AND $note<=60){echo "onclick='myFunction()'";}else{echo "href='$link_menu/document/$document->document /$document->id'";} ?>  target="_blank"> <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if(Fonctions::count_element($_SESSION['id_user'],$document->id,'document')){echo "checked";} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_PDF_24px_1.png"></span>  <?= $document->nom ?> <span style="float: right;">

														</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>


											<?php if($video_count>=1): ?>
												<?php foreach(Query::liste_prepare ('video',$module->id,'reference') as $video): ?>
													<tr>
														<td style="<?php if(Fonctions::count_element($_SESSION['id_user'],$video->id,'video')){echo "background-color: #e9facb;";} ?>"><a <?php if($key!=0 AND $note<=60){echo "onclick='myFunction()'";}else{echo "href='$link_menu/cours-suivi/$url[1]/$module->id/$video->id'";} ?>> <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if(Fonctions::count_element($_SESSION['id_user'],$video->id,'video')){echo "checked";} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Circled_Play_24px_1.png"></span>  <?= $video->nom ?></span></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>

											<?php if($audio_count>=1): ?>
												<?php foreach(Query::liste_prepare ('audio',$module->id,'reference') as $audio): ?>
													<tr>
														<td style="<?php if(Fonctions::count_element($_SESSION['id_user'],$audio->id,'audio')){echo "background-color: #e9facb;";} ?>"><a  <?php if($key!=0 AND $note<=60){echo "onclick='myFunction()'";}else{echo "href='$link_menu/cours-suivi/$url[1]/$module->id/$audio->id'";} ?>> <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if(Fonctions::count_element($_SESSION['id_user'],$audio->id,'audio')){echo "checked";} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Music_24px.png"></span>  <?= $audio->nom ?></span></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>

											
											<?php if($quiz_count>=1): ?>
												<?php foreach(Query::liste_prepare ('quiz',$module->id,'id_module') as $quiz): ?>
													<?php
														$count1=Quiz::verif_module($module->id,$_SESSION['id_user']);
														if($count1==0){
															$quiz_link="$link_menu/quiz/$url[1]/$module->id/$quiz->id";
														}else{
															$quiz_link="$link_menu/resultat-quiz/$url[1]/$module->id/$quiz->id";
														}
													?>
													<tr>
														<td style="<?php if(Fonctions::count_element($_SESSION['id_user'],$quiz->id,'quiz')){echo "background-color: #e9facb;";} ?>"><a <?php if($key!=0 AND $note<=60){echo "onclick='myFunction()'";}else{echo "href='$quiz_link'";} ?>> <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if(Fonctions::count_element($_SESSION['id_user'],$quiz->id,'quiz')){echo "checked";} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Query_24px.png"></span>  <?= $quiz->nom ?></span></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
    </div>
</div>

<style type="text/css">
	.icon
	{
		width: 22px;
	}
</style>
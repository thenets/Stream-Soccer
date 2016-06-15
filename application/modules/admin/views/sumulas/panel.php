<?php
$sumula = new Sumula($jogo->id_jogo);
$equipes = [];
$equipes[1] = new Equipe($jogo->equipe_1);
$equipes[2] = new Equipe($jogo->equipe_2);

?>
<div class="container">

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <!-- ESCALAÇÃO -->
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingOne">
	      <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          Escalação
	        </a>
	      </h4>
	    </div>
	    <div id="collapseOne" class="panel-collapse collapse <?php echo count($sumula->getEscalacao()) < 3 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="headingOne">
	      <div class="panel-body row">
	      	<?php for ($i=1; $i < 3; $i++): ?>
		        <!-- EQUIPES -->
		        <div class="col-sm-6">
		        	<img src="<?=$equipes[$i]->escudo?>" height="50" class="pull-right">
		        	<h3><?=$equipes[$i]->nome?></h3>
		        	<hr>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Posição</th>
								<th><span class="hidden">(actions)</span></th>
							</tr>
						</thead>
						<tbody>	
							<?php foreach ($equipes[$i]->getJogadores() as $key => $jogador): ?>
								<tr data-jogador="<?php echo $jogador->id_jogador ?>">
									<th><?php echo $jogador->id_jogador ?></th>
									<td><?php echo $jogador->nome ?></td>
									<td><?php echo $jogador->posicao ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
		        </div>
		    <?php endfor ?>
	      </div>
	    </div>
	  </div>

	  <!-- Faltas / Substituições / Gols -->
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingTwo">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          Collapsible Group Item #2
	        </a>
	      </h4>
	    </div>
	    <div id="collapseTwo" class="panel-collapse collapse <?php echo count($sumula->getEscalacao()) < 3 ? '' : 'in' ?>" role="tabpanel" aria-labelledby="headingTwo">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>

	  <!-- Finalizar -->
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingThree">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	          Collapsible Group Item #3
	        </a>
	      </h4>
	    </div>
	    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>
	</div>



</div>
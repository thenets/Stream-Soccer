<?php
$sumula = new Sumula($jogo->id_jogo);
$equipes = [];
$equipes[1] = new Equipe($jogo->equipe_1);
$equipes[2] = new Equipe($jogo->equipe_2);

?>
<div class="container" id="sumula-panel">

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <!-- ESCALAÇÃO -->
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingOne">
	      <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#escalacao" aria-expanded="true" aria-controls="escalacao">
	          Escalação
	        </a>
	      </h4>
	    </div>
	    <div id="escalacao" class="panel-collapse collapse <?php echo count($sumula->SYN_Events->escalacao) < 3 ? '' : 'in' ?>" role="tabpanel" aria-labelledby="headingOne">
	      <div class="panel-body row">
	        <!-- EQUIPES -->
	        <form action="<?=base_url('admin/sumulas/index/1')?>" method="POST" id="escalacao_form">
	      		<?php for ($i=1; $i < 3; $i++): ?>
		        	<input type="hidden" name="equipe_<?=$i?>" id="input_escalacao_<?=$i?>">

			        <div class="col-sm-6">
			        	<img src="<?=$equipes[$i]->escudo?>" height="50" class="pull-right">
			        	<h3><?=$equipes[$i]->nome?></h3>
			        	<hr>
						<table class="table table-striped table-bordered table-hover equipe_<?=$i?>">
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
		    </form>

		    <!-- Save Escalacao -->
		    <div class="col-sm-12">
		    	<button id="salvar_escalacao" class="btn btn-primary">Salvar escalação</button>
		    </div>
	      </div>
	    </div>
	  </div>

	    <!-- EVENTOS | Faltas / Substituições / Gols -->
	    <?php if(count($sumula->SYN_Events->escalacao) == 2): ?> 
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Ações
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse <?php echo count($sumula->SYN_Events->escalacao) < 3 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		        <!-- EQUIPES -->
		        <form action="<?=base_url('admin/sumulas/index/1')?>" method="POST" id="escalacao_form">
		      		<?php for ($i=1; $i < 3; $i++): ?>
			        	<input type="hidden" name="equipe_<?=$i?>" id="input_escalacao_<?=$i?>">

				        <div class="col-sm-6">
				        	<img src="<?=$equipes[$i]->escudo?>" height="50" class="pull-right">
				        	<h3><?=$equipes[$i]->nome?></h3>
				        	<hr>
							<table class="table table-striped table-bordered equipe_<?=$i?>">
								<thead>
									<tr>
										<th>#</th>
										<th>Nome</th>
										<th>Posição</th>
										<th><span class="hidden">(actions)</span></th>
									</tr>
								</thead>
								<tbody>	
									<?php foreach ($sumula->getEscalacao(($i-1)) as $key => $jogador):  ?>
										<tr data-jogador="<?php echo $jogador->id_jogador ?>">
											<th><?php echo $jogador->id_jogador ?></th>
											<td><?php echo $jogador->nome ?></td>
											<td><?php echo $jogador->posicao ?></td>
											<td>
												<a href="<?=base_url('admin/sumulas/falta/'.$sumula->id_sumula.'/'.$jogador->id_jogador)?>" class="btn btn-primary btn-xs">Falta</a>
												<a href="<?=base_url('admin/sumulas/gol/'.$sumula->id_sumula.'/'.$jogador->id_jogador)?>" class="btn btn-primary btn-xs">Gol</a>
												<a href="<?=base_url('admin/sumulas/impedimento/'.$sumula->id_sumula.'/'.$jogador->id_jogador)?>" class="btn btn-primary btn-xs">Impedimento</a>
												<a href="<?=base_url('admin/sumulas/substituicao/'.$sumula->id_sumula.'/'.$jogador->id_jogador)?>" class="btn btn-primary btn-xs">Substituição</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
				        </div>
			    	<?php endfor ?>
			    </form>
		      </div>
		    </div>
		  </div>
		<?php endif ?>

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


<script type="text/javascript">

$(document).ready(function(){
	$('.equipe_1.table-hover tr, .equipe_2.table-hover tr').on('click', function() {
	console.log('aa');
		$(this).toggleClass('selected');
	});


	$('#salvar_escalacao').on('click', function() {
		var equipe_1 = [];
		var equipe_2 = [];

		$('.equipe_1 tr.selected').each(function(index, el) {
			equipe_1.push($(this).data('jogador'));
			//console.log($(this).data('jogador'));
		});

		$('.equipe_2 tr.selected').each(function(index, el) {
			equipe_2.push($(this).data('jogador'));
			//console.log($(this).data('jogador'));
		});

		// Envia
		$('#input_escalacao_1').attr('value', JSON.stringify(equipe_1));
		$('#input_escalacao_2').attr('value', JSON.stringify(equipe_2));
		$('#escalacao_form').submit();
	});
});
</script>
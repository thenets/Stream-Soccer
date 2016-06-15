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
	    <div id="escalacao" class="panel-collapse collapse <?php echo count($sumula->SYN_Log->escalacao) < 3 ? '' : 'in' ?>" role="tabpanel" aria-labelledby="headingOne">
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
	    <?php if(count($sumula->SYN_Log->escalacao) == 2): ?> 
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Ações
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse <?php echo count($sumula->SYN_Log->escalacao) < 3 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		        <!-- EQUIPES -->
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
												<button data-url="<?=base_url('admin/sumulas/falta/'.$sumula->id_jogo.'/'.$jogador->id_jogador)?>" class="btn-falta btn btn-primary btn-xs" title="Falta"><i class="fa fa-hand-stop-o"></i></button>
												<button data-url="<?=base_url('admin/sumulas/cartao/'.$sumula->id_jogo.'/'.$jogador->id_jogador)?>" class="btn-cartao btn btn-primary btn-xs" title="Cartão"><i class="fa fa-clone"></i></button>
												<button data-url="<?=base_url('admin/sumulas/gol/'.$sumula->id_jogo.'/'.$jogador->id_jogador)?>" class="btn-gol btn btn-primary btn-xs" title="Gol"><i class="fa fa-soccer-ball-o"></i></button>
												<button data-url="<?=base_url('admin/sumulas/impedimento/'.$sumula->id_jogo.'/'.$jogador->id_jogador)?>" class="btn-impedimento btn btn-primary btn-xs" title="Impedimeto"><i class="fa fa-warning"></i></button>
												<button data-url="<?=base_url('admin/sumulas/substituicao/'.$sumula->id_jogo.'/'.$jogador->id_jogador)?>" class="btn-substituicao btn btn-primary btn-xs" title="Substituição"><i class="fa fa-exchange"></i></button>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
				        </div>
			    	<?php endfor ?>
		      </div>
		    </div>
		  </div>

		  <!-- Finalizar -->
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          Finalizar
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
		      	<a href="<?=base_url('admin/sumulas/substituicao/'.$sumula->id_sumula.'/'.$jogador->id_jogador)?>" class="btn btn-primary" title="Finalizar"><i class="fa fa-hourglass-end"></i> Finalizar</a>  
		      </div>
		    </div>
		  </div>

		<?php endif ?>
	</div>
</div>


<!-- 
# MODAL para os eventos
===================================================
 -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
	<form method="post">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="formModalLabel">Titulo</h4>
	      </div>
	      <div class="modal-body">
				
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Enviar</button>
	      </div>
	    </div>
	  </div>
	</form>
</div>
	
	<!-- 
	# FORM Gol
	===================================================
	-->
	<div id="form-gol">
		<div class="form-group">
			<label for="tempo">Tempo</label>
			<input type="number" class="form-control" name="tempo" id="tempo" value="0" placeholder="" min='0' max='50'>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="contra" value="1"> Contra?
			</label>
		</div>
	</div>




<script type="text/javascript">
/*
	Eventos (MODAL)
	===================================================
*/
$(document).ready(function(){
	$('.btn-gol').on('click', function(){
		// Obtem URL do botão
		var url = $(this).data('url');

		// Define url no form e titulo
		$('#formModal form').attr('action', url);
		$('#formModal .modal-title').html('Gol');

		// Move controles para o form
		$('#formModal form .modal-body').html('');
		$('#form-gol').clone().appendTo('#formModal form .modal-body');

		// Mostra modal
		$('#formModal').modal('show');

	});
});



/*
	Escalação
	===================================================
*/
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
		if(equipe_1.length < 15 || equipe_2.length < 15){
			alert("Os times devem ter no minimo 15 jogadores na escalação");
		}else{
			$('#input_escalacao_1').attr('value', JSON.stringify(equipe_1));
			$('#input_escalacao_2').attr('value', JSON.stringify(equipe_2));
			$('#escalacao_form').submit();
		}
	});
});


</script>
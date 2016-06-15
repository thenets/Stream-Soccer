<div class="container">
	<h2>Campeonato | <?=(new Campeonato($jogo->id_campeonato))->nome?></h2>
	<h3>Editar jogo</h3>
	<hr>
	
	<form action="<?=base_url('admin/campeonatos/'.$jogo->id_campeonato.'/jogos/edit/'.$jogo->id_jogo)?>" method="post">
		<div class="row">
			<input class="hidden" name="id_campeonato" value="<?=$jogo->id_campeonato?>">
			<input class="hidden" name="id_jogo" value="<?=$jogo->id_jogo?>">

			<div class="col-md-6">
				<h3>Jogo</h3>
				<div class="form-group">
					<label for="nome">Hora de Início</label>
					<input type="time" class="form-control" value="<?=$jogo->hora_inicio?>" name="hora_inicio" id="hora_inicio" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Hora do Fim</label>
					<input type="time" class="form-control" value="<?=$jogo->hora_fim?>" name="hora_fim" id="hora_fim" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Data</label>
					<input type="date" class="form-control" value="<?=$jogo->data?>" name="data" id="data" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Jogo já finalizado?</label><br>
					<input type="checkbox" <?=($jogo->finalizado) ? 'checked' : ''?> name="finalizado" value="1"> Sim<br>
				</div>
			</div>
			<div class="col-md-6">
				<h3>Campo</h3>
				<div class="form-group">
					<label for="nome">Nome do campo</label>
					<input required type="text" class="form-control" value="<?=$jogo->campo_nome?>" name="campo_nome" id="campo_nome" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Dimensão (em metros)</label>
					<input required type="text" class="form-control" value="<?=$jogo->campo_dimensao?>" name="campo_dimensao" id="campo_dimensao" placeholder="Ex.: 90x120">
				</div>

				<h3>Equipes</h3>
				<div class="form-group">
					<label for="tipo">Equipe 1</label>
					<select class="form-control" name="equipe_1" id="equipe_1">
					<option class="to_remove">Carregando...</option>
						<?php
							$this->load->model('Equipe');
							$equipes = Equipe::getAll();
							foreach ($equipes as $key => $equipe):
						?>
							<option value="<?=$equipe->id_equipe?>"><?=$equipe->nome?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="tipo">Equipe 2</label>
					<select class="form-control" name="equipe_2" id="equipe_2">
					<option class="to_remove">Carregando...</option>
						<?php
							$this->load->model('Equipe');
							$equipes = Equipe::getAll();
							foreach ($equipes as $key => $equipe):
						?>
							<option value="<?=$equipe->id_equipe?>"><?=$equipe->nome?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		
		<button type="submit" class="btn btn-success">Editar</button>
	</form>
</div>

<script>
(function() {
	// Set default field
	setTimeout(function () {
		// Equipe 1
		$('.to_remove').remove();
		$("#equipe_1").find("option[value='<?=$jogo->equipe_1?>']").attr("selected", true);
		$('#equipe_1').prop("disabled", false);

		// Equipe 2
		$('.to_remove').remove();
		$("#equipe_2").find("option[value='<?=$jogo->equipe_2?>']").attr("selected", true);
		$('#equipe_2').prop("disabled", false);



		$('button').prop("disabled", false).addClass('btn-success');
	}, 1000);
})();
</script>
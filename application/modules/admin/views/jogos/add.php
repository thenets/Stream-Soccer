<div class="container">
	<h2>Criar novo Jogo</h2>
	

	
	<form action="<?=base_url('admin/campeonatos/'.$id_campeonato.'/jogos/add')?>" method="post">
		<div class="row">
			<input class="hidden" name="id_campeonato" value="<?=$id_campeonato?>">

			<div class="col-md-6">
				<h3>Jogo</h3>
				<div class="form-group">
					<label for="nome">Hora de Início</label>
					<input type="time" class="form-control" name="hora_inicio" id="hora_inicio" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Hora do Fim</label>
					<input type="time" class="form-control" name="hora_fim" id="hora_fim" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Data</label>
					<input type="date" class="form-control" name="data" id="data" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Jogo já finalizado?</label><br>
					<input type="checkbox" name="finalizado" value="1"> Sim<br>
				</div>
			</div>
			<div class="col-md-6">
				<h3>Campo</h3>
				<div class="form-group">
					<label for="nome">Nome do campo</label>
					<input required type="text" class="form-control" name="campo_nome" id="campo_nome" placeholder="">
				</div>
				<div class="form-group">
					<label for="nome">Dimensão (em metros)</label>
					<input required type="text" class="form-control" name="campo_dimensao" id="campo_dimensao" placeholder="Ex.: 90x120">
				</div>

				<h3>Equipes</h3>
				<div class="form-group">
					<label for="tipo">Equipe 1</label>
					<select class="form-control" name="equipe_1" id="equipe_1">
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
		
		<button type="submit" class="btn btn-success">Adicionar</button>
	</form>
</div>
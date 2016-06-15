<div class="container">
	<h2>Criar novo campeonatos</h2>
	

	<div class="row">
		<form action="<?=base_url('admin/campeonatos/add')?>" method="post" class="col-md-6">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Campeonato">
			</div>
			<div class="form-group">
				<label for="tipo">Campeão</label>
				<select class="form-control" name="campeao" id="campeao">
					<option value="0">-- Nenhum --</option>
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
				<label for="tipo">Vice</label>
				<select class="form-control" name="vice" id="vice">
					<option value="0">-- Nenhum --</option>
					<?php
						$this->load->model('Equipe');
						$equipes = Equipe::getAll();
						foreach ($equipes as $key => $equipe):
					?>
						<option value="<?=$equipe->id_equipe?>"><?=$equipe->nome?></option>
					<?php endforeach ?>
				</select>
			</div>

			<button type="submit" class="btn btn-success">Adicionar</button>
		</form>
	</div>
</div>
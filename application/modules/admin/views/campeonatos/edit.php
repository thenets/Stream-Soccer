<div class="container">
	<h1>Editar Campeonato | <?=$campeonato->nome?></h1>

	<div class="row">
		<form action="<?=base_url('admin/campeonatos/edit/'.$campeonato->id_campeonato)?>" method="post" class="col-md-6">
			<input type="hidden" name="id_campeonato" value="<?=$campeonato->id_campeonato?>">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" value="<?=$campeonato->nome?>" name="nome" id="nome" placeholder="Nome do Campeonato">
			</div>
			<div class="form-group">
				<label for="tipo">Campeão</label>
				<select class="form-control" name="campeao" id="campeao">
					<option class="to_remove">Carregando...</option>
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
					<option class="to_remove">Carregando...</option>
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

			<button type="submit" class="btn btn-primary" disabled>Editar</button>
		</form>
	</div>
</div>


<script>
(function() {
	// Set default field
	setTimeout(function () {
		// Campeão
		$('.to_remove').remove();
		$("#campeao").find("option[value='<?=$campeonato->campeao?>']").attr("selected", true);
		$('#campeao').prop("disabled", false);

		// Vice
		$('.to_remove').remove();
		$("#vice").find("option[value='<?=$campeonato->vice?>']").attr("selected", true);
		$('#vice').prop("disabled", false);



		$('button').prop("disabled", false).addClass('btn-success');
	}, 1000);
})();
</script>
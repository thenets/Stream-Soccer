<div class="container">
	<h1>Editar Equipe</h1>

	<div class="row">
		<form action="<?=base_url('admin/equipes/edit/'.$equipe->id_equipe)?>" method="post" class="col-md-6">
			<input class="hidden" name="id_equipe" value="<?=$equipe->id_equipe?>">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do arbitro" value="<?=$equipe->nome?>">
			</div>

			<div class="form-group">
				<label for="tipo">Titulos</label>
				<input type="number" class="form-control" name="titulos" id="titulos" value="<?= $equipe->titulos?>" min="0">
			</div>

			<button type="submit" class="btn">Editar</button>
		</form>
	</div>
</div>

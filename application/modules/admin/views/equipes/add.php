<div class="container">
	<h2>Cadastrar nova equipe</h2>
	

	<div class="row">
		<form action="<?=base_url('admin/equipes/add')?>" method="post" class="col-md-6">
			<input class="hidden" name="id_equipe">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Equipe">
			</div>

			<div class="form-group">
				<label for="tipo">Titulos </label>
				<input type="number" class="form-control" name="titulos" id="titulos" value="" min="0">
			</div>

			<button type="submit" class="btn btn-success">Adicionar</button>
		</form>
	</div>
</div>
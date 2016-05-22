<div class="container">
	<h2>Cadastrar novo arbitro</h2>
	

	<div class="row">
		<form action="<?=base_url('admin/arbitros/add')?>" method="post" class="col-md-6">
			<input class="hidden" name="id_arbitro">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do arbitro">
			</div>

			<div class="form-group">
				<label for="tipo">Tipo</label>
				<select class="form-control" name="tipo" id="tipo">
					<option value="principal">Principal</option>
					<option value="auxiliar">Auxiliar</option>
				</select>
			</div>

			<button type="submit" class="btn btn-success">Adicionar</button>
		</form>
	</div>
</div>
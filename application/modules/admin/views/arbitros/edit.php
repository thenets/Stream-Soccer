<div class="container">
	<h1>Editar arbitro</h1>

	<div class="row">
		<form action="<?=base_url('admin/arbitros/edit/'.$arbitro->id_arbitro)?>" method="post" class="col-md-6">
			<input class="hidden" name="id_arbitro" value="<?=$arbitro->id_arbitro?>">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do arbitro" value="<?=$arbitro->nome?>">
			</div>

			<div class="form-group">
				<label for="tipo">Tipo</label>
				<select class="form-control" name="tipo" id="tipo" disabled>
					<option class="to_remove">Carregando...</option>
					<option value="principal">Principal</option>
					<option value="auxiliar">Auxiliar</option>
				</select>
			</div>

			<button type="submit" class="btn btn-success" disabled>Editar</button>
		</form>
	</div>
</div>

<script>
(function() {
	// Set default field
	setTimeout(function () {
		$('.to_remove').remove();
		$("#tipo").find("option[value='<?=$arbitro->tipo?>']").attr("selected", true);
		$('#tipo').prop("disabled", false);
		$('button').prop("disabled", false);
	}, 1000);
})();
</script>
<div class="container">
	<h2>Editar Jogador</h2>
	

	<div class="row">
		<form action="<?=base_url('admin/equipes/'.$id_equipe.'/jogadores/edit/'.$id_jogador)?>" method="post" class="col-md-6">
            <input class="hidden" name="id_jogador" value="<?=$id_jogador?>">
            
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Jogador" value="<?=$jogador->nome?>">
			</div>

			<div class="form-group">
				<label for="tipo">Posição </label>
				<select class="form-control" name="posicao" id="posicao">
				    <option class="to_remove">Carregando...</option>
					<option value="Goleiro">Goleiro</option>
					<option value="Zagueiro">Zagueiro</option>
					<option value="Lateral">Lateral</option>
					<option value="Volante">Volante</option>
					<option value="Meia">Meia</option>
					<option value="Meia Atacante">Meia Atacante</option>
					<option value="Atacante">Atacante</option>
				</select>
			</div>

			<button type="submit" class="btn" disabled>Editar</button>
		</form>
	</div>
</div>

<script type="text/javascript">
    (function() {
	// Set default field
	setTimeout(function () {
		$('.to_remove').remove();
		$("#posicao").find("option[value='<?=$jogador->posicao?>']").attr("selected", true);
		$('#posicao').prop("disabled", false);
		$('button').prop("disabled", false).addClass('btn-success');
	}, 1000);
})();
    
</script>
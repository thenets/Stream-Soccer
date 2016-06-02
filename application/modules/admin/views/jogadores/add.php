<div class="container">
	<h2>Cadastrar novo Jogador</h2>
	

	<div class="row">
		<form action="<?=base_url('admin/equipes/'.$id_equipe.'/jogadores/add')?>" method="post" class="col-md-6">
            <input class="hidden" name="id_jogador">
            
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Jogador">
			</div>

			<div class="form-group">
				<label for="tipo">Posição </label>
				<select class="form-control" name="posicao" id="posicao">
					<option value="Goleiro">Goleiro</option>
					<option value="Zagueiro">Zagueiro</option>
					<option value="Lateral">Lateral</option>
					<option value="Volante">Volante</option>
					<option value="Meia">Meia</option>
					<option value="Meia Atacante">Meia Atacante</option>
					<option value="Atacante">Atacante</option>
				</select>
			</div>

			<button type="submit" class="btn btn-success">Adicionar</button>
		</form>
	</div>
</div>
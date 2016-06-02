<div class="container">
	<h1>
		<?= $equipe->nome ?>
	</h1>
	<h2>
		Jogadores
		<a href="<?=base_url('admin/equipes/'.$id_equipe.'/jogadores/add')?>" class="btn btn-sm btn-success">Adicionar novo jogador</a>
	</h2>

	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Posição</th>
					<th><span class="hidden">(actions)</span></th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach ($jogadores as $key => $value): ?>
					<tr>
						<th><?php echo $value->id_equipe ?></th>
						<td><?php echo $value->nome ?></td>
						<td><?php echo $value->posicao ?></td>

						<td>
							<a href="<?=base_url('admin/equipes/'.$id_equipe.'/jogadores/edit/'  .$value->id_jogador)?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/equipes/'.$id_equipe.'/jogadores/remove/'.$value->id_jogador)?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


</div>
<div class="container">
	<h1>
		Equipes
		<a href="<?=base_url('admin/equipes/add/')?>" class="btn btn-sm btn-success">Adicionar nova</a>
	</h1>

	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Titulos</th>
					<th><span class="hidden">(actions)</span></th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach ($equipes as $key => $value): ?>
					<tr>
						<th><?php echo $value->id_equipe ?></th>
						<td><?php echo $value->nome ?></td>
						<td><?php echo $value->titulos ?></td>

						<td>
							<a href="<?=base_url('admin/equipes/edit/'  .$value->id_equipe)?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/equipes/remove/'.$value->id_equipe)?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/equipes/'.$value->id_equipe).'/jogadores'?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-user" aria-hidden="true"
							data-toggle="tooltip" data-placement="top" title="Jogadores do time <?= $value->nome ?>"></span> Jogadores</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


</div>
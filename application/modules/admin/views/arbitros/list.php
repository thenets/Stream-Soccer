<div class="container">
	<h1>
		Arbitros
		<a href="<?=base_url('admin/arbitros/add/')?>" class="btn btn-sm btn-success">Adicionar novo</a>
	</h1>

	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Tipo</th>
					<th><span class="hidden">(actions)</span></th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach ($arbitros as $key => $value): ?>
					<tr>
						<th><?php echo $value->id_arbitro ?></th>
						<td><?php echo $value->nome ?></td>
						<td><?php echo ucfirst($value->tipo) ?></td>

						<td>
							<a href="<?=base_url('admin/arbitros/edit/'  .$value->id_arbitro)?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/arbitros/remove/'.$value->id_arbitro)?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


</div>
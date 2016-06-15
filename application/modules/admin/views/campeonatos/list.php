<?php
$this->load->model('Equipe');
?>
<div class="container">
	<h1>
		Campeonatos
		<a href="<?=base_url('admin/campeonatos/add/')?>" class="btn btn-sm btn-success">Adicionar novo</a>
	</h1>

	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Campeão</th>
					<th>Vice</th>
					<th><span class="hidden">(actions)</span></th>
				</tr>
			</thead>
			<tbody>	
				<?php foreach ($campeonatos as $key => $value): ?>
					<tr>
						<th><?php echo $value->id_campeonato ?></th>
						<td><?php echo $value->nome ?></td>
						<td><?php echo $value->campeao ? (new Equipe($value->campeao))->nome : 'N/D' ?></td>
						<td><?php echo $value->vice ? (new Equipe($value->vice))->nome : 'N/D' ?></td>

						<td>
							<a href="<?=base_url('admin/campeonatos/edit/'  .$value->id_campeonato)?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/campeonatos/remove/'.$value->id_campeonato)?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
							<a href="<?=base_url('admin/campeonatos/'.$value->id_campeonato.'/jogos')?>" class="btn btn-xs btn-info"><i class="fa fa-futbol-o"></i> Jogos</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


</div>
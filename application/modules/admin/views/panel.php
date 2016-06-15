<div class="container">
	<h1>Jogos em andamento</h1>

	<?php
		$this->load->model('jogo');
		$this->load->model('equipe');
		$jogosEmAndamento = Jogo::getEmAndamento();
	?>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Equipes</th>
				<th>Hora Início</th>
				<th>Hora Fim</th>
				<th>Data</th>
				<th>Finalizado</th>
				<th>Campo Nome</th>
				<th><span class="hidden">(actions)</span></th>
			</tr>
		</thead>
		<tbody>	
			<?php foreach ($jogosEmAndamento as $key => $value): ?>
				<tr>
					<th><?php echo $value->id_jogo ?></th>
					<th><img src="<?=(new Equipe($value->equipe_1))->escudo?>" title="<?=(new Equipe($value->equipe_1))->nome?>" width='20'> x <img src="<?=(new Equipe($value->equipe_2))->escudo?>" title="<?=(new Equipe($value->equipe_2))->nome?>" width='20'></th>
					<td><?php echo $value->hora_inicio ?></td>
					<td><?php echo $value->hora_fim ?></td>
					<td><?php echo $value->data ?></td>
					<td><?php echo ($value->finalizado) ? 'Finalizado' : 'Não-finalizado' ?></td>
					<td><?php echo $value->campo_nome ?></td>

					<td>
						<a href="<?=base_url('admin/campeonatos/'.$value->id_campeonato.'/jogos/edit/'  .$value->id_jogo)?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="<?=base_url('admin/sumulas/index/'.$value->id_jogo)?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Controlar Súmula</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
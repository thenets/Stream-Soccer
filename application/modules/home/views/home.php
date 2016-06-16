<div class="content">

	<!-- Todos os campeonatos -->
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--1-col"></div>
		<div class="mdl-cell mdl-cell--5-col">
			<h3>Jogos em andamento</h3>

			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="eventos-table">
			  <thead>
			    <tr>
			      <th class="mdl-data-table__cell--non-numeric">Nome</th>
			      <th>Campeão</th>
			      <th>Vice</th>
			      <th><!-- Ações --></th>
			    </tr>
			  </thead>
			  <tbody>
				<?php foreach ($campeonatos as $key => $value): ?>
					<tr>
						<td><?php echo $value->nome ?></td>
						<td><?php echo $value->campeao ? (new Equipe($value->campeao))->nome : 'N/D' ?></td>
						<td><?php echo $value->vice ? (new Equipe($value->vice))->nome : 'N/D' ?></td>

						<td>
							<a href="<?=base_url('home/campeonato/'.$value->id_campeonato)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
							  Ver jogos
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			  </tbody>
			</table>	
		</div>

		<div class="mdl-cell mdl-cell--1-col"></div>

		<div class="mdl-cell mdl-cell--5-col">
			<h3>Campeonato</h3>
		</div>

		<div class="mdl-cell mdl-cell--2-col"></div>
	</div>

</div>
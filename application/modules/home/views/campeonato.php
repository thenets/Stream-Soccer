<div class="content">

	<!-- Jogos -->
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--1-col"></div>
		<div class="mdl-cell mdl-cell--5-col">
			<h3>Jogos em andamento</h3>

			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="eventos-table">
			  <thead>
			    <tr>
			      <th class="mdl-data-table__cell--non-numeric">Equipes</th>
			      <th>Resultado</th>
			      <th><!-- Ações --></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($jogos as $key => $jogo): ?>
				    <tr>
				      <td class="mdl-data-table__cell--non-numeric">
				      	<img height="24" src="<?=(new Equipe($jogo->equipe_1))->getEscudo()?>"> <?=(new Equipe($jogo->equipe_1))->nome?>
				      	x
				      	<?=(new Equipe($jogo->equipe_2))->nome?> <img height="24" src="<?=(new Equipe($jogo->equipe_2))->getEscudo()?>">
				      </td>
				      <td><?=$jogo->getResultado()['equipe_1']?> x <?=$jogo->getResultado()['equipe_2']?></td>
				      <td>
				      	<a href="<?=base_url('home/'.$jogo->id_jogo)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
						  Assistir
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
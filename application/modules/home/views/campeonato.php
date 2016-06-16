<div class="content">

	<!-- Jogos -->
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--11-col">
			<a href="<?=base_url('home')?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
			  Ver todos os campeonatos
			</a>
		</div>

		<div class="mdl-cell mdl-cell--4-col">
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
				      	<a href="<?=base_url('home/jogo/'.$jogo->id_jogo)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
						  Assistir
						</a>
				      </td>
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>	
		</div>

		<div class="mdl-cell mdl-cell--1-col"></div>

		<div class="mdl-cell mdl-cell--6-col">
			<h3>Campeonato</h3>

			<div>
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="eventos-table">
				  <thead>
				    <tr>
				      <th class="mdl-data-table__cell--non-numeric">Equipe</th>
				      <th>Pontos</th>
				      <th>Vitórias</th>
				      <th>Empates</th>
				      <th>Derrotas</th>
				      <th>Gols Pro</th>
				      <th>Gols Contra</th>
				      <th>Saldo</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($status as $key => $value): $equipe = new Equipe($value['id_equipe']); ?>
					    <tr>
					      <td class="mdl-data-table__cell--non-numeric">
					      	<img height="24" src="<?php echo $equipe->getEscudo() ?>"> <?php echo $equipe->nome ?>
					      </td>
					      <td><?=(3*$value['vitoria'])+($value['empate'])?></td>
					      <td><?=$value['vitoria']?></td>
					      <td><?=$value['empate']?></td>
					      <td><?=$value['derrota']?></td>
					      <td><?=$value['gols_pro']?></td>
					      <td><?=$value['gols_contra']?></td>
					      <td><?=($value['gols_pro'] - $value['gols_contra'])?></td>
					    </tr>
					<?php endforeach ?>
				  </tbody>
				</table>
			</div>
		</div>

		<div class="mdl-cell mdl-cell--2-col"></div>
	</div>

</div>
<div class="content">
	<!-- RESULTADO -->
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--1-col"></div>
		<div class="mdl-cell mdl-cell--8-col">
			<a href="<?=base_url('home/campeonato/'.$jogo->id_campeonato)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
			  Voltar para o campeonato
			</a><br><br><br>

			<div style="font-size: 30px; text-align: center;">
				<img height="64" src="<?=(new Equipe($jogo->equipe_1))->getEscudo()?>"> <?=(new Equipe($jogo->equipe_1))->nome?>
		      	<?=$jogo->getResultado()['equipe_1']?> x <?=$jogo->getResultado()['equipe_2']?>
		      	<?=(new Equipe($jogo->equipe_2))->nome?> <img height="64" src="<?=(new Equipe($jogo->equipe_2))->getEscudo()?>">	
			</div>
			
		</div>
	</div>


	<!-- Eventos -->
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--1-col"></div>
		<div class="mdl-cell mdl-cell--8-col">
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="eventos-table">
			  <thead>
			    <tr>
			      <th class="mdl-data-table__cell--non-numeric">Evento</th>
			      <th>Equipe</th>
			      <th>Tempo</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($sumula->Ao_vivo() as $key => $evento): ?>
				    <tr>
				      <td class="mdl-data-table__cell--non-numeric">
					      <?=$evento['msg']?>
				      </td>
				      <td><?=(new Equipe($evento['equipe']))->nome?></td>
				      <td><?=$evento['tempo']?></td>
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>	
		</div>
		<div class="mdl-cell mdl-cell--2-col"></div>
	</div>
</div>
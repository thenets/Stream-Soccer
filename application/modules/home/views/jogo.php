<div id="content-ajax">
</div>

<script type="text/javascript">
$( "#content-ajax" ).load( "<?=base_url('home/ao_vivo/'.$jogo->id_jogo)?>" );

setInterval(function(){
	$( "#content-ajax" ).load( "<?=base_url('home/ao_vivo/'.$jogo->id_jogo)?>" );
}, 2000);
</script>
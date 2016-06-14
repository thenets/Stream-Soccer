<!--
# Backup and restore
# ===================================================
-->
<style type="text/css">
	#backup_restore .mdl-card__title {
	    background: url('https://source.unsplash.com/sRl0OW4XFYg/600x300') bottom/cover;
	    color: white;
	    min-height: 160px;
	    text-shadow: 0 0 3px black;
	}
</style>
<script>
function databaseDisableButtons() {
	$("#backup_restore button").attr("disabled", true);
	$("#backup_restore .loading").removeClass('hidden');
}
function databaseEnableButtons() {
	$("#backup_restore button").attr("disabled", false);
	$("#backup_restore .loading").addClass('hidden');
}

function databaseBackup(){
	databaseDisableButtons();
	$.getJSON( "<?php echo base_url('forge/database/backup') ?>", function( data ) {
		setTimeout(function() {
			databaseEnableButtons();
			showMessage(data.msg);
		}, 1000);
	});
}
function databaseRestore(){
	databaseDisableButtons();
	$.getJSON( "<?php echo base_url('forge/database/restore') ?>", function( data ) {
		setTimeout(function() {
			databaseEnableButtons();
			showMessage(data.msg);
		}, 1000);
	});
}
</script>

<div class="home_card mdl-card mdl-shadow--4p" id="backup_restore">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Backup and Restore</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Save your database or restore. Use as a snapshot and make all tests needed.<br>
    Be a god like Chronos and travel around the time and space.

    <div class="loading animated slideInLeft hidden">
    	<br><div id="p1" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
    </div>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <button onclick="databaseBackup()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Backup
    </button>
    <button onclick="databaseRestore()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Restore
    </button>
  </div>
</div>
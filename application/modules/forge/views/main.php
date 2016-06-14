<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Syn Forge</title>

    <!-- MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue-red.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.1/animate.min.css">

	<!-- JS -->
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		/* SHOW Message */
		function showMessage($msg) {
		  'use strict';
		  window['counter'] = 0;
		  var snackbarContainer = document.querySelector('#toast-container');
		    var data = {message: $msg};
		    snackbarContainer.MaterialSnackbar.showSnackbar(data);
		}
	</script>

    <style type="text/css">/* https://source.unsplash.com/ibpzzTR3VxY/600x300 */
    	body {
    		background: #929292 url("https://source.unsplash.com/MvIknBxI2eU/1600x900") center/cover;
    		transition: 1s;
    	}
    	.hidden {
    		display: none;
    	}
      .home_card {
        width: 100%;
      }
    </style>
  <body>

<!-- TOAST container -->
<div id="toast-container" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

<!-- LAYOUT -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	<!-- DESKTOP MENU / TOPBAR -->
    <header class="mdl-layout__header mdl-layout__header--transparent">
	        <div class="mdl-layout__header-row">
   	        <!-- Title -->
   	        <span class="mdl-layout-title">Syn Forge</span>
   	        <!-- Add spacer, to align navigation to the right -->
   	        <div class="mdl-layout-spacer"></div>
   	        <!-- Navigation. We hide it in small screens. -->
   	        <nav class="mdl-navigation mdl-layout--large-screen-only">
   		        <a class="mdl-navigation__link" href="http://127.0.0.1/whotalk/account/login">Sign in</a>
   				<a class="mdl-navigation__link" href="http://127.0.0.1/whotalk/account/register">Register</a>
   	        </nav>
	        </div>
    </header>

    <!-- MOBILE MENU -->
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Syn Forge</span>
        <nav class="mdl-navigation">
	            <a class="mdl-navigation__link" href="http://127.0.0.1/whotalk/account/login">Sign in</a>
	  		    <a class="mdl-navigation__link" href="http://127.0.0.1/whotalk/account/register">Register</a>
        </nav>
    </div>


    <!-- MAIN CONTENT -->
    <main class="mdl-layout__content">
      <div class="page-content">

      	<div class="content" id="page-home">
			<!-- Main Grid -->
			<div class="mdl-grid">
			  
			  <!-- Main content -->
        <div class="mdl-cell mdl-cell--4-col">
          <?php $this->load->view('forge/_backup_restore') ?>
        </div>

        <div class="mdl-cell mdl-cell--4-col">
          <?php $this->load->view('forge/_cache') ?>
        </div>

			</div>
		</div>
      </div><!-- /MAIN CONTENT -->


    </main>
  </div><!-- /.mdl-layout -->

</body>
</html>
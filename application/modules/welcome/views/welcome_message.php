<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="container">
	<h1>Welcome to <span class="title"></span></h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by SynIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/modules/welcome/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/modules/welcome/controllers/Welcome.php</code>

		<p>You can edit JS and CSS easily at:</p>
		<code>application/modules/welcome/js/</code>
		<code>application/modules/welcome/scss/</code>

		<p>If you are exploring SynIgniter for the very first time, you should start by reading the <a href="user_guide/">CodeIgniter's User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'SynIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
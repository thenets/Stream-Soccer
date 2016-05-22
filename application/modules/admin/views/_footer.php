	<div class="container">
		<hr>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'SynIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

    <!-- SynCompiler : JS -->
    <script src="https://cdn.lfrs.sl/alloyui.com/3.0.1/aui/aui-min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <?php echo SynCompileJS() ?>

  </body>
</html>
<header class="jumbotron">
	<div class="container">
		<h1>Gustă bucuria <br> revederii <br> și poți câștiga cu</h1>

		<form action="<?=site_url('api/validate_code')?>" method="post" id="code-form">
			<h2>Înscrie codul</h2>
			<img src="<?=base_url('static/img/ajax-loader.gif')?>" style="display:none;" class="loader">
			<div class="form-group">
				<input id="code" type="text" placeholder="COD" name="code" class="form-control">
			</div>
			<div class="form-group">
				<div class="input-group">
					<input id="phone" type="text" placeholder="TELEFON" name="phone" class="form-control">
					<span class="input-group-btn">
						<a class="btn btn-default" type="button" onclick="app.submitCode()"><img src="<?=base_url('static/img/form-submit.png')?>" alt="" height="21px"></a>
					</span>
				</div>
			</div>
			<p class="message"></p>
		</form>
	</div>
</header>

<script type="text/javascript">
$(function() {
	$('#code-form').keyup(function(e) {
		if(e.which == 13) {
			app.submitCode();
		}
	});
})
</script>

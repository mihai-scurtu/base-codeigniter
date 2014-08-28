<nav class="black-wrapper navbar navbar-inverse nav-header" role="navbar-navigation">
	<div class="container">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="<?=active_class('home', $page)?>"><a href="<?=base_url('app/')?>">Home</a></li>
				<!-- <li class="<?=active_class('cum-particip', $page)?>"><a href="<?=url('cum-particip')?>">Cum particip</a></li> -->
				<li class="<?=active_class('ziua-colegilor', $page)?>"><a href="<?=url('app/ziua-colegilor')?>">Ziua colegilor</a></li>
				<li class="<?=active_class('castigatori', $page)?>"><a href="http://ziuacolegilor.ro/castigatori" target="_blank">Castigatori</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<!-- 	<li><a href="">Creeaza cont</a></li>
				<li><a href="">Intra in cont</a></li> -->
				<!-- <li class="fb active"><a href="https://www.facebook.com/Poiana" title"Poiana Facebook" target="_blank">Like</a></li> -->
			</ul>
		</div>
	</div>
</nav>

<header class="jumbotron">
	<div class="container">
		<h1>Gustă bucuria <br> revederii <br> și poți câștiga cu</h1>

		<form action="<?=site_url('api/validate_code')?>" method="post" id="code-form">
			<h2>Înscrie codul</h2>
			<div class="form-group">
				<input id="code" type="text" placeholder="COD" name="code" class="form-control">
			</div>
			<div class="form-group">
				<div class="input-group">
					<input id="phone" type="text" placeholder="TELEFON" name="phone" class="form-control">
					<span class="input-group-btn">
						<a class="btn btn-default" type="button" onclick="app.submitCode(true)"><img src="<?=base_url('static/img/form-submit.png')?>" alt="" height="21px"></a>
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
			app.submitCode(true);
		}
	});
})
</script>
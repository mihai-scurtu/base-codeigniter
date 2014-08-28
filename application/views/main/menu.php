<nav class="black-wrapper navbar navbar-inverse nav-header" role="navbar-navigation">
	<div class="container">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="<?=active_class('home', $page)?>"><a href="<?=url()?>">Home</a></li>
				<li class="<?=active_class('cum-particip', $page)?>"><a href="<?=url('cum-particip')?>">Cum particip</a></li>
				<li class="<?=active_class('castigatori', $page)?>"><a href="<?=url('castigatori')?>">Castigatori</a></li>
				<li class="<?=active_class('ziua-colegilor', $page)?>"><a href="<?=url('ziua-colegilor')?>">Ziua colegilor</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if($logged_in_user) { ?>
				<li><p class="nav navbar-text">Bine ai venit, <?=$logged_in_user->nume?></p></li>
				<li class="<?=active_class('contul-meu', $page)?>"><a href="<?=url('contul-meu')?>" title="Contul meu">Contul meu</a></li>
				<li class=""><a href="<?=site_url('main/logout')?>" title="Logout">Logout</a></li>
			<?php } else { ?>
				<li>
					<a href="javascript:;">Creeaza cont</a>
					<form action="" role="form" class="account-form register" autocomplete="off" onsubmit="app.register($(this)); return false;">
						<p class="message"></p>
						<div class="form-group">
							<input type="text" name="telefon" class="form-control phone" placeholder="Telefon" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="text" name="nume" class="form-control name" placeholder="Nume și prenume" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" name="pass" class="form-control pass" placeholder="Parola" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" name="repass" class="form-control repass" placeholder="Reintrodu parola" autocomplete="off">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Creează cont</button>
						</div>
					</form>
				</li>
				<li>
					<a href="javascript:;">Intră in cont</a>
					<form action="" role="form" class="account-form login" onsubmit="app.login($(this)); return false;">
						<p class="message"></p>
						<div class="form-group">
							<input type="text" name="telefon" class="form-control phone" placeholder="Telefon">
						</div>
						<div class="form-group">
							<input type="password" name="pass" class="form-control pass" placeholder="Parola">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Intră în cont</button>
						</div>
					</form>
				</li>
			<?php } ?>
				<li class="fb active"><a href="https://www.facebook.com/Poiana" target="_blank" onclick="ga('send', 'event', 'button', 'click', 'Buton like')">Like</a></li>
			</ul>
		</div>
	</div>
</nav>
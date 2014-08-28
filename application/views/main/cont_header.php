<header class="jumbotron cont">
	<div id="account-info">
		<h2>Datele mele</h2>
		<p>
			Nume: 
			<a href="" class="editable" data-name="nume" data-type="text" data-placeholder="Nume" 
				data-url="<?=site_url('api/update_account')?>"><?=$logged_in_user->nume?></a>
		</p>
		<p>
			Email: 
			<a href="" class="editable" data-name="email" data-type="text" data-placeholder="Email" 
				data-url="<?=site_url('api/update_account')?>"><?=$logged_in_user->email?></a>
		</p>
		<p>
			Adresa: 
			<a href="" class="editable" data-name="adresa" data-type="text" data-placeholder="Adresa" 
				data-url="<?=site_url('api/update_account')?>"><?=$logged_in_user->adresa?></a>
		</p>
	</div>
</header>

<script type="text/javascript">
$(function() {
	$.fn.editable.defaults.mode = 'inline';
	$('.editable').editable({
		showbuttons: false,
		send: 'always',
		emptytext: '...',
		onblur: 'submit',
	});
});
</script>
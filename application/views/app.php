<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 

	<title>Ziua Colegilor</title>

	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/bootstrap-theme.min.css')?>">

	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/app/style.css')?>">

	<script>
		var base_url = '<?=base_url()?>';
	</script>

	<!-- JAVASCRIPT -->
	<script type="text/javascript" src="<?=base_url('static/js/vendor/jquery-2.1.1.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('static/js/vendor/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('static/js/vendor/angular.min.js')?>"></script>
	
	<link rel="stylesheet" href="<?=base_url('static/js/vendor/fancybox/jquery.fancybox.css')?>">
	<script type="text/javascript" src="<?=base_url('static/js/vendor/fancybox/jquery.fancybox.pack.js')?>"></script>

	<script type="text/javascript">
		$(function() {
			$('.fancybox').fancybox();
		});
	</script>

	<script type="text/javascript" src="<?=base_url('static/js/app.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('static/js/quiz.js')?>"></script>

<?php // if this template is called to show a quiz result page?>
<?php if($ecard_src) { ?>
	<meta property="og:image" content="<?=$ecard_src?>">
<?php }?>

<?php // if this template is called to show an ecard permalink?>
<?php if($open_ecard) { ?>
	<meta property="og:image" content="<?='http://ziuacolegilor.ro/'.$ecards[$open_ecard - 1]?>">
<?php }?>


</head>
<body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement,
	  m=s.getElementsByTagName[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-43124049-19', 'auto');
	  ga('send', 'pageview');

	</script>

	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '799569256740750',
				xfbml      : true,
				version    : 'v2.0'
			});

			FB.Canvas.setSize({height: 600});
			FB.Canvas.setAutoGrow();
		};

		(function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/en_US/sdk.js";
			 fjs.parentNode.insertBefore(js, fjs);
		 }(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="fb-root"></div>

	<?=$header?>

	<?=$content?>

	<?=$footer?>

	<div id="code-results" class="popup">
		<p></p>
	</div>
</body>
</html>
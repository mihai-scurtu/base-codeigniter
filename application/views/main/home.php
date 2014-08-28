<div id="home" class="main-wrapper">
	<div class="container">
		<a href="<?=url('ziua-colegilor')?>" class="ziua-colegilor" tile="Ziua Colegilor"></a>
	</div>
</div>

<?php // if this template is called to show a quiz result page?>
<?php if($ecard_src) { ?>
<div class="quiz-result">
	<div>
		<img src="<?=$ecard_src?>" alt="" class="ecard">
		<a href="javascript: app.sharePage()" class="btn-share"></a>
		<p>Am creat special pentru tine, un mesaj pe care să-l transmiți colegilor și celor dragi, cu ocazia revederii.</p>
	</div>
</div>
<?php } ?>
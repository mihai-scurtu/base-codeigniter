<div id="cont" class="main-wrapper">
	<div class="container">
		<h2>Coduri introduse</h2>
	<?php if(count($codes)) { ?>
		<ul class="codes">
		<?php foreach($codes as $i => $code) { ?>
			<li>
				<span class="counter"><?=($i + 1)?></span>
				<span class="code">
					<?=$code->cod?>
				</span>
				<span class="date">
					<?=$code->nice_date?>
				</span>
			</li>
		<?php } ?>
		</ul>
	<?php } else { ?>
		<p>Nu ai trimis încă niciun cod.</p>
	<?php } ?>
	</div>
</div>
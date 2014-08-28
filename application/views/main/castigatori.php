<div id="castigatori" class="main-wrapper">
	<div class="container">
		<div class="col-1">
			<p>Bucuria câștigării unui premiu e apoape la fel de dulce ca bucuria revederii colegilor. <br> Urmărește săptămânal această secțiune și află dacă ai câștigat unul din premiile campaniei Chokotoff.</p>
		</div>
		<div class="col-2 winner-list">
			<h2>Câștigători săptămânali</h2>
		<?php if(count($weekly_winners)) {?>
			<div class="mCustomScrollbar">
				<table>
				<?php foreach($weekly_winners as $row) {?>
					<tr>
						<td align="left"><?=$row->name?></td>
						<td align="right"><?=$row->nice_date?></td>
					</tr>
				<?php }?>
				</table>
			</div>
		<?php } else {?>
			<p>Nu au fost încă desemnați câștigători</p>
		<?php } ?>
		</div>
		<div class="col-3 winner-list">
			<h2>Câștigători zilnici</h2>
		<?php if(count($weekly_winners)) {?>
			<div class="mCustomScrollbar">
				<table>
				<?php foreach($weekly_winners as $row) {?>
					<tr>
						<td align="left"><?=$row->name?></td>
						<td align="right"><?=$row->nice_date?></td>
					</tr>
				<?php }?>
				</table>
			</div>
		<?php } else {?>
			<p>Nu au fost încă desemnați câștigători</p>
		<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?=base_url('static/js/vendor/jquery.mousewheel.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('static/js/vendor/jquery.mCustomScrollbar.concat.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('static/js/vendor/jquery.mCustomScrollbar.css')?>">
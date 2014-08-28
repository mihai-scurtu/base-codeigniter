<div id="ziua-colegilor" class="main-wrapper">
	<div class="container">
		<div class="description">
			<h2>Chokotoff declară 15 septembrie Ziua Colegilor</h2>
			<p>Sunt alături de tine zi de zi, te susțin atunci când ai nevoie, te consolează și știu să se bucure de fiecare victorie a ta. De ce să nu transformi revederea lor într-un moment de sărbătoare?</p>
			<p><b>Chokotoff declară 15 septembrie Ziua Colegilor</b> și te invită să te bucuri de fiecare moment în care ești alături de ei. </p>
			<p>Fie că sunt colegii pe care îi regăsești după concediu, colegi noi de muncă pe care acum îi cunoști sau colegii dragi de școală ai copilului tău, alege să sărbătorești întâlnirea sau revederea lor alături de pralinele Chokotoff.</p>
		</div>
		<div class="slider-wrapper clearfix">
			<p>Pentru a face momentele de revedere și mai dulci, ți-am pregătit și câteva mesaje pe care să le transmiți celor mai dragi colegi:</p>
			<div class="jcarousel-wrapper">
				<div class="jcarousel">
					<ul>
					<?php foreach($ecards as $i => $row) {?>
						<li>
							<a href="<?=base_url($row)?>" rel="Ziua Colegilor" class="fancybox">
								<img src="<?=base_url($row)?>" alt="Ziua Colegilor">
							</a>

							<a href="javascript: app.sharePage('http://ziuacolegilor.ro/ziua-colegilor/<?=$i+1?>')" class="btn-share"></a>
						</li>
					<?php }?>
					</ul>
				</div>
				<a href="javascript:;" class="jcarousel-nav prev"></a>
				<a href="javascript:;" class="jcarousel-nav next"></a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?=base_url('static/js/vendor/jcarousel.js')?>"></script>
<script type="text/javascript">
$(function() {
	<?php if($open_ecard) { ?>
		$.fancybox($('.jcarousel .fancybox').eq(<?=$open_ecard - 1?>));
	<?php } ?>
	
		var jcarousel = $('.jcarousel');
		jcarousel
			// .on('jcarousel:reload jcarousel:create', function () {
			//     var width = jcarousel.innerWidth();

			//     if (width >= 600) {
			//         width = width / 4;
			//     } else if (width >= 350) {
			//         width = width / 3;
			//     }

			//     jcarousel.jcarousel('items').css('width', width + 'px');
			// })
			.jcarousel({
				wrap: 'circular'
			});

		$('.jcarousel-pagination')
			.on('jcarouselpagination:active', 'li', function() {
				$(this).addClass('active');
			})
			.on('jcarouselpagination:inactive', 'li', function() {
				$(this).removeClass('active');
			})
			.jcarouselPagination({
				item: function(page, carouselItems) {
					return '<li><a href="#' + page + '">' + page + '</a></li>';
				}
			});

		$('.jcarousel-nav.prev')
			.jcarouselControl({
				target: '-=1'
			});

		$('.jcarousel-nav.next')
			.jcarouselControl({
				target: '+=1'
			});
});

</script>
<link rel="stylesheet" href="<?= base_url()?>css/style.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="<?= base_url()?>js/fancybox/fancybox.css" type="text/css" charset="utf-8">
<script type="text/javascript" src="<?= base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url()?>js/fancybox/fancybox.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.alert').delay(2500).fadeOut(750);
		
		$('.alert').click(function(){
			$(this).fadeOut(750);
			return false;
		});
		
		$(".lightbox").fancybox();
	});
</script>
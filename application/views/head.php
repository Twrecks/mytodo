<link rel="stylesheet" href="<?= base_url()?>css/style.css" type="text/css" charset="utf-8">
<script type="text/javascript" src="<?= base_url()?>js/jquery.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.alert').click(function(){
			$(this).fadeOut(350);
			return false;
		});
	});
</script>
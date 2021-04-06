<div class="container">
	<div class="row">
		<div class="col-12 p-0">
			<?php dd($_SESSION['ss_Submission']);?>
		</div>
	</div>
</div>
<script>
jQuery(window).on('load', function(){
	jQuery('.site_container').css('background-image','url(\'<?php echo base_url();?>media/images/<?php echo $this->platform;?>/<?php echo $this->pageName;?>/background-full.jpg\')');
});
</script>
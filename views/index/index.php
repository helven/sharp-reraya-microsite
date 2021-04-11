<style>
    body.debug {
        background-image: url('<?php echo base_url();?>media/images/<?php echo $this->platform;?>/<?php echo $this->pageName;?>/ref.jpg');
    }
    body.debug .site_container {
        background: none !important;
        background-image: none !important;
    }
    #div_LocationList {
        display: none;
    }
    .input_checkbox .checkbox {
        background: transparent url('<?php echo base_url();?>media/images/checkbox_sprite.png') no-repeat 0 0;
        display: block;
        height: 13.5px;
        position: absolute;
        top: 4px;
        width: 15px;
    }
    .input_checkbox .checkbox.checked {
        background-position: 0 -13.5px;
    }
    .input_checkbox .text {
        cursor: default;
        display:block;
        margin-left: 18px;
    }
</style>
<?php if($this->config['environment'] == 'live'){ ?>

<?php } ?>
<?php /*<div id="div_ToggleDebug" style="background:#FF0000;position:fixed;height:100px;width:100px;bottom:0;right:0;z-index:2147483647"></div>*/ ?>
<script>
var idleTime	= 0;
jQuery(document).ready(function(){
    // Increment the idle time counter every minute.
    var idleInterval = setInterval(function(){
        idleTime	= idleTime + 1;
        if (idleTime > 19) { // 20 minutes
            window.location.reload();
        }
    }, 60000); // 1 minute

    // Zero the idle timer on mouse movement.
    jQuery(this).mousemove(function (e) {
        idleTime = 0;
    });
    jQuery(this).keypress(function (e) {
        idleTime = 0;
    });
    
    
    <?php if($this->formError){ ?>
        jQuery(this).zboxOpen({
            text: '<?php echo $this->formErrorMsg;?>'
        });
    <?php } ?>
    
    /*jQuery('#a_IndexPrivacy').click(function(){
        jQuery(this).zboxOpen({
            text: jQuery('#div_PrivacyPolicyContent').html(),
            callback: zbox_callback
        });
    });
    jQuery('#a_IndexTnC').click(function(){
        jQuery(this).zboxOpen({
            text: jQuery('#div_TnCContent').html(),
            callback: zbox_callback
        });
    });*/
});
jQuery(window).on('load', function(){
    
});
</script>
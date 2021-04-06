<div class="container">
    <div class="row">
        <div class="col-12 p-0">
            <iframe id="iframe_Game" src="<?php echo base_url();?>game/iframe-game" style="border:0;width:100%;"></iframe>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function(){
    set_game_size();

    jQuery(window).resize(function(){
        set_game_size();
    });

    function set_game_size()
    {
        ratio   = 0.5625;
        height  = jQuery('#iframe_Game').width() * ratio;
        jQuery('#iframe_Game').height(height);
    }
});
</script>
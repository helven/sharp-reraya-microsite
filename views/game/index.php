<div class="container">
    <div class="row">
        <div class="col-12 p-0">
            <iframe id="iframe_Game" src="" style="border:0;width:100%;"></iframe>
        </div>
    </div>
    <h1><?php echo $_COOKIE['_leksxia_x2'];?></h1>
    <h1><?php echo str_replace(array('_','x','F','B','E','#'), '', $_COOKIE['_leksxia_x2']);?></h1>

    <?php if(!check_auth()){ ?>
    <div>
        <a href="">Sign UP / Login</a>
    </div>
    <?php } ?>
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

    window.addEventListener('message', function(event){
        if(typeof event.data != 'object')
        {
            return;
        }
        if(event.data.source != 'sharp')
        {
            return;
        }
        
        <?php if(!check_auth()){ ?>
            // show Sign Up / login popup
        <?php }else{ ?>
            // Store score
            
        <?php } ?>

        jQuery.ajax({
            type        : 'POST',
            url         : '<?php echo base_url();?>game/ajax-store',
            dataType    : 'json',
            data        : {score:event.data.score},
            beforeSend  : function(){

            },
            error       : function(o_rtn){

            },
            success     : function(o_rtn){
                console.log(o_rtn);
            }
        });
    });

    jQuery('#iframe_Game').attr('src', '<?php echo base_url();?>game/iframe-game');
});
</script>
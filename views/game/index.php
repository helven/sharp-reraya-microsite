<div class="pop-up ta-c va-m">
  <p class="title">Nice Shot!</p>
  <p class="message">Please <a style="color: #fff; text-decoration: underline!important" href="<?php echo base_url(); ?>auth/login">login</a> to save your score. If you do not have an account please <a style="color: #fff; text-decoration: underline!important" href="<?php echo base_url(); ?>auth/sign-up">sign-up</a>.</p>
  	<div class="centered"> <a href="javascript:void(0);" class="button"><button>CLOSE</button></a></div>
</div>
<section class="sc-1 ">
  <div class="container"> <img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt="">
    <div class="mini-game centered">
      <h1 style="margin-top: 0; margin-bottom: 2em;">Play this easy minigame to win more amazing prizes this Raya with SHARP!</h1>
      <iframe id="iframe_Game" src="" style="border:0;width:100%;margin:1em 0;"></iframe>
      <div class="htp table fullwidth ta-l">
        <div class="minigame-img"> <img class="fullwidth" src="images/how-to-play.png" alt=""> </div>
        <div>
          <ol style="padding: 0">
            <li>Shoot a ketupat to gain points</li>
            <li>Points are lost if products or red pelitas are shot</li>
            <li>Take too long to shoot the next ketupat and it's game over</li>
            <li>On mobile devices, rotate your screen for the
              best experience</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
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
            date = new Date();
            date.setTime(date.getTime() + (1*24*60*60*1000));
            expires = 'expires=' + date.toUTCString() + '; ';
            path    = 'path=/; ';
            // show Sign Up / login popup
            document.cookie = 'store_game=1;' + expires + path;

            msgbox('Nice shot !', 'To check if you stand a chance to win awesome prizes,<br>create a Cocoro Life account', function(){
                jQuery('#div_Msgbox')[0].style.width = '40%';
                jQuery('#div_Msgbox .button button').text('SIGN UP');
                jQuery('#div_Msgbox .button').unbind('click').click(function(){
                    window.location = '<?php echo base_url();?>auth/sign-up';
                    jQuery('#div_Msgbox')[0].style.width = '';
                });
            });
        <?php }else{ ?>
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
                    window.location = '<?php echo base_url();?>game/leaderboard';
                }
            });
        <?php } ?>
    });

    jQuery('#iframe_Game').attr('src', '<?php echo base_url();?>game/iframe-game');
});
</script>
<script>fbq('track', 'AddToWishlist’);</script>
<section class="sc-1 ">
  <div class="container"> <a href="<?php echo base_url();?>" target="_self"><img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></a>
    <div class="mini-game centered">
      <h1 style="margin-top: 0; margin-bottom: 2em;">Play this easy minigame to win more amazing prizes this Raya with SHARP!</h1>
      <iframe id="iframe_Game" src="" style="border:0;width:100%;margin:1em 0;" allow="fullscreen"></iframe>
      <div class="htp table fullwidth ta-l">
        <div class="minigame-img"> <img class="fullwidth" src="<?php echo base_url();?>media/images/how-to-play.png" alt=""> </div>
        <div>
          <ol style="padding: 0">
            <li>Shoot a ketupat to gain points.</li>
            <li>Points are lost if kuih raya, duit raya and pelita are shot.</li>
            <li>Take too long to shoot the next ketupat and it's game over.</li>
            <li>On mobile devices, rotate your screen for the best experience.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
	#div_Msgbox.pop-up > div.centered {
		width: 100%!important;
	}
	@media (orientation:landscape) {
		#body_Mobile iframe#iframe_Game {
			border: 0px!important;
			width: 100%!important;
			margin: 0 0!important;
			height: 100%!important;
			position: fixed!important;
			z-index: 1000!important;
			top: 0!important;
			left: 0!important;
		}
	}
</style>
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

            msgbox('Nice Shot!', 'Please <a style="color: #fff; text-decoration: underline!important" href="<?php echo base_url(); ?>auth/login">login</a> to save your score. If you do not have an account please <a style="color: #fff; text-decoration: underline!important" href="<?php echo base_url(); ?>auth/sign-up">sign-up</a>.');
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
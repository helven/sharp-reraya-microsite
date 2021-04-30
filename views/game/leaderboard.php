<section class="sc-1 ">
    <a href="<?php echo base_url();?>" target="_self"><img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></a>
    <div class="leaderboard ">
        <h2>Leaderboard</h2>
		<p style="padding: 0 2em 2em; text-align: center; background: #fff; font-size: 1.4em">Top 10 Scores</p>
        <div class="table fullwidth">
            <div style="width: 3.5em; padding: 1em 0; background-color: #cd8522; color: #fff" class="va-m ta-c">RANK</div>
            <div style="width: auto; padding: 1em 0; background-color: #f8d56f; color: #000000; padding-left: 0.70001em;" class="va-m ta-l">NAME</div>
            <div style="width: 4.5em; padding: 1em 0; background-color: #cd8522; color: #fff" class="va-m ta-c">SCORE</div>
        </div>
        <?php $ctr = 0;?>
        <?php if($this->a_leaderboard['status']){ ?>
            <?php foreach($this->a_leaderboard['a_data'] as $a_submission){ ?>
                <?php
                $locale = 'en_US';
                $nf     = new NumberFormatter($locale, NumberFormatter::ORDINAL);
                $number = $nf->format($ctr+1);
                $number = ($ctr <= 2)?'<strong>'.$number.'</strong>':$number;
                ?>
                <div class="table fullwidth ld-margin pos-rel">
                    <div class="va-m ta-c rank">
                        <div>
                            <p><?php echo $number;?></p>
                        </div>
                    </div>
                    <div class="va-m ta-l name <?php echo ($a_submission['player_id'] == $_SESSION['ss_Public']['id'])?'active':'';?>"><?php echo $a_submission['player_name'];?></div>
                    <div class="va-m ta-c score"><?php echo $a_submission['score'];?></div>
                </div>
                <?php $ctr++;?>
            <?php } ?>
        <?php } ?>

        <div style="background-color: #fff;" class="table fullwidth ld-margin pos-rel">
            <div class="va-m ta-r" style="padding-right: 0.5em; padding-left: 1em;">Share your achievements now! </div>
            <div id="btn_ShareFacebbok" class="va-m ta-r st-custom-button" style="padding: 0.5em 0 0.5em 0.5em; width: 58px" data-network="facebook" data-url="<?php echo base_url();?>"><img src="<?php echo base_url();?>media/images/facebook.png" alt=""></div>
            <div id="btn_ShareTwitter" class="va-m ta-r st-custom-button" style="padding: 0.5em; width: 66px" data-network="twitter" data-url="<?php echo base_url();?>"><img src="<?php echo base_url();?>media/images/twitter.png" alt=""></div>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function(){
    init_sharethis();
});
</script>
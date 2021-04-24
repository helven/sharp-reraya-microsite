<section class="sc-1 ">
    <div class="masthead centered"><img style="padding-top: 2em" class="fullwidth centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></div>

    <div class="leaderboard ">
        <div style="background: #fff; padding-top: 5em; padding-bottom: 1em; margin-top: -5em">
            <h2>Leaderboard</h2>
        </div>

        <div class="table fullwidth">
            <div style="width: 15%; padding: 1em 0; background-color: #cd8522; color: #fff" class="va-m ta-c">RANK</div>
            <div style="width: 70%; padding: 1em 0; background-color: #f8d56f; color: #000000" class="va-m ta-c">NAME</div>
            <div style="width: 15%; padding: 1em 0; background-color: #cd8522; color: #fff" class="va-m ta-c">SCORE</div>
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
                    <div class="va-m ta-c name <?php echo ($a_submission['player_id'] == $_SESSION['ss_Public']['id'])?'active':'';?>"><?php echo $a_submission['player_name'];?></div>
                    <div class="va-m ta-c score"><?php echo $a_submission['score'];?></div>
                </div>
                <?php $ctr++;?>
            <?php } ?>
        <?php } ?>

        <div style="background-color: #fff; padding: 0.5em" class="table fullwidth ld-margin pos-rel">
            <div class="va-m ta-r" style="width: 86%; padding-right: 3em">Share your achievements now! </div>
            <div class="va-m ta-r" style=""><img src="<?php echo base_url();?>media/images/facebook.png" alt=""></div>
            <div class="va-m ta-r" style=""><img src="<?php echo base_url();?>media/images/twitter.png" alt=""></div>
        </div>
    </div>
</section>
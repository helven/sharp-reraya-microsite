<h1>Leaderboard</h1>
<?php $ctr = 0;?>
<?php if($this->a_leaderboard['status']){ ?>
    <?php foreach($this->a_leaderboard['a_data'] as $a_submission){ ?>
        <?php $a_color = array('bg-danger', 'bg-warning', 'bg-info');?>
        <div class="progress-group">
            <div class="progress-group-header align-items-end">
                <?php
                $locale = 'en_US';
                $nf     = new NumberFormatter($locale, NumberFormatter::ORDINAL);
                $number = $nf->format($ctr+1);
                $number = ($ctr <= 2)?'<strong>'.$number.'</strong>':$number;
                ?>
                <div>
                    <?php echo $number;?> <?php echo $a_submission['player_name'];?>
                    <?php echo $a_submission['score'];?>
                    (<?php echo format_date($a_submission['created_at']);?>)
                </div>
            </div>
        </div>
        <?php $ctr++;?>
    <?php } ?>
<?php } ?>
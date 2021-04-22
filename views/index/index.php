<style>
    h1 {
        font-family: 'gilroybold';
        font-size: 2.9em;
        margin-top: 0.2em;
        margin-bottom: 0;
    }

    h2 {
        font-family: 'gilroybold';
    }

    h3 {
        font-size: 1.5em;
        margin-top: 0;
        font-weight: normal;
    }

    h4 {
        font-family: 'gilroybold';
        font-size: 2em;
        margin-top: 1em;
        margin-bottom: 0;
    }

    ol {
        margin-top: 0;
        margin-bottom: 0;
        padding-left: 1.2em;
    }

    ol>li {
        margin-bottom: 1em;
    }

    .fullwidth {
        width: 100%;
    }

    .va-b {
        vertical-align: bottom;
    }

    .table>div {
        display: table-cell;
    }

    #s1 {
        min-height: 100vh;
        background: url("<?php echo base_url();?>media/images/landing/s1-bg.jpg");
        background-size: cover;
        background-position: center center;
    }

    #s1 * {
        color: #fff;
    }

    #s1 .kv {
        background: url("<?php echo base_url();?>media/images/landing/s1-kv.png") no-repeat center 8em;
    }

    #s1 .bar {
        background: url("<?php echo base_url();?>media/images/landing/s1-bar.png") repeat-x bottom;
        text-align: right;
    }

    #s1 .bar img {
        width: 100%;
    }

    #s1 .bar>.table>div {
        vertical-align: top;
    }

    #s1 .icons>div {
        text-align: center;
        width: 25%;
        padding: 0 1em 1em 1em;
    }

    #s1 .masthead {
        width: 42.95%;
    }

    #s1 h2,
    #s1 p {
        margin-top: 0;
        margin-bottom: 0;
    }

    #s1 .bar img.date {
        width: 30em;
        display: inline-block;
    }

    h2 {
        font-family: 'gilroybold', 'Arial Bold', sans-serif;
    }

    #s3 {
        background: rgb(255, 188, 47);
        background: linear-gradient(180deg, rgba(255, 188, 47, 1) 0%, rgba(255, 166, 38, 1) 100%);
    }

    #s3>div {
        vertical-align: middle;
        padding: 2em;
    }

    #s3>div:first-child {
        text-align: right;
    }

    #s3 img {
        width: 100%;
    }

    #s3 p {
        font-size: 2em;
        max-width: 700px;
    }

    #s3 .ss {
        max-width: 756px;
        display: inline-block
    }

    #s4 {
        background: url("<?php echo base_url();?>media/images/landing/s4-bg.jpg") top right no-repeat #67e2a9;
        background-size: 100%;
        height: 649px;
    }

    #s4>div {
        background: url("<?php echo base_url();?>media/images/landing/s4-bg-left.png") no-repeat left top;
    }

    #s4>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s4-bg-right.png") no-repeat right top;
        display: table;
        width: 100%;
    }

    #s4>div>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s4-bg-tv.png") no-repeat right center;
        background-size: 44%;
        height: 649px;
        display: table-cell;
        vertical-align: middle;
        padding-left: 8%;
    }

    #s4 .fb {
        width: 47%;
    }

    #s5 {
        background: url("<?php echo base_url();?>media/images/landing/s5-bg.jpg") top right no-repeat #67e2a9;
        background-size: 100%;
        min-height: 100vh;
        font-size: 1.3em;
    }

    #s5>div {
        background: url("<?php echo base_url();?>media/images/landing/s5-bg-left.png") no-repeat left top;
    }

    #s5>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s5-bg-right.png") no-repeat right top;
        display: table;
        width: 100%;
        min-height: 100vh;
    }

    #s5>div>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s5-bg-tv.png") no-repeat right center;
        background-size: 62%;
        display: table-cell;
        vertical-align: middle;
        padding-left: 8%;
    }

    #s5 .fb {
        /*width: 39.05%;*/
    }

    #s6 {
        background: url("<?php echo base_url();?>media/images/landing/s6-bg.jpg") top left no-repeat #f1a729;
        height: 540px;
    }

    #s6>div {
        background: url("<?php echo base_url();?>media/images/landing/s6-bg-left.png") no-repeat left top;
    }

    #s6>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s6-bg-right.png") no-repeat right top;
        display: table;
        width: 100%;
        height: 540px;
    }

    #s6>div>div>div {
        background: url("<?php echo base_url();?>media/images/landing/s6-bg-tv.png") no-repeat 20% bottom;
        display: table-cell;
        vertical-align: middle;
        padding-left: 52%;
    }

    #s6 .fb {
        width: 65%;
    }

    #s7 {
        background: #ffbd4c;
        font-size: 1.3em;
        padding: 2em;
    }

    #s7 p {
        margin-top: 0;
        text-align: center;
    }

    #s7 .states {
        text-align: center;
        max-width: 50em;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1em;
    }

    #s7 .states>div {
        display: inline-block;
        width: 10em;
        padding: 0.5em;
    }

    #s7 p strong {
        font-family: 'gilroybold';
        font-size: 1.3em;
        color: #ff0000;
    }

    .cta {
        background: #background: rgb(253, 0, 7);
        background: linear-gradient(230deg, rgba(253, 0, 7, 1) 10%, rgba(227, 0, 120, 1) 100%);
        ;
        color: #fff;
        font-family: 'gilroybold';
        font-size: 1.4em;
        text-decoration: none;
        padding: 0.5em 2em;
        border-radius: 2em;
        border: 1px solid #d2000c;
        box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);
        -webkit-box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);
        -moz-box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);
        margin-top: 3em;
        display: inline-block;
    }

    .fa-bars:before {
        content: "\f0c9";
    }


    @media (max-width: 1610px) {
        #s5>div>div>div {
            background-size: 50%;
        }

        #s3 p {
            font-size: 1.7em;
        }
    }

    @media (max-width: 1200px) {
        #s5>div>div>div {
            background: url(<?php echo base_url();?>media/images/landing/s5-bg-tv.png) no-repeat 110% 0em;
            background-size: 26em;
        }

        #s5 .fb {
            max-width: 28em;
        }

        #s3 p {
            font-size: 1.4em;
        }
    }

    @media (max-width: 1024px) {
        #s3 * {
            text-align: center;
        }

        #s3>div {
            display: block;
            width: 100%;
        }

        #s3>div:last-child {
            padding-top: 0;
            padding-bottom: 5em;
        }

        #s3 .ss {
            display: none;
        }

        #s3 p {
            font-size: 2em;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0;
        }

        .cta {
            margin-top: 1em;
        }

        #s5>div>div>div {
            background: url(<?php echo base_url();?>media/images/landing/s5-bg-tv.png) no-repeat center 8em;
            background-size: 26em;
            padding-right: 8%;
            padding-top: 4em;
        }

        #s5>div>div>div>div {
            padding-top: 17em;
            padding-left: 0% !important;
        }

        #s5>div>div>div>div>div {
            margin-left: auto;
            margin-right: auto;
        }

        #s5 .fb {
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        #s5 {
            padding-bottom: 2em;
        }

        #s4>div>div {
            background-size: 20%;
        }

        #s5>div>div {
            background-size: 30%;
        }

        #s5>div {
            background-size: 25%;
        }

        #s1 .bar>.table>div {
            display: block;
            width: 100%;
        }

        #s1 .bar .masthead img {
            max-width: 40em;
            margin-left: auto;
            margin-right: auto;
        }

        #s1 .kv {
            padding-top: 27em;
            background-size: 60em;
        }

        #s1 .bar {
            background: url(images/landing/s1-bar.png) repeat-x 50em 19em;
        }

        #s1 .bar>.table>div:last-child {
            background: #51b6a0;
            padding-bottom: 3em;
        }

        #s1 .bar img.date {
            width: 100%;
            max-width: 20em;
        }

        #s4>div>div>div {
            background: url(images/landing/s4-bg-tv.png) no-repeat center 4em;
            background-size: 40em;
            padding-top: 32em;
            padding-right: 8%;
            text-align: center;
        }

        #s4 .fb {
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            max-width: 30em;
        }

        #s4 {
            height: initial;
            padding-bottom: 4em;
        }

        #s6>div>div>div {
            background: url(images/landing/s6-bg-tv.png) no-repeat -5em bottom;
            background-size: 40em;
        }

        #s6 .fb {
            width: 90%;
        }

        #s6>div>div {
            background-position-x: 130%;
        }

        #s6>div {
            background: url(images/landing/s6-bg-left.png) no-repeat -20% top;
        }

        #s4>div {
            background: url(images/landing/s4-bg-left.png) no-repeat -12em top;
        }
    }

    @media (max-width:790px) {
        #s1 .bar {
            background: url(images/landing/s1-bar.png) repeat-x 100em 17em;
        }

        #s1 .kv {
            padding-top: 22em;
            background-size: 45em;
        }

        #s6>div>div>div {
            vertical-align: top;
            padding-left: 0;
            text-align: center;
            padding-top: 3em;
            background: url(images/landing/s6-bg-tv.png) no-repeat center bottom;
            background-size: 40em;
        }

        #s6 .fb {
            width: 100%;
            max-width: 30em;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1em;
            padding-right: 1em;
        }

        #s6>div>div {
            height: 50em;
        }

        #s6 {
            height: 50em;
        }

        #s6>div>div {
            background: none;
        }

        #s1 .icons {
            display: block;
            text-align: center;
        }

        #s1 .icons>div {
            display: inline-block;
            width: 45%;
            height: 20em;
        }
    }

    @media (max-width:640px) {
        #s1 .bar {
            background: url(images/landing/s1-bar.png) repeat-x 100em 12em;
        }

        #s1 .icons>div {
            display: block;
            width: 100%;
            height: initial;
            margin-bottom: 1em;
        }

        #s1 .bar .icons img {
            max-width: 18em;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            font-size: 2em;
        }

        h3 {
            font-size: 1.2em;
        }

        h4 {
            font-size: 1.2em;
        }

        .cta {
            font-size: 1.1em;
        }

        #s5>div>div>div {
            background-size: 95%;
        }

        #s4>div>div>div {
            background: url(images/landing/s4-bg-tv.png) no-repeat center 4em;
            background-size: 30em;
            padding-top: 20em;
        }

        #s1 .kv {
            padding-top: 20em;
            background-size: 32em;
        }

        #s1 .bar img.date {
            max-width: 12em;
        }
    }

    @media (max-width: 480px) {
        #s5>div>div>div {
            background-size: 20em;
        }

        #s5>div>div>div>div {
            padding-top: 15em;
        }

        #s1 .bar {
            background: url(images/landing/s1-bar.png) repeat-x 100em 8em;
        }
    }

</style>
<main>
    <section id="s1" class="table fullwidth">
        <div class="kv va-b">
            <div class="bar"> <img class="date" src="<?php echo base_url();?>media/images/landing/s1-date.png" alt="" />
                <div class="table fullwidth">
                    <div class="masthead"><img src="<?php echo base_url();?>media/images/landing/s1-masthead.png" alt="" /></div>
                    <div>
                        <div class="icons table fullwidth">
                            <div><img src="<?php echo base_url();?>media/images/landing/s1-icon-1.png" alt="" />
                                <h2>FREE GIFTS</h2>
                                <p>Win free merchandise with every purchase!</p>
                            </div>
                            <div><img src="<?php echo base_url();?>media/images/landing/s1-icon-2.png" alt="" />
                                <h2>LUCKY DRAW</h2>
                                <p>Join our lucky draw for more wins!</p>
                                <small>(with minimum purchase of RM350)</small>
                            </div>
                            <div><img src="<?php echo base_url();?>media/images/landing/s1-icon-3.png" alt="" />
                                <h2>PLAY &amp; WIN</h2>
                                <p>Play our minigame and score Cocoro premiums!</p>
                            </div>
                            <div><img src="<?php echo base_url();?>media/images/landing/s1-icon-4.png" alt="" />
                                <h2>MORE REWARDS</h2>
                                <p>Win prizes from weekly Facebook contests!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="s3" class="table fullwidth">
        <div><img style="max-width: 994px; display: inline-block" src="<?php echo base_url();?>media/images/landing/s3-screenshot.jpg" alt="" /></div>
        <div><img class="ss" src="<?php echo base_url();?>media/images/landing/s3-logo.png" alt="" />
            <p>Play this easy minigame to win more amazing
                prizes this Raya with SHARP!</p>
            <div><a class="cta" href="<?php echo base_url();?>game">READY, AIM, PLAY!</a></div>
        </div>
    </section>
    <section id="s4">
        <div>
            <div>
                <div><img class="fb" src="<?php echo base_url();?>media/images/landing/s4-header.png" alt="" />
                    <div style="padding-left: 1.2%"><a class="cta" href="#" target="_blank">CHECK IT OUT!</a></div>
                </div>
            </div>
        </div>
    </section>
    <section id="s5">
        <div>
            <div>
                <div><img class="fb" src="<?php echo base_url();?>media/images/landing/s5-header.png" alt="" />
                    <div style="padding-left: 1%;">
                        <div style="max-width:29em;">
                            <h1>Ready to celebrate?</h1>
                            <h3>Win back those festive Raya vibes with our Lucky Draw!!</h3>
                            <h4>How to win:</h4>
                            <ol>
                                <li>Purchase a minimum of RM350 worth of SHARP product(s) at the official online store or any SHARP authorised dealer.</li>
                                <li>Submit your proof of purchase on the SHARP website.</li>
                                <li>Stand a chance to be one of 20 lucky winners every 2 weeks</li>
                            </ol>
                            <div><a class="cta" href="<?php echo base_url();?>lucky-draw">REDEEM NOW</a></div>
                            <p><small>*Terms and conditions apply. For gift with purchase only.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="s6">
        <div>
            <div>
                <div><img class="fb" src="<?php echo base_url();?>media/images/landing/s6-header.png" alt="" />
                    <div style="padding-left: 1.3%"><a class="cta" href="#" target="_blank">CLICK HERE</a></div>
                </div>
            </div>
        </div>
    </section>
    <section id="s7">
        <p style="margin-bottom: 0.6em">SHOP NOW AT OUR SHARP'S</p>
        <p><strong>AUTHORISED DEALERS</strong></p>
        <div class="states">
            <div>Perlis</div>
            <div>Selangor</div>
            <div>Negeri Sembilan</div>
            <div>Sabah</div>
            <div>Kedah</div>
            <div>Kuala Lumpur</div>
            <div>Pahang</div>
            <div>Sarawak</div>
            <div>Penang</div>
            <div>Melaka</div>
            <div>Kelantan</div>
            <div>Perak</div>
            <div>Johor</div>
            <div>Terengganu</div>
        </div>
        <p style="color: #ff0000">OR VISIT OUR ONLINE OFFICIAL STORES</p>
        <img style="margin-left: auto; margin-right: auto; width: 100%; max-width: 55em" src="<?php echo base_url();?>media/images/landing/s7-logos.png" alt="" />
    </section>
</main>
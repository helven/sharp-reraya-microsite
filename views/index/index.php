<style>
    .shop-icons {
        text-align: center;
    }

    .shop-icons>a {
        display: inline-block;
        margin: 1em;
    }

    .shop-icons>a img {
        width: 6em;
    }

    .owl-carousel .owl-item img {
        max-width: 432px;
        margin-left: auto;
        margin-right: auto;
    }

    .owl-carousel .item {
        text-align: center;
    }

    .owl-carousel .item h2 {
        margin-top: 0;
        margin-bottom: 0;
    }

    .owl-carousel .owl-prev {
        position: absolute;
        left: 0;
        top: 25%;
    }

    .owl-carousel .owl-next {
        position: absolute;
        right: 0;
        top: 25%;
    }

    .owl-carousel .owl-prev>span,
    .owl-carousel .owl-next>span {
        font-size: 7em;
    }

    .owl-carousel button {
        box-shadow: none !important;
        -webkit-box-shadow: none !important;
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #000;
    }

    .owl-theme .owl-dots .owl-dot span {
        background: #fff;
    }

    .owl-carousel .item .free {
        display: table;
        margin: 0 auto;
    }

    .owl-carousel .item .free>div {
        display: table-cell;
        vertical-align: middle;
        text-align: left;
    }

    .owl-carousel .item .free>div:last-child {
        padding-left: 1em;
    }

    .owl-carousel .item .free>div img {
        display: inline-block;
        width: initial;
    }

    .owl-carousel .item .free strong {
        font-family: 'gilroybold';
        font-size: 1.1em;
    }

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

    #s2 {
        background: url("<?php echo base_url();?>media/images/landing/s2-bg.jpg");
        background-size: cover;
        background-position: center center;
        padding-top: 6em;
        padding-bottom: 6em;
    }

    #s2 .fb {
        margin-left: 8%;
        width: 39.56%;
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
        display: inline-block;
        width: 98%;
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
        width: 43%;
    }

    #s5 {
        background: url("<?php echo base_url();?>media/images/landing/s5-bg.jpg") top right no-repeat #67e2a9;
        background-size: 100%;
        min-height: 100vh;
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
        width: 43%;
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
        width: 82.5%;
    }

    #s7 {
        background: #ffbd4c;
        padding: 2em 2em 6em;
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

    #s7 .states>div a:hover {
        color: #ff0000;
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
        /*box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);
    -webkit-box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);
    -moz-box-shadow: -10px 15px 20px 0px rgba(210, 0, 13, 0.24);*/
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

    @media (max-width: 1366px) {
        h2 {
            font-size: 1.2em;
        }
    }

    @media (max-width: 1200px) {
        #s5>div>div>div {
            background: url(<?php echo base_url();
            ?>media/images/landing/s5-bg-tv.png) no-repeat 110% 0em;
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
        #s2 .fb {
            margin-left: auto;
            margin-right: auto;
            width: 55%;
            min-width: 290px;
        }

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
            background: url(<?php echo base_url();
            ?>media/images/landing/s5-bg-tv.png) no-repeat center 8em;
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

        #s1 .bar {
            background: url(<?php echo base_url();
            ?>media/images/landing/s1-bar.png) repeat-x 50em 19em;
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
            background: url(<?php echo base_url();
            ?>media/images/landing/s4-bg-tv.png) no-repeat center 4em;
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
            background: url(<?php echo base_url();
            ?>media/images/landing/s6-bg-tv.png) no-repeat -5em bottom;
            background-size: 40em;
        }

        #s6 .fb {
            width: 90%;
        }

        #s6>div>div {
            background-position-x: 130%;
        }

        #s6>div {
            background: url(<?php echo base_url();
            ?>media/images/landing/s6-bg-left.png) no-repeat -20% top;
        }

        #s4>div {
            background: url(<?php echo base_url();
            ?>media/images/landing/s4-bg-left.png) no-repeat -12em top;
        }
    }

    @media (max-width:790px) {
        #s1 .bar {
            background: url(<?php echo base_url();
            ?>media/images/landing/s1-bar.png) repeat-x 100em 17em;
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
            background: url(<?php echo base_url();
            ?>media/images/landing/s6-bg-tv.png) no-repeat center bottom;
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
            background: url(<?php echo base_url();
            ?>media/images/landing/s1-bar.png) repeat-x 100em 12em;
        }

        #s1 .icons>div {
            display: block;
            width: 100%;
            height: initial;
            margin-bottom: 0.5em;
        }

        #s1 .bar .icons img {
            max-width: 11em;
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
            background: url(<?php echo base_url();
            ?>media/images/landing/s4-bg-tv.png) no-repeat center 4em;
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

    @media (max-width: 510px) {
        #s7 {
            padding: 2em 1em 6em;
        }

        #s7 .states>div {
            padding: 0.2em;
            width: 7.3em;
        }

        #s7 .states>div a {
            font-size: 0.9em;
        }
    }

    @media (max-width: 490px) {
        #s5>div>div>div {
            background-size: 20em;
        }

        #s5>div>div>div>div {
            padding-top: 15em;
        }

        #s1 .bar {
            background: url(<?php echo base_url();
            ?>media/images/landing/s1-bar.png) repeat-x 100em 8em;
        }

        #s4>div>div>div {
            background-size: 24em;
            height: 477px;
            background-position-x: 60%;
            background-position-y: 2em;
            padding-top: 18em;
        }

        #s5 h1 {
            font-size: 1.4em;
        }

        #s5 h3 {
            font-size: 0.9em;
        }

        #s5 h4 {
            font-size: 1em;
        }

        #s5 ol>li {
            font-size: initial;
        }

        #s5 small {
            font-size: initial;
        }
    }

    @media (max-width:390px) {
        #s4>div>div>div {
            background-size: 20em;
            height: 400px;
            padding-top: 16em;
        }
    }

    @media (max-width:352px) {
        #s7 .states>div a {
            font-size: 0.71em;
        }

        #s7 .states>div {
            width: 6em;
        }
    }

    @media (max-height: 1024px) {
        #body_Desktop #s1 .kv {
            padding-top: 27em;
            background-size: 68em;
        }
    }

    @media (max-height: 1023px) and (orientation: landscape) {
        #body_Mobile #s1 .kv {
            padding-top: 27em;
            background-size: 57em;
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
                            <div><a href="#s2"><img src="<?php echo base_url();?>media/images/landing/s1-icon-1.png" alt="" /></a>
                                <h2>FREE GIFTS</h2>
                                <p>Win free merchandise with every purchase!</p>
                            </div>
                            <div><a href="#s5"><img src="<?php echo base_url();?>media/images/landing/s1-icon-2.png" alt="" /></a>
                                <h2>LUCKY DRAW</h2>
                                <p>Join our lucky draw for more wins!</p>
                                <small>(with minimum purchase of RM350)</small>
                            </div>
                            <div> <a href="#s3"><img src="<?php echo base_url();?>media/images/landing/s1-icon-3.png" alt="" /></a>
                                <h2>PLAY &amp; WIN</h2>
                                <p>Play our minigame and score Cocoro premiums!</p>
                            </div>
                            <div><a href="#s4"><img src="<?php echo base_url();?>media/images/landing/s1-icon-4.png" alt="" /></a>
                                <h2>MORE REWARDS</h2>
                                <p>Win prizes from weekly Facebook contests!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="s2">
        <img class="fb" src="<?php echo base_url();?>media/images/landing/s2-header.png" alt="" />
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-01.png" alt="" />
                <h2>4TC70BK1X</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-1.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Wireless Earbuds<br>
                        worth RM299</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-02.png" alt="" />
                <h2>FPJ80LH</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-2.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        1.0HP Air Conditioner<br>
                        worth RM1,420</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-03.png" alt="" />
                <h2>4TC70CK3X</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-1.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Wireless Earbuds<br>
                        worth RM299</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-04.png" alt="" />
                <h2>AHXP18YHD</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-3.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Ceramic Bowl Set<br>
                        worth RM119</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-05.png" alt="" />
                <h2>AX1700VMR</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-3.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Ceramic Bowl Set<br>
                        worth RM119</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-06.png" alt="" />
                <h2>ESY1619</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-4.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Laundry Bag</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-07.png" alt="" />
                <h2>SJP88MFGK/GM</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-3.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Ceramic Bowl Set<br>
                        worth RM119</div>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url();?>media/images/landing/s2-08.png" alt="" />
                <h2>SJF879GK</h2>
                <div class="free">
                    <div><img src="<?php echo base_url();?>media/images/landing/s2-g-5.png" alt="" /></div>
                    <div><strong>FREE</strong><br>
                        Microwave Oven<br>
                        worth RM419</div>
                </div>
            </div>
    </section>
    <section id="s3" class="table fullwidth">
        <div><img style="max-width: 994px; display: inline-block" src="<?php echo base_url();?>media/images/landing/s3-screenshot.jpg" alt="" /></div>
        <div><img class="ss" src="<?php echo base_url();?>media/images/landing/s3-logo.png" alt="" />
            <p>Play this easy minigame to win more amazing
                prizes this Raya with SHARP!</p>
            <div><a class="cta" href="game" target="_self">READY, AIM, PLAY!</a></div>
        </div>
    </section>
    <section id="s4">
        <div>
            <div>
                <div><img class="fb" src="<?php echo base_url();?>media/images/landing/s4-header.png" alt="" />
                    <div style="padding-left: 1.2%"><a class="cta" href="https://www.facebook.com/SharpMsia" target="_blank">CHECK IT OUT!</a></div>
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
                            <h4>Ready to celebrate?</h4>
                            <p>Win back those festive Raya vibes with our Lucky Draw!</p>
                            <h4>How to win:</h4>
                            <ol>
                                <li>Purchase a minimum of RM350 worth of SHARP product(s) at the official online store or any SHARP authorised dealer.</li>
                                <li>Submit your proof of purchase.</li>
                                <li>Stand a chance to be one of 20 lucky winners every 2 weeks</li>
                            </ol>
                            <div><a style="margin-top: 1.5em; margin-bottom: 1em;" class="cta" href="lucky-draw" target="_self">JOIN NOW</a></div>
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
                    <div style="padding-left: 1.3%"><a class="cta" href="<?php echo base_url();?>/media/pdfs/SHARP-Raya-2021-Promo-E-Brochure.pdf" target="_blank">CLICK HERE</a></div>
                </div>
            </div>
        </div>
    </section>
    <section id="s7"> <a id="shop" /></a>
        <p style="margin-bottom: 0.6em"><strong>SHOP NOW AT OUR SHARP AUTHORISED DEALERS</strong></p>
        <div class="states">
            <div><a href="https://esharp.com.my/dealer/contact/list/11" target="_blank">Perlis</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/15" target="_blank">Selangor</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/7" target="_blank">Negeri Sembilan</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/13" target="_blank">Sabah</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/2" target="_blank">Kedah</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/4" target="_blank">Kuala Lumpur</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/8" target="_blank">Pahang</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/14" target="_blank">Sarawak</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/9" target="_blank">Penang</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/6" target="_blank">Melaka</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/3" target="_blank">Kelantan</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/10" target="_blank">Perak</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/1" target="_blank">Johor</a></div>
            <div><a href="https://esharp.com.my/dealer/contact/list/16" target="_blank">Terengganu</a></div>
        </div>
        <p style="color: #ff0000">OR VISIT OUR ONLINE OFFICIAL STORES</p>
        <div class="shop-icons"> <a href="https://esharp.com.my" target="_blank"><img class="fb" src="<?php echo base_url();?>media/images/landing/s7-logo-1.png" alt="" /></a><a href="https://www.prestomall.com/store/sharpmalaysia" target="_blank"><img class="fb" src="<?php echo base_url();?>media/images/landing/s7-logo-2.png" alt="" /></a><a href="https://www.lazada.com.my/shop/sharp-electronics-officialstore" target="_blank"><img class="fb" src="<?php echo base_url();?>media/images/landing/s7-logo-3.png" alt="" /></a><a href="https://shopee.com.my/sharp.os" target="_blank"><img class="fb" src="<?php echo base_url();?>media/images/landing/s7-logo-4.png" alt="" /></a> </div>
    </section>
</main>
<script>
    jQuery(document).ready(function() {
        jQuery('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1240: {
                    items: 4
                },
                1520: {
                    items: 5
                }
            }
        });
        jQuery('.owl-item').click(function() {
            window.open('<?php echo base_url();?>/media/pdfs/SHARP-Raya-2021-Promo-E-Brochure.pdf', '_blank');
        });
    });

</script>

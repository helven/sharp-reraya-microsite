<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta http-equiv="keywords" content=""/>
        <meta http-equiv="description" content=""/>
        
        <meta property="fb:admins" content="0"/>
        <meta property="og:title" content="<?php echo $this->config['og_title'];?>" />
        <meta property="og:description" content="<?php echo $this->config['og_desc'];?>" />
        <meta property="og:url" content="<?php echo base_url();?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?php echo base_url();?>media/images/og_image.jpg" />
        <meta property="og:site_name" content="">

        <meta name="twitter:description" content="<?php echo $this->config['og_desc'];?>"/>
        <meta name="twitter:title" content="<?php echo $this->config['og_title'];?>"/>
        <meta name="twitter:image" content="<?php echo base_url();?>media/images/og_image.jpg"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title><?php echo $this->config['title'];?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        
        <link rel="stylesheet" href="<?php echo base_url();?>media/css/default.css">
        <link rel="stylesheet" href="<?php echo base_url();?>media/css/shared.css">
        <link rel="stylesheet" href="<?php echo base_url();?>media/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>media/css/fonts.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
		
        <script><!--
            jQuery = jQuery.noConflict();
            global = {
                fontSize        : 12,
                animFast        : 0.15,
                animNorm        : 0.2,
                animSlow        : 0.4,
                anim500         : 0.5,
                //headerSize    : jQuery('#div_Header').height(),
                loader          : '<img src="<?php echo base_url();?>media/images/loader/loader-24.gif" alt="loading..." style="vertical-align: middle;" />',
                baseUrl         : '<?php echo base_url();?>',
                platformUrl     : '',
                mediaUrl        : '<?php echo base_url();?>media/',
                language        : {
                    reload_page : 'Reload Page',
                }
            };

            function init_sharethis()
            {
                jQuery('#script_ShareThis').remove();
                st  = document.createElement('script');
                st.src  = 'https://platform-api.sharethis.com/js/sharethis.js#property=6079d7e7c70c71001196ace4&product=custom-share-buttons';
                st.id   = 'script_ShareThis';
                st.async= 'async';
                document.head.appendChild(st);
            }
        //-->
        </script>
    </head>
    <body id="body_<?php echo ucfirst($this->platform);?>" class="page_fadein page_fadeout">
        <header class="main-header">
            <div>
                <a href="/" class="main-header-brand" target="_blank">
                    <img src="<?php echo base_url();?>media/images/sharp-logo.png" alt="">
                </a>
            </div>
			<?php if (ucfirst($this->platform) == 'Desktop'): ?>
            <nav class="main-nav">
                <ul class="main-nav-items">
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>game">Mini-Game</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>lucky-draw">Lucky Draw</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="">Promo</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>#shop">Shop Now</a>
                    </li>
                    <div class="divider-item"></div>
                    <?php if(!check_auth()){ ?>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/sign-up">Sign-Up</a>
                        </li>
                        <div class="divider-item"></div>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/login">Login</a>
                        </li>
                    <?php }else{ ?>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/logout">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
			<?php endif; ?>
            <div>
                <a href="/" class="main-header-brand" target="_blank">
                    <img src="<?php echo base_url();?>media/images/cocoro-logo.png" alt="">
                </a>
            </div>
        </header>
		<?php if (ucfirst($this->platform) == 'Mobile'): ?>
        <div id="burger-menu">
            <i style="font-size: 2em" class="fa fa-bars"></i>
        </div>
		<div class="mobile-menu">
			<nav class="main-nav">
                <ul class="main-nav-items">
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>game">Mini-Game</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="<?php echo base_url();?>lucky-draw">Lucky Draw</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="">Promo</a>
                    </li>
                    <div class="divider-item"></div>
                    <li class="main-nav-item">
                        <a href="">Shop Now</a>
                    </li>
                    <div class="divider-item"></div>
                    <?php if(!check_auth()){ ?>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/sign-up">Sign-Up</a>
                        </li>
                        <div class="divider-item"></div>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/login">Login</a>
                        </li>
                    <?php }else{ ?>
                        <li class="main-nav-item">
                            <a href="<?php echo base_url();?>auth/logout">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
		</div>
		<?php endif; ?>
		
		<style>
			.mobile-menu {
				position: fixed;
				width: 100%;
				height: 100vh;
				background: rgba(255,255,255,0.9);
				z-index: 49;
				opacity: 0;
				pointer-events: none;
				transition: all 0.5s ease;
			}
			.mobile-menu.active {
				opacity: 1;
				pointer-events: all;
			}
			.mobile-menu .main-nav, .mobile-menu .main-nav-item {
				display: block;
				text-align: center;
			}
			.mobile-menu .main-nav {
				margin-top: 5em;
			}
		</style>
		
        <div id="div_MsgboxOverlay" class="overlay"></div>
        <div id="div_Msgbox" class="pop-up ta-c va-m">
            <p class="title"></p>
            <p class="message"></p>
            <div class="centered" style="width: 50%">
                <a href="javascript:void(0);" class="button"><button >CLOSE</button></a>
            </div>
        </div>

        <?php echo $this->pageContent;?>

        <footer class="main-footer">
            <nav>
                <ul class="main-footer-links">
                    <li class="main-footer-link">
                        <a href="#">Privacy Policies</a>
                    </li>
                    <div class="divider-footer"></div>
                    <li class="main-footer-link">
                        <a href="#">Terms And Conditions</a>
                    </li>
                    <div class="divider-footer r"></div>
                    <li class="main-footer-link">
                        <a href="#">Copyright © 2021 SHARP All Rights Reserved</a>
                    </li>
                </ul>
            </nav>
        </footer>
        <script><!--
        jQuery(document).ready(function(){
            jQuery('#burger-menu').on('click', function() {
                jQuery('.mobile-menu').addClass('active');
            });
			jQuery('.mobile-menu').on('click', function() {
				jQuery(this).removeClass('active');
			});
            jQuery('.main-header').on('click', function() {
                jQuery(this).removeClass('active');
                jQuery('.overlay').removeClass('active');
            });
            jQuery('.overlay').on('click', function() {
                jQuery(this).removeClass('active');
                jQuery('.main-header').removeClass('active');
            });
        });
        jQuery(window).on('load', function(){
            jQuery('body').removeClass('page_fadeout');
        });
        jQuery(window).on('unload', function(){
            jQuery('body').addClass('page_fadeout');
        });

        function msgbox(title='', message='', callback)
        {
            jQuery('#div_Msgbox .title').html(title);
            jQuery('#div_Msgbox .message').html(message);

            jQuery('#div_Msgbox').show();
            jQuery('#div_MsgboxOverlay').show();
            jQuery('#div_MsgboxOverlay').css('opacity', 0.5);

            if(typeof callback != 'undefined'){
                if(typeof callback == 'function'){
                    callback();
                }
            }
        }
        msgbox_callback = function(){
            jQuery('#div_Msgbox .button button').text('CLOSE');
            jQuery('#div_Msgbox .button').unbind('click').click(function(){
                jQuery('#div_Msgbox').hide();
                jQuery('#div_MsgboxOverlay').hide();
                jQuery('#div_MsgboxOverlay').css('opacity', 0);
            });
        }

        <?php if(isset($_SESSION['ss_Msgbox']) && $_SESSION['ss_Msgbox'] != ''){ ?>
            msgbox('<?php echo $_SESSION['ss_Msgbox']['title'];?>', '<?php echo addslashes($_SESSION['ss_Msgbox']['message']);?>', msgbox_callback);
            <?php $_SESSION['ss_Msgbox'] = '';unset($_SESSION['ss_Msgbox']);?>
        <?php } ?>

        <?php if($this->formError){ ?>
            msgbox('Opps!', '<?php echo addslashes($this->formErrorMsg);?>', msgbox_callback);
        <?php } ?>
        //-->
        </script>
    </body>
</html>
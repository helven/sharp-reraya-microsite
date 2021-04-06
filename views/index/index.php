<style>
    body.debug {
        background-image: url('<?php echo base_url();?>media/images/<?php echo $this->platform;?>/<?php echo $this->pageName;?>/ref.jpg');
    }
    body.debug .site_container {
        background: none !important;
        background-image: none !important;
    }
    #div_LocationList {
        display: none;
    }
    .input_checkbox .checkbox {
        background: transparent url('<?php echo base_url();?>media/images/checkbox_sprite.png') no-repeat 0 0;
        display: block;
        height: 13.5px;
        position: absolute;
        top: 4px;
        width: 15px;
    }
    .input_checkbox .checkbox.checked {
        background-position: 0 -13.5px;
    }
    .input_checkbox .text {
        cursor: default;
        display:block;
        margin-left: 18px;
    }
</style>
<?php if($this->config['environment'] == 'live'){ ?>

<?php } ?>
<a id="a_Logo" href="<?php echo base_url();?>"><img src="<?php echo media_url();?>images/logo.png" /></a>
<div class="container">
    <div class="row">
        <div class="col-12 p-0">
            <form id="frm_Form" class="form-horizontal" method="post">
                <input type="hidden" id="hdd_Action" name="hdd_Action" value="submit" />
                <input type="hidden" id="hdd_SessionID" name="hdd_SessionID" />
                <input type="hidden" id="hdd_Location" name="hdd_Location" value="<?php echo set_value('hdd_Location');?>" />
                <input type="hidden" id="hdd_AgreeTnC" name="hdd_AgreeTnC" value="0" />
                
                <input type="hidden" id="hdd_UTMSource" name="hdd_UTMSource" value="<?php echo $_GET['utm_source'];?>" />
                <input type="hidden" id="hdd_UTMMedium" name="hdd_UTMMedium" value="<?php echo $_GET['utm_medium'];?>" />
                <input type="hidden" id="hdd_UTMCampaign" name="hdd_UTMCampaign" value="<?php echo $_GET['utm_campaign'];?>" />
                <input type="hidden" id="hdd_UTMContent" name="hdd_UTMContent" value="<?php echo $_GET['utm_content'];?>" />
                
                <div class="input_wrapper">
                    <div id="div_Name" class="input_textbox"><input type="textbox" id="txt_Name" name="txt_Name" placeholder="Your Name" value="<?php echo set_value('txt_Name');?>" /></div>
                    <span id="span_ErrorName" class="speech_bubble error">Please fill in your name.</span>
                </div>
                <div class="input_wrapper">
                    <div id="div_Phone" class="input_textbox"><input type="textbox" id="txt_Phone" name="txt_Phone" placeholder="Phone" value="<?php echo set_value('txt_Name');?>" /></div>
                    <span id="span_ErrorPhone" class="speech_bubble error">Please fill in your phone no.</span>
                </div>
                <div class="input_wrapper">
                    <div id="div_Name" class="input_textbox"><input type="textbox" id="txt_IMEI" name="txt_IMEI" placeholder="IMEI" value="<?php echo set_value('txt_IMEI');?>" /></div>
                    <span id="span_ErrorName" class="speech_bubble error">Please fill in IMEI.</span>
                </div>
                
                <div class="input_wrapper">
                    <div id="div_Location" class="input_dropdown"><span class="text"><?php echo set_value('hdd_Location', 'Location');?></span></div>
                    <div id="div_LocationList">
                        <ul id="ul_LocationList" class="scrollbar-dynamic">
                            <li><span data-key="1">vivo E-Store</span></li>
                            <li><span data-key="2">Kuala Lumpur 吉隆坡</span></li>
                            <li><span data-key="3">Northern Selangor 雪北</span></li>
                            <li><span data-key="4">Southern Selangor 雪南</span></li>
                            <li><span data-key="5">Perak 霹雳</span></li>
                            <li><span data-key="5">Pahang / Malacca 彭亨 / 马六甲</span></li>
                            <li><span data-key="7">Penang 大槟城</span></li>
                            <li><span data-key="8">Kelantan 吉兰丹</span></li>
                            <li><span data-key="9">Johor 柔佛</span></li>
                            <li><span data-key="10">Sabah 沙巴</span></li>
                            <li><span data-key="11">Sarawak 沙捞越</span></li>
                        </ul>
                    </div>
                    <span id="span_ErrorLocation" class="speech_bubble error">Please select your location.</span>
                </div>
                
                <div class="input_wrapper">
                    <div id="div_AgreeTnC" class="input_checkbox">
                        <span class="checkbox"></span>
                        <span class="text">
                            <?php if(strtolower($this->geoCountryCode) == 'sg'){ ?>
                                I agree to the <a id="a_IndexTnC" href="<?php echo base_url();?>tnc/" target="_blank">Terms and Conditions</a> and <a id="a_IndexPrivacy" href="http://www.baskinrobbins.com.sg/content/baskinrobbins/en/privacypolicy.html" target="_blank">Privacy Policy</a>.
                            <?php }else{ ?>
                                I agree to the <a id="a_IndexTnC" href="<?php echo base_url();?>tnc/" target="_blank">Terms and Conditions</a> and <a id="a_IndexPrivacy" href="https://baskinrobbins.com.my/content/baskinrobbins/en/privacypolicy.html" target="_blank">Privacy Policy</a>.
                            <?php } ?>
                        </span>
                    </div>
                    <span id="span_ErrorAgreeTnC" class="speech_bubble error">Please agree to Terms and Conditions &amp; Privacy Policy.</span>
                </div>
                <button id="btn_Redeem" type="button">Redeem Your Prize!</button>
            </form>
        </div>
    </div>
</div>
<?php /*<div id="div_ToggleDebug" style="background:#FF0000;position:fixed;height:100px;width:100px;bottom:0;right:0;z-index:2147483647"></div>*/ ?>
<script>
var idleTime	= 0;
jQuery(document).ready(function(){
    // Increment the idle time counter every minute.
    var idleInterval = setInterval(function(){
        idleTime	= idleTime + 1;
        if (idleTime > 19) { // 20 minutes
            window.location.reload();
        }
    }, 60000); // 1 minute

    // Zero the idle timer on mouse movement.
    jQuery(this).mousemove(function (e) {
        idleTime = 0;
    });
    jQuery(this).keypress(function (e) {
        idleTime = 0;
    });
    
    
    <?php if($this->formError){ ?>
        jQuery(this).zboxOpen({
            text: '<?php echo $this->formErrorMsg;?>'
        });
    <?php } ?>
        
    jQuery('#txt_Name').keyup(function(e){
        if(!is_empty(jQuery('#txt_Name').val()))
        {
            jQuery('#span_ErrorName').hide();
        }
    });

    jQuery('#txt_Phone').keyup(function(e){
        if(!is_empty(jQuery('#txt_Phone').val()))
        {
            jQuery('#span_ErrorPhone').hide();
        }
    });

    jQuery('#txt_IMEI').keyup(function(e){
        if(!is_empty(jQuery('#txt_IMEI').val()))
        {
            jQuery('#span_ErrorIMEI').hide();
        }
    });

    jQuery('#txt_IMEI').keyup(function(e){
        if(!is_empty(jQuery('#txt_IMEI').val()))
        {
            jQuery('#span_ErrorIMEI').hide();
        }
    });

    jQuery('#div_Location').click(function(){
        jQuery(this).toggleClass('expanded');
        jQuery('#div_LocationList').fadeToggle(100);
    });
    jQuery('#ul_LocationList span').click(function(){
        jQuery('#div_LocationList').fadeToggle(100);
        
        jQuery('#hdd_Location').val(jQuery(this).data('key'));
        
        jQuery('#div_Location').text(jQuery(this).text());
        
        if(!is_empty(jQuery('#hdd_Location').val()))
        {
            jQuery('#span_ErrorLocation').hide();
        }
    });
	
    jQuery('.input_checkbox').click(function(e){
        jQuery(this).children('.checkbox').toggleClass('checked');
    });
    jQuery('.input_checkbox a').click(function(e){
        e.stopPropagation();
    })
    jQuery('#div_AgreeTnC').click(function(){
        jQuery('#hdd_AgreeTnC').val((jQuery('#hdd_AgreeTnC').val() == 0)?1:0);
        
        if(!is_empty(jQuery('#hdd_AgreeTnC').val()) && jQuery('#hdd_AgreeTnC').val() != 0)
        {
            jQuery('#span_ErrorAgreeTnC').hide();
        }
    });
    jQuery('#div_SubscribeNewsletter.input_checkbox .checkbox').click(function(){
        jQuery('#hdd_SubscribeNewsletter').val((jQuery('#hdd_SubscribeNewsletter').val() == 0)?1:0);
    });
    
    jQuery('.speech_bubble').click(function(){
        jQuery(this).hide();
    });
    
    /*jQuery('#a_IndexPrivacy').click(function(){
        jQuery(this).zboxOpen({
            text: jQuery('#div_PrivacyPolicyContent').html(),
            callback: zbox_callback
        });
    });
    jQuery('#a_IndexTnC').click(function(){
        jQuery(this).zboxOpen({
            text: jQuery('#div_TnCContent').html(),
            callback: zbox_callback
        });
    });*/
    
    jQuery('#btn_Redeem').click(function(){
        jQuery('#txt_Name').val(jQuery('#txt_Name').val().trim());
        jQuery('#txt_Phone').val(jQuery('#txt_Phone').val().trim());
        jQuery('#txt_IMEI').val(jQuery('#txt_IMEI').val().trim());
        
        formError	= false;
        if(is_empty(jQuery('#txt_Name').val()))
        {
            jQuery('#span_ErrorName').show();
            formError	= true;
        }
        if(is_empty(jQuery('#txt_Phone').val()))
        {
            jQuery('#span_ErrorPhone').show();
            formError	= true;
        }
        if(is_empty(jQuery('#txt_IMEI').val()))
        {
            jQuery('#span_ErrorIMEI').show();
            formError	= true;
        }
        if(is_empty(jQuery('#hdd_Location').val()))
        {
            jQuery('#span_ErrorLocation').show();
            formError	= true;
        }
        if(is_empty(jQuery('#hdd_AgreeTnC').val()) || jQuery('#hdd_AgreeTnC').val() == 0)
        {
            jQuery('#span_ErrorAgreeTnC').show();
            formError	= true;
        }
        
        if(!formError)
        {
            jQuery('#frm_Form').submit();
            jQuery(this).prop('disabled', true);
            setTimeout(function(){
                jQuery('#btn_Redeem').prop('disabled', false);
            }, 3000);
            
            jQuery('#div_PageLoader').show();
        }
    });
});
jQuery(window).on('load', function(){
    jQuery('.site_container').css('background-image','url(\'<?php echo base_url();?>media/images/<?php echo $this->platform;?>/<?php echo $this->pageName;?>/background-full.jpg\')');
    
    /*setTimeout(function(){
        get_session_id();
    }, 3000);*/
});

function get_session_id()
{
    $o_Ajax	= jQuery.ajax({
        async		: true,
        cache		: true,
        data		: '',
        dataType	: 'json',
        type		: 'GET',
        url			: '<?php echo $platformURL;?>index/ajax-get-session-id/',
        beforeSend: function()
        {
            
        },
        error: function()
        {
            
        },
        success: function(o_Rtn)
        {
            if(o_Rtn.status)
            {
                jQuery('#hdd_SessionID').val(o_Rtn.session_id);
                jQuery('#btn_Redeem').prop('disabled', false);
            }
            else
            {
                setTimeout(function(){
                    get_session_id();
                }, 3000);
            }
        }
    });
}
</script>



<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '387339848963126',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v10.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
Score<input type="text" id="title_fb" value="100000" /><br />
<button id="share">SHARE</button>



<script>
jQuery(document).ready(function(){

    jQuery('#share').click(function(){
        /*var title,description,image;
        title=jQuery('#title_fb').val();
        description=jQuery('#description_fb').val();
        alert(title + "\n" + description)
        //image=jQuery('#image_fb').val();
            FB.ui({
            method: 'share_open_graph',
            action_type: 'og.shares',
            action_properties: JSON.stringify({
                object: {
                    'og:image': '<?php echo base_url();?>media/og_image.jpg',
                    'og:image:secure_url': '<?php echo base_url();?>media/og_image.jpg',
                    'og:image:type': 'image/jpeg',
                    'og:image:width': 500,
                    'og:image:height': 400,
                    'og:image:alt': '<?php echo base_url();?>media/og_image.jpg',
                    'og:url': '<?php echo base_url();?>',
                    'og:title': title,
                    'og:description': description/*,
                    'fb:admins': fbadmin*
                }
            })
        },
        function (response) {
        // Action after response
        });*/

		window.open('https://www.facebook.com/sharer.php?t=&u=<?php echo urlencode(base_url());?>&quote=' +  encodeURIComponent('My score is' + jQuery('#title_fb').val()), "Post to Facebook", 'width=500,height=400,top=100,left=100');

    });
})
</script>


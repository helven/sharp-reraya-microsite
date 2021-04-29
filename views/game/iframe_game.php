<style type="text/css">
    * {
        padding: 0;
        margin: 0;
    }
    html, body {
        background: #000;
        color: #fff;
        overflow: hidden;
        touch-action: none;
        -ms-touch-action: none;
    }
    canvas {
        touch-action-delay: none;
        touch-action: none;
        -ms-touch-action: none;
    }
</style>
<script>
// Issue a warning if trying to preview an exported project on disk.
(function(){
    // Check for running exported on file protocol
    if (window.location.protocol.substr(0, 4) === "file")
    {
        //alert("Exported games won't work until you upload them. (When running on the file:/// protocol, browsers block many features from working for security reasons.)");
    }
})();
</script>

<div id="fb-root"></div>
<!-- The canvas must be inside a div called c2canvasdiv -->
<div id="c2canvasdiv">
    <!-- The canvas the project will render to.  If you change its ID, don't forget to change the
    ID the runtime looks for in the jQuery events above (ready() and cr_sizeCanvas()). -->
    <canvas id="c2canvas" width="1920" height="1080">
        <!-- This text is displayed if the visitor's browser does not support HTML5.
        You can change it, but it is a good idea to link to a description of a browser
        and provide some links to download some popular HTML5-compatible browsers. -->
        <h1>Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
        <a href="https://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
        <a href="https://www.google.com/chrome/">Google Chrome</a><br/>
    </canvas>
</div>
<!-- Pages load faster with scripts at the bottom -->
<!-- The runtime script.  You can rename it, but don't forget to rename the reference here as well.
This file will have been minified and obfuscated if you enabled "Minify script" during export. -->
<script src="<?php echo base_url();?>media/js/md5.js"></script>
<script src="<?php echo base_url();?>media/game/c2xabx.js"></script>
<script src="<?php echo base_url();?>media/game/c2runtime.js"></script>

<script>
    // Start the Construct 2 project running on window load.
    jQuery(document).ready(function (){	
        // Create new runtime using the c2canvas
        cr_createRuntime("c2canvas");
    });

    // Size the canvas to fill the browser viewport.
    jQuery(window).resize(function() {
        cr_sizeCanvas(jQuery(window).width(), jQuery(window).height());
    });
    
    // Pause and resume on page becoming visible/invisible
    function onVisibilityChanged() {
        if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden)
            cr_setSuspended(true);
        else
            cr_setSuspended(false);
    };
    
    document.addEventListener("visibilitychange", onVisibilityChanged, false);
    document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
    
    if (navigator.serviceWorker && navigator.serviceWorker.register)
    {
        // Register an empty service worker to trigger web app install banners.
        navigator.serviceWorker.register("<?php echo base_url();?>media/game/sw.js", { scope: "./" });
    }
</script>
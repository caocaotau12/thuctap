<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="fb-comments" data-href="http://<?php echo $_SERVER['SERVER_NAME'];?>/" data-width="100%" data-numposts="10" data-order-by="reverse_time"></div>
        </div>
    </div>
</div>
<script src="lakita/js/save_contact.js" type="text/javascript"></script>
<!-- html5 player (start) -->

<script src="http://lakita.vn/styles/html5/build/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="http://lakita.vn/styles/html5/build/mediaelementplayer.min.css" />
<script>
    //$('#player1').attr('autoplay', 'true');
    $('audio,video').mediaelementplayer({
        //mode: 'shim',
        success: function (player, node) {
            $('#' + node.id + '-mode').html('mode: ' + player.pluginType);
        }
    });

</script>

<!-- html5 player (end) -->
<?php
/*
*Template Name: Stack
*
*/
global $newfashion_config;
// Get Page Config
$newfashion_config = $newfashionEngine->getPageConfig();

?>

<?php get_header( $newfashionEngine->getHeaderLayout() );  ?>

<script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=175518545791503";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

<div id="container"></div>

<script src="/dist/main.e5d537f1db0aa20c1e4a.js"></script>

<?php get_footer(); ?>

<script src="https://platform.twitter.com/widgets.js"></script>

<!-- BEGIN GOOGLE ANALYTICS CODEs -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-54746522-6']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<!-- END GOOGLE ANALYTICS CODE -->
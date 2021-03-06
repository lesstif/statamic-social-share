<?php

namespace Statamic\Addons\SocialLogin;

use Statamic\API\URL;
use Statamic\Extend\Tags;

class SocialLoginTags extends Tags
{
    /**
     * The {{ social_login }} tag
     *
     * @return string|array
     */
    public function index()
    {
        // Parameters
        $sns           = $this->getParam('sns', "facebook|twitter|pinterest|linkedin|google");
        $url            = $this->getParam('url', URL::getSiteUrl() .'/'. URL::getCurrent());
        $showcounter    = $this->getParam('counter','true');

        $items = explode("|", $sns);
        $html = '';

        foreach ($items as $key => $value) {
            if ($value == "facebook") {
                if ($showcounter == 'true') {
                    $layout = 'button_count';
                    $width = '90';
                } else {
                    $layout = 'button';
                    $width = '55';
                }
                $html .= '<iframe src="//www.facebook.com/plugins/like.php?href='.$url.'&amp;width=&amp;layout='. $layout .'&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:'.$width.'px" allowTransparency="true"></iframe>';
            } elseif ($value == "twitter") {
                if ($showcounter == 'true') {
                    $layout = "";
                } else {
                    $layout = "none";
                }
                $html .= "<a href='https://twitter.com/share' class='twitter-share-button' data-url='".$url."' data-count='".$layout."'>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
            } elseif ($value == "linkedin") {
                if ($showcounter == 'true') {
                    $layout = "data-counter='right'";
                } else {
                    $layout = "";
                }
                $html .= '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="'.$url.'"'. $layout .'></script>';
            } elseif ($value == "pinterest") {
                $html .= '<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>';
            } elseif ($value == "google") {
                if ($showcounter == 'true') {
                    $layout = '';
                } else {
                    $layout = 'data-annotation="none"';
                }
                $html .= '<script src="https://apis.google.com/js/platform.js" async defer></script><div class="g-plusone" data-size="medium" '.$layout.' data-href="'.$url.'"></div>';
            }
        }
        return $html;
    }

    /**
     * The {{ social_login:example }} tag
     *
     * @return string|array
     */
    public function example()
    {
        //
    }
}

<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle frontpage.
 *
 * @package    core
 * @copyright  2023 Sudhanshu Gupta(sudhanshug5@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('config.php');
global $PAGE,$CFG,$DB;
$courseid = optional_param('course',1,PARAM_INT);
$context = context_course::instance($courseid);
if(is_siteadmin()){
    $token = "068b927b0359808435d8bc8d444f018f";
}elseif(has_capability ('moodle/course:update', $context)){
    $token = "ca759a33a37946b501a994dca11268aa";
}else{
    $token = "916e652c9154b83381e7a88fe032008f";
}
?>

<iframe id="iframe-03" frameborder="0" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-presentation allow-top-navigation" src="javascript: window.frameElement.getAttribute(&quot;srcdoc&quot;);" srcdoc="<script>window.onmessage = function(event) {event.source.postMessage({iframeId: event.data, scrollHeight: document.body.getBoundingClientRect().height || document.body.scrollHeight}, event.origin);};</script><body style='margin: 0'><div id=&quot;embedWidget&quot;></div>



<script type='text/javascript'>

         var _options = {

                 '_license_key':'646-496-409',

                 '_role_token':'<?php echo $token ?>',

                 '_registrant_token':'',

                 '_widget_containerID':'embedWidget',

                 '_widget_width':'100%',

                 '_widget_height':'100vh',

                 '_password_token':'',

                 '_nickname':'<?php echo $USER->firstname ?>',

                 '_avatar_url':'',

         };

         (function() {

                 !function(i){

                          i.Widget=function(c){

                                   'function'==typeof c&amp;&amp;i.Widget.__cbs.push(c),

                                   i.Widget.initialized&amp;&amp;(i.Widget.__cbs.forEach(function(i){i()}),

                                   i.Widget.__cbs=[])

                          },

                          i.Widget.__cbs=[]

                 }(window);

                 var ab = document.createElement('script');

                 ab.type = 'text/javascript';

                 ab.async = true;

                 ab.src = 'https://embed.archiebot.com/em?t='+_options['_license_key']+'&amp;'+Object.keys(_options).reduce(function(a,k){

                                   a.push(k+'='+encodeURIComponent(_options[k]));

                                   return a

                          },[]).join('&amp;');

                 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ab, s);

         })();

</script></body>" style="/* display: none; */width: 100%;height: 100%;overflow: visible;transition: height 2.5s ease 0s;"></iframe>
                                                                                                                                    

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #EFEFEF;
  margin-top: -7px
}

.navbar a {
  float: right;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #1B215F;
    color: white;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
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

require_once('../../config.php');
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
$sesskey = sesskey();
$logoutlink = $CFG->wwwroot."/login/logout.php?sesskey=$sesskey";
?>

<div class="navbar">
    <!--<a href=<?php // echo $CFG->wwwroot."/my"; ?>>--> 
        <img  src="mashmarilogo.png" alt="Girl in a jacket" width="5%" height="auto">
    <!--</a>-->
  <a href=<?php echo $logoutlink; ?> >Logout</a>
  <a href="https://www.swayamprabha.gov.in/" target ="_blank">Swayamrpabha</a>
  <a href="https://www.cbse.gov.in/ecbse/index.html" target ="_blank">CBSE</a>
  <a href="https://nios.ac.in/online-course-material.aspx" target ="_blank">NIOS</a>
  <a href="https://diksha.gov.in/" target ="_blank">Diksha</a>
<!--  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> -->
</div>

<iframe id="iframe-03" frameborder="0" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-presentation allow-top-navigation" src="javascript: window.frameElement.getAttribute(&quot;srcdoc&quot;);" srcdoc="<script>window.onmessage = function(event) {event.source.postMessage({iframeId: event.data, scrollHeight: document.body.getBoundingClientRect().height || document.body.scrollHeight}, event.origin);};</script><body style='margin: 0'><div id=&quot;embedWidget&quot;></div>



<script type='text/javascript'>

         var _options = {

                 '_license_key':'410-120-441',

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

</script></body>" style="/* display: none; */width: 100%;height: 91%;overflow: visible;transition: height 2.5s ease 0s;"></iframe>
                                                                                                                                    
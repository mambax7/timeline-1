<?php
// $Id: api_timeline.php,v 1.1 2009/03/19 14:41:41 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// xoops system files
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH.'/class/template.php';

//---------------------------------------------------------
// timeline files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/timeline/init.php';

timeline_include_once( 'include/constants.php',               $MY_DIRNAME );
timeline_include_once( 'class/base/xoops/config.php',         $MY_DIRNAME );
timeline_include_once( 'class/base/xoops/config_dirname.php', $MY_DIRNAME );
timeline_include_once( 'class/base/xoops/header.php',         $MY_DIRNAME );
timeline_include_once( 'class/base/d3/language.php',          $MY_DIRNAME );
timeline_include_once( 'class/base/lib/handler_basic.php',    $MY_DIRNAME );
timeline_include_once( 'class/base/lib/handler_dirname.php',  $MY_DIRNAME );
timeline_include_once( 'class/base/lib/utility.php',          $MY_DIRNAME );
timeline_include_once( 'class/base/lib/multibyte.php',        $MY_DIRNAME );
timeline_include_once( 'class/compo/xoops/config.php',        $MY_DIRNAME );
timeline_include_once( 'class/compo/xoops/header.php',        $MY_DIRNAME );
timeline_include_once( 'class/compo/d3/language.php',         $MY_DIRNAME );
timeline_include_once( 'class/compo/timeline.php',            $MY_DIRNAME );

?>
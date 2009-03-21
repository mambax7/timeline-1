<?php
// $Id: constants.php,v 1.2 2009/03/21 08:25:57 ohwada Exp $

//=========================================================
// webphoto module
// 2009-03-15 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

// === define begin ===
if( !defined("_C_TIMELINE_LOADED") ) 
{

define("_C_TIMELINE_LOADED", 1 ) ;

//=========================================================
// Constant
//=========================================================

// SimileAjax.DateTime.MILLISECOND=0;
// SimileAjax.DateTime.SECOND=1;
// SimileAjax.DateTime.MINUTE=2;
// SimileAjax.DateTime.HOUR=3;
// SimileAjax.DateTime.DAY=4;
// SimileAjax.DateTime.WEEK=5;
// SimileAjax.DateTime.MONTH=6;
// SimileAjax.DateTime.YEAR=7;
// SimileAjax.DateTime.DECADE=8;
// SimileAjax.DateTime.CENTURY=9;
// SimileAjax.DateTime.MILLENNIUM=10;
define("_C_TIMELINE_UNIT_MILLISECOND", 0) ;
define("_C_TIMELINE_UNIT_SECOND",      1) ;
define("_C_TIMELINE_UNIT_MINUTE",      2) ;
define("_C_TIMELINE_UNIT_HOUR",        3) ;
define("_C_TIMELINE_UNIT_DAY",         4) ;
define("_C_TIMELINE_UNIT_WEEK",        5) ;
define("_C_TIMELINE_UNIT_MONTH",       6) ;
define("_C_TIMELINE_UNIT_YEAR",        7) ;
define("_C_TIMELINE_UNIT_DECADE",      8) ;
define("_C_TIMELINE_UNIT_CENTURY",     9) ;
define("_C_TIMELINE_UNIT_MILLENNIUM",  10) ;

define("_C_TIMELINE_PIXELS_WEEK_DAY",      80) ;
define("_C_TIMELINE_PIXELS_WEEK_MONTH",   100) ;
define("_C_TIMELINE_PIXELS_MONTH_WEEK",   120) ;
define("_C_TIMELINE_PIXELS_MONTH_MONTH",   50) ;
define("_C_TIMELINE_PIXELS_YEAR_MONTH",    50) ;
define("_C_TIMELINE_PIXELS_YEAR_YEAR",     60) ;
define("_C_TIMELINE_PIXELS_DECADE_YEAR",   60) ;
define("_C_TIMELINE_PIXELS_DECADE_DECADE", 60) ;

// sample
define("_C_TIMELINE_SAMPLE_URL_SIMPLE_XML", "http://simile.mit.edu/wiki/How_to_Create_Timelines") ;
define("_C_TIMELINE_SAMPLE_URL_PAINTER_JSON", "http://simile-widgets.googlecode.com/svn/timeline/tags/latest/src/webapp/examples/compact-painter/compact-painter.html") ;

define("_C_TIMELINE_SIMPLE_XML_BAND_DATE", "Jun 28 2006 00:00:00 GMT") ;
define("_C_TIMELINE_SIMPLE_XML_BAND_0_WIDTH",  "70%" ) ;
define("_C_TIMELINE_SIMPLE_XML_BAND_1_WIDTH",  "30%" ) ;
define("_C_TIMELINE_SIMPLE_XML_BAND_0_PIXELS", "100" ) ;
define("_C_TIMELINE_SIMPLE_XML_BAND_1_PIXELS", "200" ) ;
define("_C_TIMELINE_SIMPLE_XML_BAND_0_UNIT", _C_TIMELINE_UNIT_MONTH ) ;
define("_C_TIMELINE_SIMPLE_XML_BAND_1_UNIT", _C_TIMELINE_UNIT_YEAR ) ;

define("_C_TIMELINE_SIMPLE_EVENTS_BAND_DATE", "Jun 28 2006 00:00:00 GMT") ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_0_WIDTH",  "70%" ) ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_1_WIDTH",  "30%" ) ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_0_PIXELS", "100" ) ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_1_PIXELS", "200" ) ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_0_UNIT", _C_TIMELINE_UNIT_MONTH ) ;
define("_C_TIMELINE_SIMPLE_EVENTS_BAND_1_UNIT", _C_TIMELINE_UNIT_YEAR ) ;

define("_C_TIMELINE_PAINTER_JSON_BAND_DATE", "Jun 10 2001 00:00:00 GMT") ;
define("_C_TIMELINE_PAINTER_JSON_BAND_0_WIDTH",  "93%" ) ;
define("_C_TIMELINE_PAINTER_JSON_BAND_1_WIDTH",  "7%" ) ;
define("_C_TIMELINE_PAINTER_JSON_BAND_0_PIXELS", "150" ) ;
define("_C_TIMELINE_PAINTER_JSON_BAND_1_PIXELS", "100" ) ;
define("_C_TIMELINE_PAINTER_JSON_BAND_0_UNIT", _C_TIMELINE_UNIT_WEEK ) ;
define("_C_TIMELINE_PAINTER_JSON_BAND_1_UNIT", _C_TIMELINE_UNIT_MONTH ) ;

define("_C_TIMELINE_PAINTER_EVENTS_BAND_DATE", "Jun 10 2001 00:00:00 GMT") ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_0_WIDTH",  "93%" ) ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_1_WIDTH",  "7%" ) ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_0_PIXELS", _C_TIMELINE_PIXELS_MONTH_WEEK ) ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_1_PIXELS", _C_TIMELINE_PIXELS_MONTH_MONTH ) ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_0_UNIT", _C_TIMELINE_UNIT_WEEK ) ;
define("_C_TIMELINE_PAINTER_EVENTS_BAND_1_UNIT", _C_TIMELINE_UNIT_MONTH ) ;

// === define end ===
}

?>
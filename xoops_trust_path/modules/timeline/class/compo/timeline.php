<?php
// $Id: timeline.php,v 1.3 2009/03/21 06:11:08 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class timeline_compo_timeline
//=========================================================
class timeline_compo_timeline
{
	var $_header_class;
	var $_language_class ;
	var $_multibyte_class ;
	var $_utility_class ;

	var $_element_name  = 'timeline_view' ;
	var $_show_element  = false;
	var $_show_onload   = false;
	var $_show_onresize = false;

	var $_center_date = '';
	var $_icon_alone  ;
	var $_band_0_icon ;
	var $_band_0_date   ;
	var $_band_0_width  ;
	var $_band_0_pixels ;
	var $_band_0_unit   ;
	var $_band_1_date   ;
	var $_band_1_width  ;
	var $_band_1_pixels ;
	var $_band_1_unit   ;

	var $_param_simple_xml ;
	var $_param_simple_events ;
	var $_param_painter_json ;
	var $_param_painter_enevts ;

	var $_desc_max   = 100 ;
	var $_desc_width = 20 ;
	var $_desc_break = '<br />' ;

	var $_DIRNAME ;
	var $_MODULE_URL ;
	var $_MARKER_URL ;

	var $_STYLE  = 'border: 1px solid #aaa; ' ;
	var $_HEIGHT = 150;

// Sep 27 2009 09:00:00 +0900
	var $_FMT_DATETIME = 'M j Y H:i:s O';

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function timeline_compo_timeline( $dirname )
{
	$this->_DIRNAME    = $dirname;
	$this->_MODULE_URL = XOOPS_URL .'/modules/'. $dirname ;
	$this->_IMAGES_URL = $this->_MODULE_URL .'/images';

	$this->_header_class    =& timeline_compo_xoops_header::getSingleton(  $dirname );
	$this->_language_class  =& timeline_compo_d3_language::getSingleton(   $dirname );
	$this->_multibyte_class = new timeline_base_lib_multibyte();
	$this->_utility_class   = new timeline_base_lib_utility();

	$this->_param_simple_xml = array(
		'band_0_date'    => _C_TIMELINE_SIMPLE_XML_BAND_DATE ,
		'band_0_width'   => _C_TIMELINE_SIMPLE_XML_BAND_0_WIDTH ,
		'band_0_pixels'  => _C_TIMELINE_SIMPLE_XML_BAND_0_PIXELS ,
		'band_0_unit'    => _C_TIMELINE_SIMPLE_XML_BAND_0_UNIT ,
		'band_1_date'    => _C_TIMELINE_SIMPLE_XML_BAND_DATE ,
		'band_1_width'   => _C_TIMELINE_SIMPLE_XML_BAND_1_WIDTH ,
		'band_1_pixels'  => _C_TIMELINE_SIMPLE_XML_BAND_1_PIXELS ,
		'band_1_unit'    => _C_TIMELINE_SIMPLE_XML_BAND_1_UNIT ,
	);

	$this->_param_simple_events = array(
		'band_0_date'    => _C_TIMELINE_SIMPLE_EVENTS_BAND_DATE ,
		'band_0_width'   => _C_TIMELINE_SIMPLE_EVENTS_BAND_0_WIDTH ,
		'band_0_pixels'  => _C_TIMELINE_SIMPLE_EVENTS_BAND_0_PIXELS ,
		'band_0_unit'    => _C_TIMELINE_SIMPLE_EVENTS_BAND_0_UNIT ,
		'band_1_date'    => _C_TIMELINE_SIMPLE_EVENTS_BAND_DATE ,
		'band_1_width'   => _C_TIMELINE_SIMPLE_EVENTS_BAND_1_WIDTH ,
		'band_1_pixels'  => _C_TIMELINE_SIMPLE_EVENTS_BAND_1_PIXELS ,
		'band_1_unit'    => _C_TIMELINE_SIMPLE_EVENTS_BAND_1_UNIT ,
	);

	$this->_param_painter_json = array(
		'band_0_date'    => _C_TIMELINE_PAINTER_JSON_BAND_DATE ,
		'band_0_width'   => _C_TIMELINE_PAINTER_JSON_BAND_0_WIDTH ,
		'band_0_pixels'  => _C_TIMELINE_PAINTER_JSON_BAND_0_PIXELS ,
		'band_0_unit'    => _C_TIMELINE_PAINTER_JSON_BAND_0_UNIT ,
		'band_1_date'    => _C_TIMELINE_PAINTER_JSON_BAND_DATE ,
		'band_1_width'   => _C_TIMELINE_PAINTER_JSON_BAND_1_WIDTH ,
		'band_1_pixels'  => _C_TIMELINE_PAINTER_JSON_BAND_1_PIXELS ,
		'band_1_unit'    => _C_TIMELINE_PAINTER_JSON_BAND_1_UNIT ,
	);

	$this->_param_painter_events = array(
		'band_0_date'    => _C_TIMELINE_PAINTER_EVENTS_BAND_DATE ,
		'band_0_width'   => _C_TIMELINE_PAINTER_EVENTS_BAND_0_WIDTH ,
		'band_0_pixels'  => _C_TIMELINE_PAINTER_EVENTS_BAND_0_PIXELS ,
		'band_0_unit'    => _C_TIMELINE_PAINTER_EVENTS_BAND_0_UNIT ,
		'band_1_date'    => _C_TIMELINE_PAINTER_EVENTS_BAND_DATE ,
		'band_1_width'   => _C_TIMELINE_PAINTER_EVENTS_BAND_1_WIDTH ,
		'band_1_pixels'  => _C_TIMELINE_PAINTER_EVENTS_BAND_1_PIXELS ,
		'band_1_unit'    => _C_TIMELINE_PAINTER_EVENTS_BAND_1_UNIT ,
	);

	$this->_icon_alone  = $this->_IMAGES_URL."/no-image-40.png" ; 
	$this->_band_0_icon = $this->_IMAGES_URL."/no-image-80.png" ; 

}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new timeline_compo_timeline( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function init_simple_xml()
{
	$this->set_param( $this->_param_simple_xml );
}

function init_simple_events()
{
	$this->set_param( $this->_param_simple_events );
}

function init_painter_json()
{
	$this->set_param( $this->_param_painter_json );
}

function init_painter_events()
{
	$this->set_param( $this->_param_painter_events );
}

function fetch_simple_xml( $param )
{
	$template = 'db:'. $this->_DIRNAME .'_inc_simple_xml_js.html' ;
	return $this->fetch_common( $param, $template );
}

function fetch_simple_events( $param )
{
	$template = 'db:'. $this->_DIRNAME .'_inc_simple_events_js.html' ;
	return $this->fetch_common( $param, $template );
}

function fetch_painter_json( $param )
{
	$template = 'db:'. $this->_DIRNAME .'_inc_painter_json_js.html' ;
	return $this->fetch_common( $param, $template );
}

function fetch_painter_events( $param )
{
	$template = 'db:'. $this->_DIRNAME .'_inc_painter_events_js.html' ;
	return $this->fetch_common( $param, $template );
}

function fetch_common( $param, $template )
{
	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $template );
}

function build_simple_xml( $id, $xml, $flag_header=true )
{
	$arr = $this->build_common( $id, $flag_header );
	$arr['xml'] = $xml ;
	return $arr;
}

function build_simple_events( $id, $events, $flag_header=true )
{
	$arr = $this->build_common( $id, $flag_header );
	$arr['events'] = $events ;
	$arr['zoom'] = "true" ;
	return $arr;
}

function build_painter_json( $id, $json, $flag_header=true )
{
	$arr = $this->build_common( $id, $flag_header );
	$arr['json'] = $json ;
	return $arr;
}

function build_painter_events( $id, $events, $flag_header=true )
{

	$arr = $this->build_common( $id, $flag_header );
	$arr['events'] = $events ;
	return $arr;
}

function set_param( $param )
{
	if ( $param['band_0_date'] ) {
		 $this->_band_0_date = $param['band_0_date'] ;
	}
	if ( $param['band_0_width'] ) {
		 $this->_band_0_width = $param['band_0_width'] ;
	}
	if ( $param['band_0_pixels'] ) {
		 $this->_band_0_pixels = $param['band_0_pixels'] ;
	}
	if ( $param['band_0_unit'] ) {
		 $this->_band_0_unit = $param['band_0_unit'] ;
	}
	if ( $param['band_1_date'] ) {
		 $this->_band_1_date = $param['band_1_date'] ;
	}
	if ( $param['band_1_width'] ) {
		 $this->_band_1_width = $param['band_1_width'] ;
	}
	if ( $param['band_1_pixels'] ) {
		 $this->_band_1_pixels = $param['band_1_pixels'] ;
	}
	if ( $param['band_1_unit'] ) {
		 $this->_band_1_unit = $param['band_1_unit'] ;
	}

}

function build_common( $id, $flag_header=true )
{
	$style = $this->_STYLE.' height:'.$this->_HEIGHT.'px; ';
	$show  = false ;

	if ( $flag_header ) {
		$param = $this->_header_class->assign_or_get_timeline_js() ;
		$show  = $param['show'] ;
	}

	$arr = array(
		'id'                => $id ,
		'element'           => $this->build_element_id( $id ) ,
		'xoops_langcode'    => _LANGCODE ,
		'xoops_dirname'     => $this->_DIRNAME ,
		'module_url'        => $this->_MODULE_URL ,
		'show_timeline_js'  => $show ,
		'show_element'      => $this->_show_element ,
		'show_onload'       => $this->_show_onload ,
		'show_onresize'     => $this->_show_onresize ,
		'style'             => $style ,
		'center_date'       => $this->_center_date,
		'icon_alone'        => $this->_icon_alone,
		'band_0_date'       => $this->_band_0_date,
		'band_0_width'      => $this->_band_0_width,
		'band_0_pixels'     => $this->_band_0_pixels,
		'band_0_unit'       => $this->_band_0_unit,
		'band_0_icon'       => $this->_band_0_icon,
		'band_1_date'       => $this->_band_1_date,
		'band_1_width'      => $this->_band_1_width,
		'band_1_pixels'     => $this->_band_1_pixels,
		'band_1_unit'       => $this->_band_1_unit,
	);
	return $arr;
}

function build_element_id( $id )
{
	$str = $this->_element_name.'_'.$id ;
	return $str ;
}

function bool_to_str( $bool )
{
	if ( $bool ) {
		return "true";
	}
	return "false";
}

function build_summary( $str )
{
	return $this->_multibyte_class->build_summary_with_wordwrap( 
		$str, $this->_desc_max, $this->_desc_width, $this->_desc_break );
}

function escape_quotation( $str )
{
// " -> \"
	return str_replace( '"', '\"', $str );
}

function unixtime_to_datetime( $time )
{
	if ( $time > 0 ) {
		return date( $this->_FMT_DATETIME, $time );
	}
	return false;
}

function set_band_unit( $unit )
{
	switch ( $unit )
	{
		case 'decade':
			$this->set_band_0_unit( _C_TIMELINE_UNIT_YEAR );
			$this->set_band_1_unit( _C_TIMELINE_UNIT_DECADE );
			$this->set_band_0_pixels( _C_TIMELINE_PIXELS_DECADE_YEAR );
			$this->set_band_1_pixels( _C_TIMELINE_PIXELS_DECADE_DECADE );
			break;

		case 'year':
			$this->set_band_0_unit( _C_TIMELINE_UNIT_MONTH );
			$this->set_band_1_unit( _C_TIMELINE_UNIT_YEAR );
			$this->set_band_0_pixels( _C_TIMELINE_PIXELS_YEAR_MONTH );
			$this->set_band_1_pixels( _C_TIMELINE_PIXELS_YEAR_YEAR );
			break;

		case 'month':
			$this->set_band_0_unit( _C_TIMELINE_UNIT_WEEK );
			$this->set_band_1_unit( _C_TIMELINE_UNIT_MONTH );
			$this->set_band_0_pixels( _C_TIMELINE_PIXELS_MONTH_WEEK );
			$this->set_band_1_pixels( _C_TIMELINE_PIXELS_MONTH_MONTH );
			break;	

		case 'week':
			$this->set_band_0_unit( _C_TIMELINE_UNIT_DAY );
			$this->set_band_1_unit( _C_TIMELINE_UNIT_MONTH );
			$this->set_band_0_pixels( _C_TIMELINE_PIXELS_WEEK_DAY );
			$this->set_band_1_pixels( _C_TIMELINE_PIXELS_WEEK_MONTH );
			break;	
	}
}

//---------------------------------------------------------
// language
//---------------------------------------------------------
function get_lang( $name )
{
	return $this->_language_class->get_constant( $name );
}

//---------------------------------------------------------
// set param
//---------------------------------------------------------
function set_show_element( $val )
{
	$this->_show_element = (bool)$val ;
}

function set_show_onload( $val )
{
	$this->_show_onload = (bool)$val ;
}

function set_show_onresize( $val )
{
	$this->_show_onresize = (bool)$val ;
}

function set_element( $val )
{
	$this->_element = $val;
}

function set_element_name( $val )
{
	$this->_element_name = $val ;
}

function set_center_date( $val )
{
	$this->_center_date = $val ;
}

function set_band_0_unit( $val )
{
	$this->_band_0_unit = $val ;
}

function set_band_1_unit( $val )
{
	$this->_band_1_unit = $val ;
}

function set_band_0_pixels( $val )
{
	$this->_band_0_pixels = $val ;
}

function set_band_1_pixels( $val )
{
	$this->_band_1_pixels = $val ;
}

// --- class end ---
}

?>
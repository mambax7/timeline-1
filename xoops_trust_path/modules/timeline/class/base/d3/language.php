<?php
// $Id: language.php,v 1.1 2009/03/19 14:41:42 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class timeline_base_d3_language
//=========================================================
class timeline_base_d3_language
{
	var $_DIRNAME;
	var $_TRUST_DIRNAME;
	var $_MODULE_DIR;
	var $_TRUST_DIR;

	var $_DEBUG_ERROR = false;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function timeline_base_d3_language( $dirname , $trust_dirname )
{
	$this->_DIRNAME       = $dirname;
	$this->_TRUST_DIRNAME = $trust_dirname;

	$this->_MODULE_DIR = XOOPS_ROOT_PATH  .'/modules/'. $dirname;
	$this->_TRUST_DIR  = XOOPS_TRUST_PATH .'/modules/'. $trust_dirname;

	$this->set_debug_error_by_const_name( $dirname.'_C_DEBUG_ERROR' );
}

//---------------------------------------------------------
// public
//---------------------------------------------------------
function get_lang_array()
{
	$arr1 = array();
	$arr2 = array();

	$needle1 = strtoupper( '_'. $this->_TRUST_DIRNAME .'_' ) ;
	$needle2 = strtolower( $this->_DIRNAME . '_' );
	$constant_arr = get_defined_constants();

	foreach( $constant_arr as $k => $v )
	{
		if ( strpos( $k, $needle1 ) !== 0 ) { continue; }

		$key = strtolower( str_replace( $needle1, '', $k ) );
		$arr1[ $key ] = $v;
	}

	foreach( $arr1 as $k => $v )
	{
		if ( strpos( $k, $needle2 ) !== 0 ) { continue; }

// overwrite
		$key= str_replace( $needle2, '', $k );
		$arr1[ $key ] = $v;
	}

	foreach( $arr1 as $k => $v ) {
		$arr2[ 'lang_'.$k ] = $v;
	}

	return $arr2;
}

function get_constant( $name )
{
	$cont_name_1 = $this->build_constant_name_1( $name );
	$cont_name_2 = $this->build_constant_name_2( $name );
	$cont_name_3 = $this->build_constant_name_3( $name );
	$cont_name_4 = $this->build_constant_name_3( $name );

	if ( defined($cont_name_1) ) {
		return constant($cont_name_1);

	} elseif( defined($cont_name_2) ) {
		return constant($cont_name_2);

	} elseif( defined($cont_name_3) ) {
		return constant($cont_name_3);
	}

	if ( $this->_DEBUG_ERROR ) {
		echo $this->highlight( 'CANNOT get constant '. $name )."<br />\n";
	}
	return $cont_name_4;
}

function set_debug_error( $val )
{
	$this->_DEBUG_ERROR = (bool)$val;
}

function set_debug_error_by_const_name( $name )
{
	$name = strtoupper( $name );
	if ( defined($name) ) {
		$this->set_debug_error( constant($name) );
	}
}

//---------------------------------------------------------
// private
//---------------------------------------------------------
function build_constant_name_1( $name )
{
	$str = '_'. $this->_TRUST_DIRNAME .'_'. $this->_DIRNAME .'_'. $name ;
	return strtoupper( $str );
}

function build_constant_name_2( $name )
{
	$str = '_'. $this->_DIRNAME .'_'. $name ;
	return strtoupper( $str );
}

function build_constant_name_3( $name )
{
	$str = '_'. $this->_TRUST_DIRNAME .'_'. $name ;
	return strtoupper( $str );
}

function build_constant_name_4( $name )
{
	$str = $this->build_constant_pref( $pref ) .'_'. $name ;
	return strtoupper( $str );
}

function highlight( $str )
{
	$val = '<span style="color:#ff0000;">'. $str .'</span>';
	return $val;
}

//----- class end -----
}

?>
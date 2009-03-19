<?php
// $Id: xoops_version.php,v 1.1 2009/03/19 14:41:43 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class timeline_inc_xoops_version
//=========================================================
class timeline_inc_xoops_version extends timeline_base_inc_xoops_version
{
	var $_HAS_MAIN   = true ;
	var $_HAS_ADMIN  = true ;
	var $_HAS_CONFIG = false ;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function timeline_inc_xoops_version( $dirname )
{
	$this->timeline_base_inc_xoops_version( $dirname );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = 
			new timeline_inc_xoops_version( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function modversion()
{
	return $this->build_modversion();
}

function get_version()
{
	return _C_TIMELINE_VERSION ;
}

//---------------------------------------------------------
// Config Settings
//---------------------------------------------------------
function build_config()
{
	return array();
}

// --- class end ---
}

?>
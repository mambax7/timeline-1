$Id: readme_en.txt,v 1.2 2009/03/20 04:06:19 ohwada Exp $

=================================================
Version: 0.10
Date:   2009-03-15
Author: Kenichi OHWADA
URL:    http://linux2.ohwada.net/
Email:  webmaster@ohwada.net
=================================================

This module is the timeline using MIT Timeline
http://code.google.com/p/simile-widgets/wiki/Timeline

* Main features *
1. Sample
(1) Sample1 : simple exsample using XML format data
(2) Sample2 : simple exsample using Event object
(3) Sample3 : CompactEventPainter using JSON format date
(3) Sample4 : CompactEventPainter using Event object

2. API features
This modules provide the interface for the other module to show the timeline.


* Install *
1. common ( xoops 2.0.16a JP and XOOPS Cube 2.1.x )
When you unzip the zip file, there are two directories html and xoops_trust_path.
Please copy in the directory which XOOPS correspond

When you install, the xoops output warning like the following.
Please ignore, because xoops and webphoto work well.
-----
Warning [Xoops]: Smarty error: unable to read resource: "db:_inc_simple_xml_js.html" in file class/smarty/Smarty.class.php line 1095
-----

2. xoops 2.0.18
in addition to the above

(1) rename preload file.
XOOPS_TRUUST_PATH/modules/timeline/preload/_constants.php (with undebar)
 -> constants.php (without undebar)

(2) change _C_TIMELINE_PRELOAD_XOOPS_2018 in valid
remove // at the head.
-----
//define("_C_TIMELINE_PRELOAD_XOOPS_2018", "1" )
-----


* Special Thanks *
Special thanks to MIT Simile Project.
- http://code.google.com/p/simile-widgets/wiki/Timeline


<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 19:13:21
         compiled from "application/views/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15990336245491e734789de5-13440307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd56d996a7ae9dfba73ad9ea7a43f1f2e67c7b29' => 
    array (
      0 => 'application/views/dashboard.tpl',
      1 => 1419098876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15990336245491e734789de5-13440307',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491e7347a2f9',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491e7347a2f9')) {function content_5491e7347a2f9($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="content">
                    <div class="inner">
                    <h3>Dashboard</h3>
                          This is an example chart that you could put here, or just simply delete the code.

                          <!--
                            Or just say hello to the user :)
                          -->

                          <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                          <script type="text/javascript">
                          
                                google.load("visualization", "1", {packages:["corechart"]});
                                google.setOnLoadCallback(drawVisualization);

                                function drawVisualization() 
                                {
                                    // Create and populate the data table.
                                    var data = new google.visualization.DataTable();
                                    var raw_data = [['Austria', 1336060, 1538156, 1576579, 1600652, 1968113, 1901067],
                                                  ['Belgium', 3817614, 3968305, 4063225, 4604684, 4013653, 6792087],
                                                  ['Czech Republic', 974066, 928875, 1063414, 940478, 1037079, 1037327],
                                                  ['Finland', 1104797, 1151983, 1156441, 1167979, 1207029, 1284795],
                                                  ['France', 6651824, 5940129, 5714009, 6190532, 6420270, 6240921],
                                                  ['Germany', 15727003, 17356071, 16716049, 18542843, 19564053, 19830493]];

                                    var years = [2003, 2004, 2005, 2006, 2007, 2008];
                                                  
                                    data.addColumn('string', 'Year');
                                    for (var i = 0; i  < raw_data.length; ++i) {
                                        data.addColumn('number', raw_data[i][0]);    
                                    }

                                    data.addRows(years.length);

                                    for (var j = 0; j < years.length; ++j) {    
                                        data.setValue(j, 0, years[j].toString());    
                                    }
                                    for (var i = 0; i  < raw_data.length; ++i) {
                                        for (var j = 1; j  < raw_data[i].length; ++j) {
                                          data.setValue(j-1, i+1, raw_data[i][j]);    
                                        }
                                    }

                                    // Create and draw the visualization.
                                    new google.visualization.ColumnChart(document.getElementById('visualization')).
                                      draw(data,
                                           {title:"Yearly Coffee Consumption by Country", 
                                            width:600, height:400,
                                            hAxis: {title: "Year"}}
                                      );
                                }
                                
                          
                          </script>

                          <div id="visualization"></div>

                          <a href="http://code.google.com/apis/chart/interactive/docs/gallery.html" target="_blank">Get more widgets</a>
                          <br /><br />

                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
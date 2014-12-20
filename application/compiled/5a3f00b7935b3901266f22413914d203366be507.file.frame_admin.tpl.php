<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 23:13:41
         compiled from "application/views/frame_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9614532835491e727bbd306-96168861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a3f00b7935b3901266f22413914d203366be507' => 
    array (
      0 => 'application/views/frame_admin.tpl',
      1 => 1419113504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9614532835491e727bbd306-96168861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491e727c0b2d',
  'variables' => 
  array (
    'config' => 0,
    'logged_in' => 0,
    'table_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491e727c0b2d')) {function content_5491e727c0b2d($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etickets | backend</title>
    <base href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
" />
    <link rel="stylesheet" href="iscaffold/backend_skins/stylesheets/base.css" type="text/css" media="screen" />
    <!--
        You can change the admin theme by changing the 'default' directory in the path below
    -->
    <link rel="stylesheet" href="iscaffold/backend_skins/stylesheets/themes/default/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="iscaffold/backend_skins/stylesheets/override.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="iscaffold/editor/CLEditor/jquery.CLEditor.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="iscaffold/jquery-ui/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" />

    <script type="text/javascript" src="iscaffold/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="iscaffold/editor/CLEditor/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="iscaffold/editor/CLEditor/jquery.cleditor.extimage.js"></script>
    <script type="text/javascript" src="iscaffold/jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="iscaffold/js/main.js"></script>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><a href="dashboard">Etickets</a></h1>
            <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
                <div id="user-navigation">
                    <ul class="wat-cf">
                        <li><a class="logout" href="login/logout">Logout</a></li>
                    </ul>
                </div>

                <div id="main-navigation">
                    <ul class="wat-cf">
                        <li><a href="dashboard">Dashboard</a></li>
                    </ul>
                </div>
            <?php }?>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>

        <div id="wrapper" class="wat-cf">
            <div id="main">

                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <div id="footer">
                    <div class="block">
                    <p>The backend is generated with <a href="http://iscaffold.skyweb.hu" target="_blank">iScaffold 2.1.2</a></p>
                    </div>
                </div>
            </div>

            <div id="sidebar">
                <div class="block">
                  <h3>Navigation</h3>
                  <ul class="navigation">
                    <ul id="top_menu">						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Category'){?> class='active'<?php }?><?php }?>><a href='category'>Category</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Event'){?> class='active'<?php }?><?php }?>><a href='event'>Event</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Place'){?> class='active'<?php }?><?php }?>><a href='place'>Place</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Place_has_section'){?> class='active'<?php }?><?php }?>><a href='place_has_section'>Place_has_section</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Reservation'){?> class='active'<?php }?><?php }?>><a href='reservation'>Reservation</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Role'){?> class='active'<?php }?><?php }?>><a href='role'>Role</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Seat'){?> class='active'<?php }?><?php }?>><a href='seat'>Seat</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Section'){?> class='active'<?php }?><?php }?>><a href='section'>Section</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='User'){?> class='active'<?php }?><?php }?>><a href='user'>User</a></li>
						<li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='User_profile'){?> class='active'<?php }?><?php }?>><a href='user_profile'>User_profile</a></li>
					</ul>
                  </ul>
                </div>

                <div class="block notice">
                  <h4>General notice</h4>
                  <p>This is a general message box. Can be useful to display any usage notice or just some basic guidelines.</p>
                </div>
            </div>

        </div><!-- wrapper -->

        <?php }else{ ?>
            <?php echo $_smarty_tpl->getSubTemplate ("form_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php }?>

    </div><!-- container -->
</body>
</html><?php }} ?>
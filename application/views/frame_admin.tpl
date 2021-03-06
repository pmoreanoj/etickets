<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etickets | backend</title>
    <base href="{$config.base_url}" />
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
            {if $logged_in == true}
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
            {/if}
        </div>

        {if $logged_in == true}

        <div id="wrapper" class="wat-cf">
            <div id="main">

                {include file="$template.tpl"}

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
                    <ul id="top_menu">						<li{if isset($table_name)}{if $table_name == 'Category'} class='active'{/if}{/if}><a href='category'>Category</a></li>
						<li{if isset($table_name)}{if $table_name == 'Event'} class='active'{/if}{/if}><a href='event'>Event</a></li>
						<li{if isset($table_name)}{if $table_name == 'Place'} class='active'{/if}{/if}><a href='place'>Place</a></li>
						<li{if isset($table_name)}{if $table_name == 'Place_has_section'} class='active'{/if}{/if}><a href='place_has_section'>Place_has_section</a></li>
						<li{if isset($table_name)}{if $table_name == 'Reservation'} class='active'{/if}{/if}><a href='reservation'>Reservation</a></li>
						<li{if isset($table_name)}{if $table_name == 'Role'} class='active'{/if}{/if}><a href='role'>Role</a></li>
						<li{if isset($table_name)}{if $table_name == 'Seat'} class='active'{/if}{/if}><a href='seat'>Seat</a></li>
						<li{if isset($table_name)}{if $table_name == 'Section'} class='active'{/if}{/if}><a href='section'>Section</a></li>
						<li{if isset($table_name)}{if $table_name == 'User'} class='active'{/if}{/if}><a href='user'>User</a></li>
						<li{if isset($table_name)}{if $table_name == 'User_profile'} class='active'{/if}{/if}><a href='user_profile'>User_profile</a></li>
					</ul>
                  </ul>
                </div>

                <div class="block notice">
                  <h4>General notice</h4>
                  <p>This is a general message box. Can be useful to display any usage notice or just some basic guidelines.</p>
                </div>
            </div>

        </div><!-- wrapper -->

        {else}
            {include file="form_login.tpl"}
        {/if}

    </div><!-- container -->
</body>
</html>
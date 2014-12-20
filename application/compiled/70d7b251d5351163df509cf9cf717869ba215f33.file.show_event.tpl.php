<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 20:46:39
         compiled from "application/views/show_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2175772745495d21fa804a3-80936847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70d7b251d5351163df509cf9cf717869ba215f33' => 
    array (
      0 => 'application/views/show_event.tpl',
      1 => 1419103647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2175772745495d21fa804a3-80936847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'id' => 0,
    'event_fields' => 0,
    'event_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495d21fac302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495d21fac302')) {function content_5495d21fac302($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="event">Listing</a></li>
                        <li><a href="event/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
						<h3>Details of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
, record #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['event_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['event_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['photo'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['photo'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['dateTime'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['dateTime'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['delete'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['delete'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['categoryID'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['categoryID'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['placeID'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event_data']->value['placeID'];?>
</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="event/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
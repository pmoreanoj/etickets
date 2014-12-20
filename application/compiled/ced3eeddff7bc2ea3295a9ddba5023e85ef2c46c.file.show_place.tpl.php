<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 23:29:11
         compiled from "application/views/show_place.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20567195855495f837b5d704-29247630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ced3eeddff7bc2ea3295a9ddba5023e85ef2c46c' => 
    array (
      0 => 'application/views/show_place.tpl',
      1 => 1419113504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20567195855495f837b5d704-29247630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'id' => 0,
    'place_fields' => 0,
    'place_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495f837b9083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495f837b9083')) {function content_5495f837b9083($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="place">Listing</a></li>
                        <li><a href="place/create/">New record</a></li>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['place_fields']->value['place_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['place_data']->value['place_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['place_fields']->value['name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['place_data']->value['name'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['place_fields']->value['photo'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['place_data']->value['photo'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['place_fields']->value['description'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['place_data']->value['description'];?>
</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="place/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
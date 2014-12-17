<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 18:00:07
         compiled from "application/views/show_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14216324815491b6976b5dc1-98095293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d2d88ecbf529b225d3c3f30b69b7e51472a78c6' => 
    array (
      0 => 'application/views/show_section.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14216324815491b6976b5dc1-98095293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'id' => 0,
    'section_fields' => 0,
    'section_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b6976e6eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b6976e6eb')) {function content_5491b6976e6eb($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="section">Listing</a></li>
                        <li><a href="section/create/">New record</a></li>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['section_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['section_data']->value['section_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['rows'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['section_data']->value['rows'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['seats_per_rows'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['section_data']->value['seats_per_rows'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['price'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['section_data']->value['price'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['description'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['section_data']->value['description'];?>
</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="section/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
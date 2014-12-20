<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 23:09:32
         compiled from "application/views/list_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17087152505495c754179cb4-12884695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf11dcd5e02a1385337df92cf534312ba77b30e6' => 
    array (
      0 => 'application/views/list_section.tpl',
      1 => 1419103647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17087152505495c754179cb4-12884695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c7541b718',
  'variables' => 
  array (
    'table_name' => 0,
    'section_data' => 0,
    'section_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c7541b718')) {function content_5495c7541b718($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="section">Listing</a></li>
                        <li><a href="section/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['section_data']->value)){?>
                        <form action="section/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['section_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['rows'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['seats_per_rows'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['price'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['description'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['section_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['section_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['section_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['rows'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['seats_per_rows'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</td>

                                            <td width="80">
                                                <a href="section/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['section_id'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="section/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['section_id'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('section/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['section_id'];?>
')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
                                            </td>
                            		    </tr>
                                	<?php } ?>
                            	</tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="button" type="submit">
                                        <img src="iscaffold/backend_skins/images/icons/cross.png" alt="Delete"> Delete selected
                                    </button>
                                </div>
                                <div class="pagination">
                                    <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                                </div>
                            </div>
                        </form>
                        <?php }else{ ?>
                            No records found.
                        <?php }?>

                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
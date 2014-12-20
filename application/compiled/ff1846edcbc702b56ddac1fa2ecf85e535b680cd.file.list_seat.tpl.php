<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 20:00:35
         compiled from "application/views/list_seat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9008123805495c753432f57-17629552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff1846edcbc702b56ddac1fa2ecf85e535b680cd' => 
    array (
      0 => 'application/views/list_seat.tpl',
      1 => 1419101918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9008123805495c753432f57-17629552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'seat_data' => 0,
    'seat_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c75346d6f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c75346d6f')) {function content_5495c75346d6f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="seat">Listing</a></li>
                        <li><a href="seat/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['seat_data']->value)){?>
                        <form action="seat/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['seat_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['sectionID'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['number_row'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['number_seat'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['occupied'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seat_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['seat_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['seat_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['sectionID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['number_row'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['number_seat'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['occupied'];?>
</td>

                                            <td width="80">
                                                <a href="seat/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['seat_id'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="seat/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['seat_id'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('seat/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['seat_id'];?>
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
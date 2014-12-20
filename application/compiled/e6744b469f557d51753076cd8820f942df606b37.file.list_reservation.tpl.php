<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 23:28:54
         compiled from "application/views/list_reservation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13198439625495c6b4c29d36-66147186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6744b469f557d51753076cd8820f942df606b37' => 
    array (
      0 => 'application/views/list_reservation.tpl',
      1 => 1419113504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13198439625495c6b4c29d36-66147186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c6b4c71f0',
  'variables' => 
  array (
    'table_name' => 0,
    'reservation_data' => 0,
    'reservation_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c6b4c71f0')) {function content_5495c6b4c71f0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="reservation">Listing</a></li>
                        <li><a href="reservation/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['reservation_data']->value)){?>
                        <form action="reservation/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['confirmation'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['bank'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['reservation_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['userID'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['eventID'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['state'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['more'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reservation_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['confirmation'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['confirmation'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['bank'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['reservation_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['userID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['eventID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['state'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['more'];?>
</td>

                                            <td width="80">
                                                <a href="reservation/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['confirmation'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="reservation/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['confirmation'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('reservation/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['confirmation'];?>
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
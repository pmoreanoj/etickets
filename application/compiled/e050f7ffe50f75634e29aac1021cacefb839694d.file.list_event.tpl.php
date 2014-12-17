<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 21:33:41
         compiled from "application/views/list_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11333039775491e75fe087d7-99462571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e050f7ffe50f75634e29aac1021cacefb839694d' => 
    array (
      0 => 'application/views/list_event.tpl',
      1 => 1418848148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11333039775491e75fe087d7-99462571',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491e75fe568f',
  'variables' => 
  array (
    'table_name' => 0,
    'event_data' => 0,
    'event_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491e75fe568f')) {function content_5491e75fe568f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="event">Listing</a></li>
                        <li><a href="event/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['event_data']->value)){?>
                        <form action="event/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['event_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['placeID'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['name'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['photo'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['dateTime'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['event_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['placeID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dateTime'];?>
</td>

                                            <td width="80">
                                                <a href="event/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="event/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('event/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
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
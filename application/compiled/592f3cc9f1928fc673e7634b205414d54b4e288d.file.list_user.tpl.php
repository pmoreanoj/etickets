<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 20:06:39
         compiled from "application/views/list_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11483688865495c75b341ff2-65206293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '592f3cc9f1928fc673e7634b205414d54b4e288d' => 
    array (
      0 => 'application/views/list_user.tpl',
      1 => 1419102315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11483688865495c75b341ff2-65206293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c75b38233',
  'variables' => 
  array (
    'table_name' => 0,
    'user_data' => 0,
    'user_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c75b38233')) {function content_5495c75b38233($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="user">Listing</a></li>
                        <li><a href="user/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['user_data']->value)){?>
                        <form action="user/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['password'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['roleID'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['name'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['email'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['username'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['delete'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['password'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['roleID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['delete'];?>
</td>

                                            <td width="80">
                                                <a href="user/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="user/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('user/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
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
<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 19:57:23
         compiled from "application/views/list_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4738231985495c693e6d140-00694444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1069cb2a638e76287eb0b1553f35059b6d4ae873' => 
    array (
      0 => 'application/views/list_category.tpl',
      1 => 1419098876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4738231985495c693e6d140-00694444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'category_data' => 0,
    'category_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c693eb4b4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c693eb4b4')) {function content_5495c693eb4b4($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="category">Listing</a></li>
                        <li><a href="category/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['category_data']->value)){?>
                        <form action="category/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['category_fields']->value['category_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['category_fields']->value['category'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['category_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['category_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['category'];?>
</td>

                                            <td width="80">
                                                <a href="category/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['category_id'];?>
"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="category/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['category_id'];?>
"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('category/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['category_id'];?>
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
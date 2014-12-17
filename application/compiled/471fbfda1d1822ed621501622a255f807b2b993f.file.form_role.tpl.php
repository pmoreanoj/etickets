<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 17:46:52
         compiled from "application/views/form_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2446928755491b37c93e5d9-44382742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '471fbfda1d1822ed621501622a255f807b2b993f' => 
    array (
      0 => 'application/views/form_role.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2446928755491b37c93e5d9-44382742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'role_fields' => 0,
    'metadata' => 0,
    'e' => 0,
    'role_data' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b37c99029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b37c99029')) {function content_5491b37c99029($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="role">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="role/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
                            <h3>Add new record</h3>
                        <?php }else{ ?>
                            <h3>Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
</h3>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
                            <div class="flash">
                                <div class="message error">
                                    <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                                </div>
                            </div>
                        <?php }?>

                        <form class="form" method='post' action='role/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['role_fields']->value['role'];?>
<span class="error">*</span></label>
            <span class="error">can't be blank</span>
        	<div class="block">
        	<span class="left">
        		<select class="field select addr" name="role" >
                    <option value="0"></option>
                    <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['metadata']->value['role']['enum_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['role_data']->value['role'])){?><?php if ($_smarty_tpl->tpl_vars['role_data']->value==$_smarty_tpl->tpl_vars['metadata']->value['role']['enum_names'][$_smarty_tpl->tpl_vars['k']->value]){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['metadata']->value['role']['enum_names'][$_smarty_tpl->tpl_vars['k']->value];?>
</option>
                    <?php } ?>
            	</select>
            </span>
            </div>
    		<p class="instruct">Nombre del Rol</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['role_fields']->value['default'];?>
<span class="error">*</span></label>
            <input class="field checkbox" type="checkbox" value="1" name="default"<?php if (isset($_smarty_tpl->tpl_vars['role_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['role_data']->value['default']==1){?> checked="checked"<?php }?><?php }?> />

    		<p class="instruct">Rol por defecto</p>
    	</div>
    

                            <div class="group navform wat-cf">
                                    <button class="button" type="submit">
                                        <img src="iscaffold/backend_skins/images/icons/tick.png" alt="Save"> Save
                                    </button>
                                    <span class="text_button_padding">or</span>
                                    <a class="text_button_padding link_button" href="javascript:window.history.back();">Cancel</a>
                            </div>
                        </form>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 20:06:40
         compiled from "application/views/form_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10103209015495c82f017968-96082544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19867657cb1f92e123a1f5c5565719b6cac85f52' => 
    array (
      0 => 'application/views/form_user.tpl',
      1 => 1419102315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10103209015495c82f017968-96082544',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495c82f068d0',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'user_fields' => 0,
    'user_data' => 0,
    'related_role' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495c82f068d0')) {function content_5495c82f068d0($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="user/create/">New record</a></li>
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

                        <form class="form" method='post' action='user/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['password'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_data']->value['password'];?>
<?php }?>" name="password" />
    		</div>
    		<p class="instruct">Contrasena del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['roleID'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="roleID" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_role']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['role_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['roleID']==$_smarty_tpl->tpl_vars['rel']->value['role_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['role_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">Rol del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['name'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_data']->value['name'];?>
<?php }?>" name="name" />
    		</div>
    		<p class="instruct">Nombre completo del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['email'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_data']->value['email'];?>
<?php }?>" name="email" />
    		</div>
    		<p class="instruct">E-mail del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['username'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_data']->value['username'];?>
<?php }?>" name="username" />
    		</div>
    		<p class="instruct">Usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_fields']->value['delete'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_data']->value['delete'];?>
<?php }?>" name="delete" />
    		</div>
    		<p class="instruct">Si el usuario se borro</p>
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
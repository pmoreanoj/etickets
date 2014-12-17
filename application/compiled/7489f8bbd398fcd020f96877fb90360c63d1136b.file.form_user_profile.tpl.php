<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 17:47:18
         compiled from "application/views/form_user_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17526123765491b39633e1a7-62981482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7489f8bbd398fcd020f96877fb90360c63d1136b' => 
    array (
      0 => 'application/views/form_user_profile.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17526123765491b39633e1a7-62981482',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'user_profile_fields' => 0,
    'related_user' => 0,
    'rel' => 0,
    'user_profile_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b3963950a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b3963950a')) {function content_5491b3963950a($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user_profile">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="user_profile/create/">New record</a></li>
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

                        <form class="form" method='post' action='user_profile/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['userID'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="userID" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['user_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['user_profile_data']->value['userID']==$_smarty_tpl->tpl_vars['rel']->value['user_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['user_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">ID del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['address'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['address'];?>
<?php }?>" name="address" />
    		</div>
    		<p class="instruct">Dirección del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['city'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['city'];?>
<?php }?>" name="city" />
    		</div>
    		<p class="instruct">Ciudad del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['province'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['province'];?>
<?php }?>" name="province" />
    		</div>
    		<p class="instruct">Provincia del Usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['zipcode'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['zipcode'];?>
<?php }?>" name="zipcode" />
    		</div>
    		<p class="instruct">Codigo Postal</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['phone'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['phone'];?>
<?php }?>" name="phone" />
    		</div>
    		<p class="instruct">Telefono del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['user_profile_fields']->value['celular'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['user_profile_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['user_profile_data']->value['celular'];?>
<?php }?>" name="celular" />
    		</div>
    		<p class="instruct">Celular del usuario</p>
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
<?php /* Smarty version Smarty-3.1.7, created on 2014-12-21 00:41:39
         compiled from "application/views/form_reservation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13343467215495f3cbb38f99-03921895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c05687d8c331a3aa7991d9d0794eca7485b7b79' => 
    array (
      0 => 'application/views/form_reservation.tpl',
      1 => 1419113504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13343467215495f3cbb38f99-03921895',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495f3cbbc014',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'reservation_fields' => 0,
    'reservation_data' => 0,
    'related_user' => 0,
    'rel' => 0,
    'related_event' => 0,
    'metadata' => 0,
    'e' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495f3cbbc014')) {function content_5495f3cbbc014($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/etickets/application/libraries/smarty/plugins/modifier.date_format.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="reservation">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="reservation/create/">New record</a></li>
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

                        <form class="form" method='post' action='reservation/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['bank'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['reservation_data']->value['bank'];?>
<?php }?>" name="bank" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['reservation_id'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['reservation_data']->value['reservation_id'];?>
<?php }?>" name="reservation_id" />
    		</div>
    		<p class="instruct">Id de la reserva</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['userID'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="userID" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['user_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['reservation_data']->value['userID']==$_smarty_tpl->tpl_vars['rel']->value['user_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['user_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">ID del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['eventID'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="eventID" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_event']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['event_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['reservation_data']->value['eventID']==$_smarty_tpl->tpl_vars['rel']->value['event_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['event_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">ID del evento</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['date'];?>
<span class="error">*</span></label>
    		<span>
    		      <input class="text_field datepicker short" name="date" size="16" type="text" maxlength="16" value="<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reservation_data']->value['date'],"Y-m-d H:i");?>
<?php }?>"/>
    		      <label>YYYY-MM-DD HH:MM</label>
    		</span>
    		<span>
    		      <img src="iscaffold/images/calendar.png" class="icon" alt="Pick date." />
    		</span>
    		<p class="instruct">Fecha de la reserva</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['state'];?>
<span class="error">*</span></label>
            <span class="error">can't be blank</span>
        	<div class="block">
        	<span class="left">
        		<select class="field select addr" name="state" >
                    <option value="0"></option>
                    <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['metadata']->value['state']['enum_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value['state'])){?><?php if ($_smarty_tpl->tpl_vars['reservation_data']->value==$_smarty_tpl->tpl_vars['metadata']->value['state']['enum_names'][$_smarty_tpl->tpl_vars['k']->value]){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['metadata']->value['state']['enum_names'][$_smarty_tpl->tpl_vars['k']->value];?>
</option>
                    <?php } ?>
            	</select>
            </span>
            </div>
    		<p class="instruct">Estado de la reserva</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['reservation_fields']->value['more'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['reservation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['reservation_data']->value['more'];?>
<?php }?>" name="more" />
    		</div>
    		<p class="instruct">Mas información</p>
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
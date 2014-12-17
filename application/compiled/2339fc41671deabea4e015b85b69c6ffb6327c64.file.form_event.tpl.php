<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 16:44:04
         compiled from "application/views/form_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2435092575491a4c4f0db52-30178172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2339fc41671deabea4e015b85b69c6ffb6327c64' => 
    array (
      0 => 'application/views/form_event.tpl',
      1 => 1418828990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2435092575491a4c4f0db52-30178172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'event_fields' => 0,
    'related_event' => 0,
    'rel' => 0,
    'event_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491a4c5028f5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491a4c5028f5')) {function content_5491a4c5028f5($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="event">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="event/create/">New record</a></li>
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

                        <form class="form" method='post' action='event/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['place_id'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="place_id" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_event']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['event_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['event_data']->value['place_id']==$_smarty_tpl->tpl_vars['rel']->value['event_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['event_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">Lugar del evento</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['name'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['event_data']->value['name'];?>
<?php }?>" name="name" />
    		</div>
    		<p class="instruct">Nombre del evento</p>
    	</div>
    
    	<div class="group">
        	<fieldset>
                <legend class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['photo'];?>
</legend>
                <input type="hidden" value="<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['event_data']->value['photo'];?>
<?php }?>" name="photo-original-name" />
                <?php if (isset($_smarty_tpl->tpl_vars['event_data']->value['photo'])){?>
                    <?php if (!$_smarty_tpl->tpl_vars['event_data']->value['photo']){?>
                        <p>No file uploaded</p>
                    <?php }else{ ?>
                        <p>File uploaded: <a href="uploads/<?php echo $_smarty_tpl->tpl_vars['event_data']->value['photo'];?>
"><?php echo $_smarty_tpl->tpl_vars['event_data']->value['photo'];?>
</a></p>
                    <?php }?>
                <?php }?>
                <input class="field file" type="file" name="photo" />
        		<p class="instruct">Foto del evento</p>
        	</fieldset>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['dateTime'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['event_data']->value['dateTime'];?>
<?php }?>" name="dateTime" />
    		</div>
    		<p class="instruct">Fecha y Hora del evento</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['delete'];?>
<span class="error">*</span></label>
            <input class="field checkbox" type="checkbox" value="1" name="delete"<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['event_data']->value['delete']==1){?> checked="checked"<?php }?><?php }?> />

    		
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
<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 17:46:33
         compiled from "application/views/form_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16511862045491b1756cc522-58976327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2339fc41671deabea4e015b85b69c6ffb6327c64' => 
    array (
      0 => 'application/views/form_event.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16511862045491b1756cc522-58976327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b175725b4',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'event_fields' => 0,
    'event_data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b175725b4')) {function content_5491b175725b4($_smarty_tpl) {?><div class="block" id="block-tables">

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
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['event_fields']->value['placeID'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['event_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['event_data']->value['placeID'];?>
<?php }?>" name="placeID" />
    		</div>
    		<p class="instruct">Id del lugar</p>
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
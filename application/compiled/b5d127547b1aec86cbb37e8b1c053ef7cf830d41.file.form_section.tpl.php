<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 17:59:40
         compiled from "application/views/form_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12760639325491b67c0a2426-58678556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5d127547b1aec86cbb37e8b1c053ef7cf830d41' => 
    array (
      0 => 'application/views/form_section.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12760639325491b67c0a2426-58678556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'section_fields' => 0,
    'section_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b67c0e1d9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b67c0e1d9')) {function content_5491b67c0e1d9($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="section">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="section/create/">New record</a></li>
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

                        <form class="form" method='post' action='section/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['rows'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['section_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['section_data']->value['rows'];?>
<?php }?>" name="rows" />
    		</div>
    		<p class="instruct">Numero de filas de la seccion</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['seats_per_rows'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['section_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['section_data']->value['seats_per_rows'];?>
<?php }?>" name="seats_per_rows" />
    		</div>
    		<p class="instruct">Numero de sillas por fila</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['price'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['section_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['section_data']->value['price'];?>
<?php }?>" name="price" />
    		</div>
    		<p class="instruct">Precio de la seccion</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['section_fields']->value['description'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['section_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['section_data']->value['description'];?>
<?php }?>" name="description" />
    		</div>
    		<p class="instruct">Descripcion de la seccion</p>
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
<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 17:47:03
         compiled from "application/views/form_seat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11299139725491b3873ff597-11972340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '791466f3386dc79fffd8c7d347e7158bbc63ccaa' => 
    array (
      0 => 'application/views/form_seat.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11299139725491b3873ff597-11972340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'seat_fields' => 0,
    'related_section' => 0,
    'rel' => 0,
    'seat_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491b3874450f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491b3874450f')) {function content_5491b3874450f($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="seat">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="seat/create/">New record</a></li>
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

                        <form class="form" method='post' action='seat/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['sectionID'];?>
<span class="error">*</span></label>
    		<select class="field select addr" name="sectionID" >
                <option value="0"></option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_section']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['section_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['seat_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['seat_data']->value['sectionID']==$_smarty_tpl->tpl_vars['rel']->value['section_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['section_name'];?>
</option>
                <?php } ?>
        	</select>
    		<p class="instruct">ID de la sección a la que pertenece</p>
        </div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['number_row'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['seat_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['seat_data']->value['number_row'];?>
<?php }?>" name="number_row" />
    		</div>
    		<p class="instruct">Numero de la fila donde esta la silla</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['number_seat'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['seat_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['seat_data']->value['number_seat'];?>
<?php }?>" name="number_seat" />
    		</div>
    		<p class="instruct">Numero de silla</p>
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['seat_fields']->value['occupied'];?>
<span class="error">*</span></label>
            <input class="field checkbox" type="checkbox" value="1" name="occupied"<?php if (isset($_smarty_tpl->tpl_vars['seat_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['seat_data']->value['occupied']==1){?> checked="checked"<?php }?><?php }?> />

    		<p class="instruct">Si la silla ya esta ocupada</p>
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
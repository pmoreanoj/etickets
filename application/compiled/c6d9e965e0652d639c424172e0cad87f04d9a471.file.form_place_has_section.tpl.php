<?php /* Smarty version Smarty-3.1.7, created on 2014-12-20 23:22:57
         compiled from "application/views/form_place_has_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7396941775495f3e772e9b8-76780969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6d9e965e0652d639c424172e0cad87f04d9a471' => 
    array (
      0 => 'application/views/form_place_has_section.tpl',
      1 => 1419114173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7396941775495f3e772e9b8-76780969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5495f3e7765b5',
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'place_has_section_fields' => 0,
    'related_section' => 0,
    'rel' => 0,
    'place_has_section_data' => 0,
    'related_place' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495f3e7765b5')) {function content_5495f3e7765b5($_smarty_tpl) {?><div class="block" id="block-tables">

    <div class="secondary-navigation">
        <ul class="wat-cf">
            <li class="first"><a href="place_has_section">Listing</a></li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="place_has_section/create/">New record</a></li>
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

            <form class="form" method='post' action='place_has_section/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">


                <div class="group">
                    <label class="label"><?php echo $_smarty_tpl->tpl_vars['place_has_section_fields']->value['sectionID'];?>
<span class="error">*</span></label>
                    <select class="field select addr" name="sectionID" >
                        <option value="0"></option>
                        <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_section']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['section_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['place_has_section_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['place_has_section_data']->value['sectionID']==$_smarty_tpl->tpl_vars['rel']->value['section_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['section_name'];?>
</option>
                        <?php } ?>
                    </select>
                    
                    <label class="label"><?php echo $_smarty_tpl->tpl_vars['place_has_section_fields']->value['placeID'];?>
<span class="error">*</span></label>
                    <select class="field select addr" name="placeID" >
                        <option value="0"></option>
                        <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_place']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['place_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['place_has_section_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['place_has_section_data']->value['placeID']==$_smarty_tpl->tpl_vars['rel']->value['place_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['place_name'];?>
</option>
                        <?php } ?>
                    </select>

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
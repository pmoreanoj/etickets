<?php /* Smarty version Smarty-3.1.7, created on 2014-12-17 18:58:36
         compiled from "application/views/form_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3935106075491c44c5a8f93-73430805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7967ac88265606bd1ec936c53f92c8cfede7ae4' => 
    array (
      0 => 'application/views/form_login.tpl',
      1 => 1418834713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3935106075491c44c5a8f93-73430805',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5491c44c5aca1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491c44c5aca1')) {function content_5491c44c5aca1($_smarty_tpl) {?>
    <div id="box">
      <div class="block" id="block-login">
        <h2>Please login</h2>
        <div class="content login">
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
          <div class="flash">
            <div class="message error">
              <p>Incorrect username or password!</p>
            </div>
          </div>
		<?php }?>
          <form action="login/validate" class="form login" method="post" enctype="multipart/form-data">
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Login</label>
              </div>
              <div class="right">
                <input type="text" name="user" class="text_field" />
              </div>
            </div>
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Password</label>
              </div>
              <div class="right">
                <input type="password" name="pass" class="text_field" />
              </div>
            </div>
            <div class="group navform wat-cf">
              <div class="right">
                <button class="button" type="submit">
                  <img src="iscaffold/backend_skins/images/icons/key.png" alt="Save" /> Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
<?php }} ?>
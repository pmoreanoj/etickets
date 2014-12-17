<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="user/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        {if $action_mode == 'create'}
                            <h3>Add new record</h3>
                        {else}
                            <h3>Edit record: #{$record_id}</h3>
                        {/if}
                        {if isset($errors)}
                            <div class="flash">
                                <div class="message error">
                                    <p>{$errors}</p>
                                </div>
                            </div>
                        {/if}

                        <form class="form" method='post' action='user/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$user_fields.password}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_data)}{$user_data.password}{/if}" name="password" />
    		</div>
    		<p class="instruct">Contrasena del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_fields.roleID}<span class="error">*</span></label>
    		<select class="field select addr" name="roleID" >
                <option value="0"></option>
                {foreach $related_role as $rel}
                    <option value="{$rel.role_id}"{if isset($user_data)}{if $user_data.roleID == $rel.role_id} selected="selected"{/if}{/if}>{$rel.role_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">Rol del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label">{$user_fields.name}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_data)}{$user_data.name}{/if}" name="name" />
    		</div>
    		<p class="instruct">Nombre completo del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_fields.email}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_data)}{$user_data.email}{/if}" name="email" />
    		</div>
    		<p class="instruct">E-mail del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_fields.username}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_data)}{$user_data.username}{/if}" name="username" />
    		</div>
    		<p class="instruct">Usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_fields.delete}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_data)}{$user_data.delete}{/if}" name="delete" />
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

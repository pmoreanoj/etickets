<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user_profile">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="user_profile/create/">New record</a></li>
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

                        <form class="form" method='post' action='user_profile/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$user_profile_fields.userID}<span class="error">*</span></label>
    		<select class="field select addr" name="userID" >
                <option value="0"></option>
                {foreach $related_user as $rel}
                    <option value="{$rel.user_id}"{if isset($user_profile_data)}{if $user_profile_data.userID == $rel.user_id} selected="selected"{/if}{/if}>{$rel.user_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">ID del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.address}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.address}{/if}" name="address" />
    		</div>
    		<p class="instruct">Dirección del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.city}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.city}{/if}" name="city" />
    		</div>
    		<p class="instruct">Ciudad del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.province}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.province}{/if}" name="province" />
    		</div>
    		<p class="instruct">Provincia del Usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.zipcode}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.zipcode}{/if}" name="zipcode" />
    		</div>
    		<p class="instruct">Codigo Postal</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.phone}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.phone}{/if}" name="phone" />
    		</div>
    		<p class="instruct">Telefono del usuario</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$user_profile_fields.celular}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($user_profile_data)}{$user_profile_data.celular}{/if}" name="celular" />
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

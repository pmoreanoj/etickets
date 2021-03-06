<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="role">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="role/create/">New record</a></li>
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

                        <form class="form" method='post' action='role/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$role_fields.role}<span class="error">*</span></label>
            <span class="error">can't be blank</span>
        	<div class="block">
        	<span class="left">
        		<select class="field select addr" name="role" >
                    <option value="0"></option>
                    {foreach $metadata.role.enum_values as $k => $e}
                        <option value="{$e}"{if isset($role_data.role)}{if $role_data == $metadata.role.enum_names[$k]} selected="selected"{/if}{/if}>{$metadata.role.enum_names[$k]}</option>
                    {/foreach}
            	</select>
            </span>
            </div>
    		<p class="instruct">Nombre del Rol</p>
        </div>
    
    	<div class="group">
            <label class="label">{$role_fields.default}<span class="error">*</span></label>
            <input class="field checkbox" type="checkbox" value="1" name="default"{if isset($role_data)}{if $role_data.default == 1} checked="checked"{/if}{/if} />

    		<p class="instruct">Rol por defecto</p>
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

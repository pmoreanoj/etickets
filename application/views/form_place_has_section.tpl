<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="place_has_section">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="place_has_section/create/">New record</a></li>
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

                        <form class="form" method='post' action='place_has_section/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$place_has_section_fields.section_id}<span class="error">*</span></label>
    		<select class="field select addr" name="section_id" >
                <option value="0"></option>
                {foreach $related_user_profile as $rel}
                    <option value="{$rel.user_profile_id}"{if isset($place_has_section_data)}{if $place_has_section_data.section_id == $rel.user_profile_id} selected="selected"{/if}{/if}>{$rel.user_profile_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">Seccion</p>
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

<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="seat">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="seat/create/">New record</a></li>
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

                        <form class="form" method='post' action='seat/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$seat_fields.section_id}<span class="error">*</span></label>
    		<select class="field select addr" name="section_id" >
                <option value="0"></option>
                {foreach $related_user_profile as $rel}
                    <option value="{$rel.user_profile_id}"{if isset($seat_data)}{if $seat_data.section_id == $rel.user_profile_id} selected="selected"{/if}{/if}>{$rel.user_profile_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">Sección a la que pertenece la silla</p>
        </div>
    
    	<div class="group">
            <label class="label">{$seat_fields.number_row}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($seat_data)}{$seat_data.number_row}{/if}" name="number_row" />
    		</div>
    		<p class="instruct">Numero de fila donde esta la silla</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$seat_fields.number_seat}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($seat_data)}{$seat_data.number_seat}{/if}" name="number_seat" />
    		</div>
    		<p class="instruct">Numero de la silla</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$seat_fields.occupied}<span class="error">*</span></label>
            <input class="field checkbox" type="checkbox" value="1" name="occupied"{if isset($seat_data)}{if $seat_data.occupied == 1} checked="checked"{/if}{/if} />

    		<p class="instruct">Esta ocupada la silla</p>
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

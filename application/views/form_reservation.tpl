<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="reservation">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="reservation/create/">New record</a></li>
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

                        <form class="form" method='post' action='reservation/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$reservation_fields.userID}<span class="error">*</span></label>
    		<select class="field select addr" name="userID" >
                <option value="0"></option>
                {foreach $related_user as $rel}
                    <option value="{$rel.user_id}"{if isset($reservation_data)}{if $reservation_data.userID == $rel.user_id} selected="selected"{/if}{/if}>{$rel.user_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">ID del usuario</p>
        </div>
    
    	<div class="group">
            <label class="label">{$reservation_fields.eventID}<span class="error">*</span></label>
    		<select class="field select addr" name="eventID" >
                <option value="0"></option>
                {foreach $related_event as $rel}
                    <option value="{$rel.event_id}"{if isset($reservation_data)}{if $reservation_data.eventID == $rel.event_id} selected="selected"{/if}{/if}>{$rel.event_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">ID del evento</p>
        </div>
    
    	<div class="group">
            <label class="label">{$reservation_fields.date}<span class="error">*</span></label>
    		<span>
    		      <input class="text_field datepicker short" name="date" size="16" type="text" maxlength="16" value="{if isset($reservation_data)}{$reservation_data.date|date_format:"Y-m-d H:i"}{/if}"/>
    		      <label>YYYY-MM-DD HH:MM</label>
    		</span>
    		<span>
    		      <img src="iscaffold/images/calendar.png" class="icon" alt="Pick date." />
    		</span>
    		<p class="instruct">Fecha de la reserva</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$reservation_fields.state}<span class="error">*</span></label>
            <span class="error">can't be blank</span>
        	<div class="block">
        	<span class="left">
        		<select class="field select addr" name="state" >
                    <option value="0"></option>
                    {foreach $metadata.state.enum_values as $k => $e}
                        <option value="{$e}"{if isset($reservation_data.state)}{if $reservation_data == $metadata.state.enum_names[$k]} selected="selected"{/if}{/if}>{$metadata.state.enum_names[$k]}</option>
                    {/foreach}
            	</select>
            </span>
            </div>
    		<p class="instruct">Estado de la reserva</p>
        </div>
    
    	<div class="group">
            <label class="label">{$reservation_fields.more}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($reservation_data)}{$reservation_data.more}{/if}" name="more" />
    		</div>
    		<p class="instruct">Mas información</p>
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

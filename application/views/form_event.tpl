<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="event">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="event/create/">New record</a></li>
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

                        <form class="form" method='post' action='event/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$event_fields.name}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($event_data)}{$event_data.name}{/if}" name="name" />
    		</div>
    		<p class="instruct">Nombre del Evento</p>
    	</div>
    
    	<div class="group">
        	<fieldset>
                <legend class="label">{$event_fields.photo}</legend>
                <input type="hidden" value="{if isset($event_data)}{$event_data.photo}{/if}" name="photo-original-name" />
                {if isset($event_data.photo)}
                    {if !$event_data.photo}
                        <p>No file uploaded</p>
                    {else}
                        <p>File uploaded: <a href="uploads/{$event_data.photo}">{$event_data.photo}</a></p>
                    {/if}
                {/if}
                <input class="field file" type="file" name="photo" />
        		<p class="instruct">Foto del evento</p>
        	</fieldset>
    	</div>
    
    	<div class="group">
            <label class="label">{$event_fields.dateTime}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($event_data)}{$event_data.dateTime}{/if}" name="dateTime" />
    		</div>
    		<p class="instruct">Fecha del evento</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$event_fields.delete}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($event_data)}{$event_data.delete}{/if}" name="delete" />
    		</div>
    		<p class="instruct">El evento esta borrado</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$event_fields.categoryID}<span class="error">*</span></label>
    		<select class="field select addr" name="categoryID" >
                <option value="0"></option>
                {foreach $related_category as $rel}
                    <option value="{$rel.category_id}"{if isset($event_data)}{if $event_data.categoryID == $rel.category_id} selected="selected"{/if}{/if}>{$rel.category_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">Categoria que pertenece el evento</p>
        </div>
    
    	<div class="group">
            <label class="label">{$event_fields.placeID}<span class="error">*</span></label>
    		<select class="field select addr" name="placeID" >
                <option value="0"></option>
                {foreach $related_place as $rel}
                    <option value="{$rel.place_id}"{if isset($event_data)}{if $event_data.placeID == $rel.place_id} selected="selected"{/if}{/if}>{$rel.place_name}</option>
                {/foreach}
        	</select>
    		<p class="instruct">Id del lugar</p>
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

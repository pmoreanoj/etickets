<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="place">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="place/create/">New record</a></li>
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

                        <form class="form" method='post' action='place/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$place_fields.name}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($place_data)}{$place_data.name}{/if}" name="name" />
    		</div>
    		<p class="instruct">Nombre del lugar</p>
    	</div>
    
    	<div class="group">
        	<fieldset>
                <legend class="label">{$place_fields.photo}</legend>
                <input type="hidden" value="{if isset($place_data)}{$place_data.photo}{/if}" name="photo-original-name" />
                {if isset($place_data.photo)}
                    {if !$place_data.photo}
                        <p>No file uploaded</p>
                    {else}
                        <p>File uploaded: <a href="uploads/{$place_data.photo}">{$place_data.photo}</a></p>
                    {/if}
                {/if}
                <input class="field file" type="file" name="photo" />
        		<p class="instruct">Foto del Lugar</p>
        	</fieldset>
    	</div>
    
    	<div class="group">
            <label class="label">{$place_fields.description}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($place_data)}{$place_data.description}{/if}" name="description" />
    		</div>
    		<p class="instruct">Desripcion del Lugar</p>
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

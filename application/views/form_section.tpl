<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="section">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="section/create/">New record</a></li>
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

                        <form class="form" method='post' action='section/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$section_fields.rows}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($section_data)}{$section_data.rows}{/if}" name="rows" />
    		</div>
    		<p class="instruct">Numero de filas de la seccion</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$section_fields.seats_per_rows}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($section_data)}{$section_data.seats_per_rows}{/if}" name="seats_per_rows" />
    		</div>
    		<p class="instruct">Numero de sillas por fila</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$section_fields.price}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($section_data)}{$section_data.price}{/if}" name="price" />
    		</div>
    		<p class="instruct">Precio de la seccion</p>
    	</div>
    
    	<div class="group">
            <label class="label">{$section_fields.description}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($section_data)}{$section_data.description}{/if}" name="description" />
    		</div>
    		<p class="instruct">Descripcion de la seccion</p>
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

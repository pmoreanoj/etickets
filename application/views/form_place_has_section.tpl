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
                    <label class="label">{$place_has_section_fields.sectionID}<span class="error">*</span></label>
                    <select class="field select addr" name="sectionID" >
                        <option value="0"></option>
                        {foreach $related_section as $rel}
                            <option value="{$rel.section_id}"{if isset($place_has_section_data)}{if $place_has_section_data.sectionID == $rel.section_id} selected="selected"{/if}{/if}>{$rel.section_name}</option>
                        {/foreach}
                    </select>
                    
                    <label class="label">{$place_has_section_fields.placeID}<span class="error">*</span></label>
                    <select class="field select addr" name="placeID" >
                        <option value="0"></option>
                        {foreach $related_place as $rel}
                            <option value="{$rel.place_id}"{if isset($place_has_section_data)}{if $place_has_section_data.placeID == $rel.place_id} selected="selected"{/if}{/if}>{$rel.place_name}</option>
                        {/foreach}
                    </select>

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

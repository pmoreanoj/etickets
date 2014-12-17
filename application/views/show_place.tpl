<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="place">Listing</a></li>
                        <li><a href="place/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$place_fields.place_id}:</td>
                            <td>{$place_data.place_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$place_fields.name}:</td>
                            <td>{$place_data.name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$place_fields.photo}:</td>
                            <td>{$place_data.photo}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$place_fields.description}:</td>
                            <td>{$place_data.description}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="place/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

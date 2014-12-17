<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="event">Listing</a></li>
                        <li><a href="event/create/">New record</a></li>
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
                            <td>{$event_fields.event_id}:</td>
                            <td>{$event_data.event_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$event_fields.placeID}:</td>
                            <td>{$event_data.placeID}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$event_fields.name}:</td>
                            <td>{$event_data.name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$event_fields.photo}:</td>
                            <td>{$event_data.photo}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$event_fields.dateTime}:</td>
                            <td>{$event_data.dateTime}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$event_fields.delete}:</td>
                            <td>{$event_data.delete}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="event/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="reservation">Listing</a></li>
                        <li><a href="reservation/create/">New record</a></li>
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
                            <td>{$reservation_fields.reservation_id}:</td>
                            <td>{$reservation_data.reservation_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$reservation_fields.userID}:</td>
                            <td>{$reservation_data.userID}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$reservation_fields.eventID}:</td>
                            <td>{$reservation_data.eventID}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$reservation_fields.date}:</td>
                            <td>{$reservation_data.date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$reservation_fields.state}:</td>
                            <td>{$reservation_data.state}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$reservation_fields.more}:</td>
                            <td>{$reservation_data.more}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="reservation/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

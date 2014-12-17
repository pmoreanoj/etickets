<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="seat">Listing</a></li>
                        <li><a href="seat/create/">New record</a></li>
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
                            <td>{$seat_fields.id}:</td>
                            <td>{$seat_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$seat_fields.section_id}:</td>
                            <td>{$seat_data.section_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$seat_fields.number_row}:</td>
                            <td>{$seat_data.number_row}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$seat_fields.number_seat}:</td>
                            <td>{$seat_data.number_seat}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$seat_fields.occupied}:</td>
                            <td>{$seat_data.occupied}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="seat/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

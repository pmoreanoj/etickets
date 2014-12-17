<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="section">Listing</a></li>
                        <li><a href="section/create/">New record</a></li>
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
                            <td>{$section_fields.section_id}:</td>
                            <td>{$section_data.section_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$section_fields.rows}:</td>
                            <td>{$section_data.rows}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$section_fields.seats_per_rows}:</td>
                            <td>{$section_data.seats_per_rows}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$section_fields.price}:</td>
                            <td>{$section_data.price}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$section_fields.description}:</td>
                            <td>{$section_data.description}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="section/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

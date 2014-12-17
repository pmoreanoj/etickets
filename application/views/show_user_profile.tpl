<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user_profile">Listing</a></li>
                        <li><a href="user_profile/create/">New record</a></li>
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
                            <td>{$user_profile_fields.profile_id}:</td>
                            <td>{$user_profile_data.profile_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.userID}:</td>
                            <td>{$user_profile_data.userID}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.address}:</td>
                            <td>{$user_profile_data.address}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.city}:</td>
                            <td>{$user_profile_data.city}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.province}:</td>
                            <td>{$user_profile_data.province}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.zipcode}:</td>
                            <td>{$user_profile_data.zipcode}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.phone}:</td>
                            <td>{$user_profile_data.phone}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_profile_fields.celular}:</td>
                            <td>{$user_profile_data.celular}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="user_profile/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

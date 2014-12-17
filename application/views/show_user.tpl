<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="user">Listing</a></li>
                        <li><a href="user/create/">New record</a></li>
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
                            <td>{$user_fields.user_id}:</td>
                            <td>{$user_data.user_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.password}:</td>
                            <td>{$user_data.password}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.roleID}:</td>
                            <td>{$user_data.roleID}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.name}:</td>
                            <td>{$user_data.name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.email}:</td>
                            <td>{$user_data.email}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.username}:</td>
                            <td>{$user_data.username}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$user_fields.delete}:</td>
                            <td>{$user_data.delete}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="user/edit/{$id}">
                                    <img src="iscaffold/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

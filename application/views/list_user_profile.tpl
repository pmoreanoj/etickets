<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="user_profile">Listing</a></li>
                        <li><a href="user_profile/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $user_profile_data )}
                        <form action="user_profile/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$user_profile_fields.profile_id}</th>
			<th>{$user_profile_fields.userID}</th>
			<th>{$user_profile_fields.address}</th>
			<th>{$user_profile_fields.city}</th>
			<th>{$user_profile_fields.province}</th>
			<th>{$user_profile_fields.zipcode}</th>
			<th>{$user_profile_fields.phone}</th>
			<th>{$user_profile_fields.celular}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $user_profile_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.profile_id}" /></td>
                                            				<td>{$row.profile_id}</td>
				<td>{$row.userID}</td>
				<td>{$row.address}</td>
				<td>{$row.city}</td>
				<td>{$row.province}</td>
				<td>{$row.zipcode}</td>
				<td>{$row.phone}</td>
				<td>{$row.celular}</td>

                                            <td width="80">
                                                <a href="user_profile/show/{$row.profile_id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="user_profile/edit/{$row.profile_id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('user_profile/delete/{$row.profile_id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
                                            </td>
                            		    </tr>
                                	{/foreach}
                            	</tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="button" type="submit">
                                        <img src="iscaffold/backend_skins/images/icons/cross.png" alt="Delete"> Delete selected
                                    </button>
                                </div>
                                <div class="pagination">
                                    {$pager}
                                </div>
                            </div>
                        </form>
                        {else}
                            No records found.
                        {/if}

                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->

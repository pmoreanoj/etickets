<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="user">Listing</a></li>
                        <li><a href="user/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $user_data )}
                        <form action="user/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$user_fields.password}</th>
			<th>{$user_fields.id}</th>
			<th>{$user_fields.name}</th>
			<th>{$user_fields.email}</th>
			<th>{$user_fields.username}</th>
			<th>{$user_fields.role_id}</th>
			<th>{$user_fields.delete}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $user_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.password}" /></td>
                                            				<td>{$row.password}</td>
				<td>{$row.id}</td>
				<td>{$row.name}</td>
				<td>{$row.email}</td>
				<td>{$row.username}</td>
				<td>{$row.role_id}</td>
				<td>{$row.delete}</td>

                                            <td width="80">
                                                <a href="user/show/{$row.password}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="user/edit/{$row.password}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('user/delete/{$row.password}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

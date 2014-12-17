<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="event">Listing</a></li>
                        <li><a href="event/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $event_data )}
                        <form action="event/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$event_fields.id}</th>
			<th>{$event_fields.place_id}</th>
			<th>{$event_fields.name}</th>
			<th>{$event_fields.photo}</th>
			<th>{$event_fields.dateTime}</th>
			<th>{$event_fields.delete}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $event_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                            				<td>{$row.id}</td>
				<td>{$row.place_id}</td>
				<td>{$row.name}</td>
				<td>{$row.photo}</td>
				<td>{$row.dateTime}</td>
				<td>{$row.delete}</td>

                                            <td width="80">
                                                <a href="event/show/{$row.id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="event/edit/{$row.id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('event/delete/{$row.id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

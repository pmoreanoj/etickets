<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="reservation">Listing</a></li>
                        <li><a href="reservation/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $reservation_data )}
                        <form action="reservation/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$reservation_fields.confirmation}</th>
			<th>{$reservation_fields.bank}</th>
			<th>{$reservation_fields.reservation_id}</th>
			<th>{$reservation_fields.userID}</th>
			<th>{$reservation_fields.eventID}</th>
			<th>{$reservation_fields.date}</th>
			<th>{$reservation_fields.state}</th>
			<th>{$reservation_fields.more}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $reservation_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.confirmation}" /></td>
                                            				<td>{$row.confirmation}</td>
				<td>{$row.bank}</td>
				<td>{$row.reservation_id}</td>
				<td>{$row.userID}</td>
				<td>{$row.eventID}</td>
				<td>{$row.date}</td>
				<td>{$row.state}</td>
				<td>{$row.more}</td>

                                            <td width="80">
                                                <a href="reservation/show/{$row.confirmation}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="reservation/edit/{$row.confirmation}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('reservation/delete/{$row.confirmation}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

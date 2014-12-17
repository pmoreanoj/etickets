<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="seat">Listing</a></li>
                        <li><a href="seat/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $seat_data )}
                        <form action="seat/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$seat_fields.id}</th>
			<th>{$seat_fields.section_id}</th>
			<th>{$seat_fields.number_row}</th>
			<th>{$seat_fields.number_seat}</th>
			<th>{$seat_fields.occupied}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $seat_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                            				<td>{$row.id}</td>
				<td>{$row.section_id}</td>
				<td>{$row.number_row}</td>
				<td>{$row.number_seat}</td>
				<td>{$row.occupied}</td>

                                            <td width="80">
                                                <a href="seat/show/{$row.id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="seat/edit/{$row.id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('seat/delete/{$row.id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

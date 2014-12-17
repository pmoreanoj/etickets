<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="section">Listing</a></li>
                        <li><a href="section/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $section_data )}
                        <form action="section/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$section_fields.section_id}</th>
			<th>{$section_fields.rows}</th>
			<th>{$section_fields.seats_per_rows}</th>
			<th>{$section_fields.price}</th>
			<th>{$section_fields.description}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $section_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.section_id}" /></td>
                                            				<td>{$row.section_id}</td>
				<td>{$row.rows}</td>
				<td>{$row.seats_per_rows}</td>
				<td>{$row.price}</td>
				<td>{$row.description}</td>

                                            <td width="80">
                                                <a href="section/show/{$row.section_id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="section/edit/{$row.section_id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('section/delete/{$row.section_id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

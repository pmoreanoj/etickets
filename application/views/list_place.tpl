<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="place">Listing</a></li>
                        <li><a href="place/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $place_data )}
                        <form action="place/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$place_fields.id}</th>
			<th>{$place_fields.name}</th>
			<th>{$place_fields.photo}</th>
			<th>{$place_fields.description}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $place_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                            				<td>{$row.id}</td>
				<td>{$row.name}</td>
				<td>{$row.photo}</td>
				<td>{$row.description}</td>

                                            <td width="80">
                                                <a href="place/show/{$row.id}"><img src="iscaffold/images/view.png" alt="Show record" /></a>
                                                <a href="place/edit/{$row.id}"><img src="iscaffold/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('place/delete/{$row.id}')"><img src="iscaffold/images/delete.png" alt="Delete record" /></a>
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

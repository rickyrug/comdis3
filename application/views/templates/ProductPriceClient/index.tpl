{block name=centralContainer}
    <h1 class="page-header">{$data['config_prod_prices_label']}</h1>
    <div class="row">
        <div class="col-md-12 ">
            <div id="toolbar">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <a href="{$base_url}/index.php/Adminindex" class="btn btn-default">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>{$data['home_label']}</a>
                    </div>
                    <div class="form-group">
                        <a href="{$base_url}/index.php/ProductPriceClient/addView" class="btn btn-default">{$data['add_label']}</a>
                    </div>

                </div>
            </div>

            <table 
                data-toggle="table"
                data-sort-name="ID"
                data-search="true"
                data-pagination="true"
                data-page-size="5"
                data-toolbar="#toolbar"
                id="clientstbl"
                >
                <thead>
                    <tr>
                        <th data-field="ID" data-sortable="true" >{$data['id_label']}</th>
                        <th>{$data['client_label']}</th>
                        <th>{$data['product_label']}</th>
                        <th data-sortable="true">{$data['validdatedue_label']}</th>
                        <th>{$data['price_label']}</th>
                        <th>{$data['actions_label']}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$data['clientspricesList'] item=row}
                        <tr>
                            <td id='idclients_prices'>{$row->idclients_prices}</td>
                            <td>{$row->idclient}</td>
                            <td>{$row->idproduct}</td>
                            <td>{$row->valid_date_due|date_format:"%Y-%m-%d"}</td>
                            <td>{$row->price}</td>
                            <td>
                                <a href="{$base_url}/index.php/ProductPriceClient/updateView/{$row->idclient}"
                                   class="btn btn-default">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="{$base_url}/index.php/ProductPriceClient/deleteView/{$row->idclient}"type="button"  class="btn btn-default">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>

                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>

    </div>
                       


{/block}


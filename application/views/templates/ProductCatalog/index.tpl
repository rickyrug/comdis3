{block name=centralContainer}
    <h1 class="page-header">{$data['title_products']}</h1>
    <div id="toolbar">
        <div class="form-inline" role="form">
            <div class="form-group">
                <a href="{$base_url}/index.php/ProductCatalog/addView" class="btn btn-default">{$data['add_label']}</a>
            </div>
        </div>
    </div>
    
    <table 
        data-toggle="table"
        data-sort-name="ID"
        data-search="true"
        data-pagination="true"
        data-page-size="25"
        data-toolbar="#toolbar"
        >
        <thead>
            <tr>
                <th data-field="ID" data-sortable="true" >{$data['id_label']}</th>
                <th>{$data['name_label']}</th>
                <th>{$data['code_label']}</th>
                <th>{$data['status_label']}</th>
                <th>{$data['actions_label']}</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$data['productsList'] item=row}
                <tr>
                    <td id='idproduct'>{$row->idproduct}</td>
                    <td>{$row->name}</td>
                    <td>{$row->code}</td>
                    <td>{$row->status}</td>
                    <td>
                        <a href="{$base_url}/index.php/ProductCatalog/updateView/{$row->idproduct}"
                           class="btn btn-default">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                           <a href="{$base_url}/index.php/ProductCatalog/deleteView/{$row->idproduct}"type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{/block}
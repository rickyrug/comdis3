{block name=centralContainer}
    <h1 class="page-header">{$data['title_variables']}</h1>
    <div id="toolbar">
        <div class="form-inline" role="form">
            <div class="form-group">
                <a href="{$base_url}/index.php/Adminindex" class="btn btn-default">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>{$data['home_label']}</a>
            </div>
            <div class="form-group">
                <a href="{$base_url}/index.php/VariablesCatalog/addView" class="btn btn-default">{$data['add_label']}</a>
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
        >
        <thead>
            <tr>
                <th data-field="ID" data-sortable="true" >{$data['id_label']}</th>
                <th>{$data['description_label']}</th>
                <th>{$data['status_label']}</th>
                <th>{$data['actions_label']}</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$data['variablesList'] item=row}
                <tr>
                    <td id='idvariable'>{$row->idvariable}</td>
                    <td>{$row->description}</td>
                    <td>{$row->status}</td>
                    <td>
                        <a href="{$base_url}/index.php/VariablesCatalog/updateView/{$row->idvariable}"
                           class="btn btn-default">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                           <a href="{$base_url}/index.php/VariablesCatalog/deleteView/{$row->idvariable}"type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{/block}
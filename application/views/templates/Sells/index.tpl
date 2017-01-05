{block name=centralContainer}
    <h1 class="page-header">{$data['title_sell']}</h1>
    <div class="row">
        <div class="col-md-6">
            <h3 class="title">Search</h3>
            <div class="row">
                <label>By ID  </label>
                <div class="form-inline">
                    <div class="form-group">
                        
                        <input type="text" name="id_sells" value="" class="form-control" placeholder="Sells Id"/>
                         <input type="button" value="Search" class="btn btn-primary"/>
                    </div>  
                </div>

                
            </div>
            <div class="row">
                <label>By Dates</label>
                <div class="form-inline">
                    <div class="form-group">
                        
                        <input type="text" name="start_date" value="" class="form-control" placeholder="Start Date"/>
                        <input type="text" name="end_date" value="" class="form-control" placeholder="End Date"/>
                        <input type="button" value="Search" class="btn btn-primary"/>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="title">Sells Bill</h3>
            <div id="toolbar">
                <div class="form-inline" role="form">

                    <div class="form-group">
                        <a href="{$base_url}/index.php/Sells/addView" class="btn btn-default">{$data['add_label']}</a>
                    </div>
                </div>
            </div>
            <div class="row">
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
                            <th>{$data['name_label']}</th>
                            <th>{$data['actions_label']}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$data['clientsList'] item=row}
                            <tr>
                                <td id='idcliente'>{$row->idclient}</td>
                                <td>{$row->name}</td>
                                <td>
                                    <a href="{$base_url}/index.php/Sells/addView/{$row->idclient}"
                                       class="btn btn-default">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12"></div>
    </div>
{/block}
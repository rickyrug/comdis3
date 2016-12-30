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
                data-search="true"
                data-pagination="true"
                
                data-toolbar="#toolbar"
                data-unique-id="idclients_prices"
                id="clientstbl"
                >
                <thead>
                    <tr>
                        <th data-field="idclients_prices"  >{$data['id_label']}</th>
                        <th data-field="idclient">{$data['client_label']}</th>
                        <th data-field="idproduct">{$data['product_label']}</th>
                        <th data-field="valid_date_due" >{$data['validdatedue_label']}</th>
                        <th data-field="price">{$data['price_label']}</th>
                        <th >{$data['actions_label']}</th>
                    </tr>
                </thead>
                   <tbody>
                    {foreach from=$data['clientspricesList'] item=row}
                        <tr>
                            <td>{$row->idclients_prices}</td>
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
  {literal}
    <script type="text/javascript">
        //turn to inline mode
        var $table = $("#clientstbl");
        
      /*  $(document).ready(function(){
            $.get("http://localhost/comdis//index.php/ProductPriceClient/getData" ).done(function(data){
                 var jsondata = jQuery.parseJSON(data);

                $("#clientstbl").bootstrapTable("load", jsondata );
                console.log(jsondata);
             //   console.log(info);
            });
        });*/
        
         $(document).on("click", "#clientstbl tr", function (event) {
               console.log($(this "[data-uniqueid]");   
               // var table_row = $("#clientstbl").find('[data-uniqueid="' + unique_id + '"]');
              var driver_data = $('#clientstbl').bootstrapTable('getRowByUniqueId', 1);
               
                console.log(driver_data.idclients_prices);
            });

    </script>           
    {/literal}
{/block}


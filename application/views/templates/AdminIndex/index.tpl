{block name=centralContainer}
    <h1 class="page-header">{$data['title_admin']}</h1>
    
     <div class="row">
        <div class="col-xs-6 col-lg-4">
             <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>{$data['third_parties_label']}</h3>
                        </a>
                        <a href="{$base_url}/index.php/CatalogClient" class="list-group-item">{$data['title_clients']}</a>
                        <a href="{$base_url}/index.php/ProductPriceClient" class="list-group-item">{$data['config_prod_prices_label']}</a>
                        <a href="{$base_url}/index.php/CatalogSupplier" class="list-group-item">{$data['title_supplier']}</a>
            </div>
            
        </div>
        <div class="col-xs-6 col-lg-4">
           <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>{$data['configuration_label']}</h3>
                        </a>
                        <a href="{$base_url}/index.php/VariablesCatalog" class="list-group-item">{$data['title_variables']}</a>
                       
            </div>
        </div>
        <div class="col-xs-6 col-lg-4">
            <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>{$data['product_label']}</h3>
                        </a>
                        <a href="{$base_url}/index.php/ProductCatalog" class="list-group-item">{$data['title_products']}</a>
                         <a href="{$base_url}/index.php/ProductPriceClient" class="list-group-item">{$data['config_prod_prices_label']}</a>
            </div>
        </div>
    </div>
               
{/block}
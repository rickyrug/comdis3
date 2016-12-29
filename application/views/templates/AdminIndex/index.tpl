{block name=centralContainer}
    <h1 class="page-header">{$data['title_admin']}</h1>
    
     <div class="row">
        <div class="col-xs-6 col-lg-4">
             <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>Customers</h3>
                        </a>
                        <a href="{$base_url}/index.php/CatalogClient" class="list-group-item">{$data['title_clients']}</a>
                        <a href="{$base_url}/index.php/ProductPriceClient" class="list-group-item">{$data['config_prod_prices_label']}</a>
            </div>
            
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="{$base_url}/index.php/VariablesCatalog">{$data['title_variables']}</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="{$base_url}/index.php/ProductCatalog">{$data['title_products']}</a>
            </h4>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-6 col-lg-4">
            <h4><a href="{$base_url}/index.php/CatalogClient">{$data['title_clients']}</a></h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="{$base_url}/index.php/VariablesCatalog">{$data['title_variables']}</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="{$base_url}/index.php/ProductCatalog">{$data['title_products']}</a>
            </h4>
        </div>
    </div>
                
    <div class="row">
        <div class="col-xs-6 col-lg-4">
            <h4><a href="{$base_url}/index.php/CatalogSupplier">{$data['title_supplier']}</a></h4>
        </div>
       <!-- <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="{$base_url}/index.php/VariablesCatalog">{$data['title_variables']}</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="{$base_url}/index.php/ProductCatalog">{$data['title_products']}</a>
            </h4>
        </div>-->
    </div>
               
{/block}
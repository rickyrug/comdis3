{block name=centralContainer}
    <h1 class="page-header">{$data['title_sell']}</h1>
    <div class="row">
        <div class="col-xs-6 col-lg-6">
             <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>{$data['title_sell']}</h3>
                        </a>
                        <a href="{$base_url}/index.php/CatalogClient" class="list-group-item">{$data['title_clients']}</a>
                        <a href="{$base_url}/index.php/ProductPriceClient" class="list-group-item">{$data['config_prod_prices_label']}</a>
                        <a href="{$base_url}/index.php/CatalogSupplier" class="list-group-item">{$data['title_supplier']}</a>
            </div>
            
        </div>
    </div>
{/block}
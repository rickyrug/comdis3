<?php
/* Smarty version 3.1.30, created on 2016-12-29 09:18:58
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\AdminIndex\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58652962025263_82216927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cf18685e70208aa5faf7ac3e711795c25383ed3' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\AdminIndex\\index.tpl',
      1 => 1483024533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58652962025263_82216927 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_231835865296201d561_76631242', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_231835865296201d561_76631242 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_admin'];?>
</h1>
    
     <div class="row">
        <div class="col-xs-6 col-lg-4">
             <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                            <h3>Customers</h3>
                        </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient" class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_clients'];?>
</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/ProductPriceClient" class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['data']->value['config_prod_prices_label'];?>
</a>
            </div>
            
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/VariablesCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_variables'];?>
</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/ProductCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_products'];?>
</a>
            </h4>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-6 col-lg-4">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_clients'];?>
</a></h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/VariablesCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_variables'];?>
</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/ProductCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_products'];?>
</a>
            </h4>
        </div>
    </div>
                
    <div class="row">
        <div class="col-xs-6 col-lg-4">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogSupplier"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_supplier'];?>
</a></h4>
        </div>
       <!-- <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/VariablesCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_variables'];?>
</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/ProductCatalog"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_products'];?>
</a>
            </h4>
        </div>-->
    </div>
               
<?php
}
}
/* {/block 'centralContainer'} */
}

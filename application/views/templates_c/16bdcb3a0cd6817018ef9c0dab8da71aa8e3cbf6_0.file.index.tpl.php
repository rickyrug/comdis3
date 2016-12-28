<?php
/* Smarty version 3.1.30, created on 2016-12-28 17:56:13
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\CatalogClient\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5864511d7ccf72_96269618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16bdcb3a0cd6817018ef9c0dab8da71aa8e3cbf6' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\CatalogClient\\index.tpl',
      1 => 1482969306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5864511d7ccf72_96269618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_313565864511d7c13d5_28924320', 'centralContainer');
?>

<?php }
/* {block 'centralContainer'} */
class Block_313565864511d7c13d5_28924320 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_clients'];?>
</h1>
    <div id="toolbar">
        <div class="form-inline" role="form">
            <div class="form-group">
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/Adminindex" class="btn btn-default">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span><?php echo $_smarty_tpl->tpl_vars['data']->value['home_label'];?>
</a>
            </div>
            <div class="form-group">
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/addView" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['data']->value['add_label'];?>
</a>
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
                <th data-field="ID" data-sortable="true" ><?php echo $_smarty_tpl->tpl_vars['data']->value['id_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['name_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['rfc_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['status_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['config_prod_prices_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['actions_label'];?>
</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['clientsList'], 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <td id='idcliente'><?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->rfc;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->status;?>
</td>
                    
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/ProductCatalog/productPriceConfig/<?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
"type="button"  class="btn btn-default" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['config_prod_prices_label'];?>
" >
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/updateView/<?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
"
                           class="btn btn-default">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/deleteView/<?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
"type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                        
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
    
<?php
}
}
/* {/block 'centralContainer'} */
}

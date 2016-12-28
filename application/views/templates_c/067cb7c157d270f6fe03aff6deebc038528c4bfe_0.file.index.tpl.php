<?php
/* Smarty version 3.1.30, created on 2016-12-27 22:48:53
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/AdminIndex/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_586344355ad8b5_95526255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '067cb7c157d270f6fe03aff6deebc038528c4bfe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/AdminIndex/index.tpl',
      1 => 1482900515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586344355ad8b5_95526255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2129809884586344355aa3f6_38275700', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_2129809884586344355aa3f6_38275700 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
    <div class="row">
        <div class="col-xs-6 col-lg-4">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_clients'];?>
</a></h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h4>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_variables'];?>
</a>
            </h4>
        </div>
        <div class="col-xs-6 col-lg-4">
            <h2>Catalogo Clientes</h2>
        </div>
    </div>
<?php
}
}
/* {/block 'centralContainer'} */
}

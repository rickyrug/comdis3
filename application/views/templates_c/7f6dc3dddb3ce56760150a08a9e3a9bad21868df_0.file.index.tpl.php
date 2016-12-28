<?php
/* Smarty version 3.1.30, created on 2016-09-25 20:52:30
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/SellsIndex/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e81cee9e1bc3_13417790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f6dc3dddb3ce56760150a08a9e3a9bad21868df' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/SellsIndex/index.tpl',
      1 => 1474737621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e81cee9e1bc3_13417790 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_35698758457e81cee9df946_55045538', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_35698758457e81cee9df946_55045538 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
<?php
}
}
/* {/block 'centralContainer'} */
}

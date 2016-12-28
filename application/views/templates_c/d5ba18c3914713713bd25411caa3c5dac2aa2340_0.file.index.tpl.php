<?php
/* Smarty version 3.1.30, created on 2016-09-24 19:20:29
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/mod_sells/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e6b5dd251065_53581825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5ba18c3914713713bd25411caa3c5dac2aa2340' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/mod_sells/index.tpl',
      1 => 1474737621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e6b5dd251065_53581825 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_196594539657e6b5dd24ed47_69470631', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_196594539657e6b5dd24ed47_69470631 extends Smarty_Internal_Block
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

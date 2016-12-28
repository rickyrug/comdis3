<?php
/* Smarty version 3.1.30, created on 2016-09-24 18:58:10
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e6b0a2b031c5_44301086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9a62c733310c8506acbab3f0ac2aa1cf1338a30' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/index.tpl',
      1 => 1474736285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e6b0a2b031c5_44301086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_159619456657e6b0a2b01553_12579765', 'centralContainer');
?>

<?php }
/* {block 'centralContainer'} */
class Block_159619456657e6b0a2b01553_12579765 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <p>popo</p>
    <p><?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
</p>
    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</p>
<?php
}
}
/* {/block 'centralContainer'} */
}

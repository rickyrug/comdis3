<?php
/* Smarty version 3.1.30, created on 2016-12-28 09:36:13
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5863dbed6e97f8_60542930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e9a279f0c2ef20ad0f142a32453fdbbc387546e' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\index.tpl',
      1 => 1482938534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5863dbed6e97f8_60542930 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_157075863dbed6ddc50_77920471', 'centralContainer');
?>

<?php }
/* {block 'centralContainer'} */
class Block_157075863dbed6ddc50_77920471 extends Smarty_Internal_Block
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

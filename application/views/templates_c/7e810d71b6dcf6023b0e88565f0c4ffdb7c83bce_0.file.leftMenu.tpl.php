<?php
/* Smarty version 3.1.30, created on 2016-12-29 18:08:39
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\layout\leftMenu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5865a587d120e9_40345791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e810d71b6dcf6023b0e88565f0c4ffdb7c83bce' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\layout\\leftMenu.tpl',
      1 => 1482964592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5865a587d120e9_40345791 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_179475865a587d0e258_14169716', 'leftMenu');
}
/* {block 'leftMenu'} */
class Block_179475865a587d0e258_14169716 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <ul id="lf_main_options" class="nav nav-sidebar">
        <li ><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu']['home'];?>
">Home</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu']['admin'];?>
">Admin</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu']['sells'];?>
">Sells</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu']['purchase'];?>
">Purchases</a></li>
    </ul>
   <!-- <ul class="nav nav-sidebar">
        <li><a href="">Nav item</a></li>
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
        <li><a href="">More navigation</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
    </ul>-->
<?php
}
}
/* {/block 'leftMenu'} */
}

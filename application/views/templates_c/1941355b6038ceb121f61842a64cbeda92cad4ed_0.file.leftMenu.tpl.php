<?php
/* Smarty version 3.1.30, created on 2016-09-25 20:57:19
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/leftMenu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e81e0feb1eb6_12270935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1941355b6038ceb121f61842a64cbeda92cad4ed' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/leftMenu.tpl',
      1 => 1474829837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e81e0feb1eb6_12270935 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17899024457e81e0feaf250_58571039', 'leftMenu');
}
/* {block 'leftMenu'} */
class Block_17899024457e81e0feaf250_58571039 extends Smarty_Internal_Block
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
    <ul class="nav nav-sidebar">
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
    </ul>
<?php
}
}
/* {/block 'leftMenu'} */
}

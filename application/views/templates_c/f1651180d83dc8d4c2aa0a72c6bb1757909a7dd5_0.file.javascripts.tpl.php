<?php
/* Smarty version 3.1.30, created on 2016-12-28 09:36:13
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\layout\javascripts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5863dbed691279_38392971',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1651180d83dc8d4c2aa0a72c6bb1757909a7dd5' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\layout\\javascripts.tpl',
      1 => 1482938510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5863dbed691279_38392971 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_46935863dbed691275_82955737', 'javascripts');
}
/* {block 'javascripts'} */
class Block_46935863dbed691275_82955737 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

     
     <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstraptable/bootstrap-table.js"><?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstraptable/locale/bootstrap-table-es-MX.js"><?php echo '</script'; ?>
>
     
     <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/leftmenujs.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'javascripts'} */
}

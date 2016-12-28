<?php
/* Smarty version 3.1.30, created on 2016-10-01 17:23:40
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/javascripts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57efd4fcc2c4b4_95969393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd55d5c3145cb32aba4a29e9333abec354c25790' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/javascripts.tpl',
      1 => 1475335417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57efd4fcc2c4b4_95969393 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90830444757efd4fcc2aab6_25541097', 'javascripts');
}
/* {block 'javascripts'} */
class Block_90830444757efd4fcc2aab6_25541097 extends Smarty_Internal_Block
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

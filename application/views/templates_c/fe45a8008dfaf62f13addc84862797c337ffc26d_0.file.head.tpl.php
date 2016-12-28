<?php
/* Smarty version 3.1.30, created on 2016-10-02 21:39:27
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f1c4df5ffd59_14014361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe45a8008dfaf62f13addc84862797c337ffc26d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/head.tpl',
      1 => 1475462361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f1c4df5ffd59_14014361 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130665148057f1c4df5fb676_64338469', 'head');
}
/* {block 'head'} */
class Block_130665148057f1c4df5fb676_64338469 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>Comdis V <?php echo $_smarty_tpl->tpl_vars['CI_VERSION']->value;?>
 </title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstrap/css/bootstrap.css" />
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/dashboard.css" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstraptable/bootstrap-table.css" />
        
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/jquery/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/jqueryvalidatoren/js/bootstrapValidator.js"><?php echo '</script'; ?>
>
    </head>

<?php
}
}
/* {/block 'head'} */
}

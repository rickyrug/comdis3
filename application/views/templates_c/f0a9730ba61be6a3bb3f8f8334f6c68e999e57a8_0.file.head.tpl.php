<?php
/* Smarty version 3.1.30, created on 2016-12-28 09:36:13
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\layout\head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5863dbed9ef756_93691400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9730ba61be6a3bb3f8f8334f6c68e999e57a8' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\layout\\head.tpl',
      1 => 1482938532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5863dbed9ef756_93691400 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_140895863dbed9eb8c0_10876519', 'head');
}
/* {block 'head'} */
class Block_140895863dbed9eb8c0_10876519 extends Smarty_Internal_Block
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

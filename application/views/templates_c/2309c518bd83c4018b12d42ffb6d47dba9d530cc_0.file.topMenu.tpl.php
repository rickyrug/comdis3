<?php
/* Smarty version 3.1.30, created on 2016-12-28 22:06:04
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/topMenu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58648bac9dab61_37246778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2309c518bd83c4018b12d42ffb6d47dba9d530cc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/topMenu.tpl',
      1 => 1482984289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58648bac9dab61_37246778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62454041758648bac9d7c69_98533956', 'topMenu');
}
/* {block 'topMenu'} */
class Block_62454041758648bac9d7c69_98533956 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_app'];?>
</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <!--  <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>-->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['seach_label'];?>
">
          </form>
        </div>
      </div>
    </nav>

<?php
}
}
/* {/block 'topMenu'} */
}

<?php
/* Smarty version 3.1.30, created on 2016-09-25 01:54:21
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/mainContainer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e7122d140756_74157913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1696ab2e5a8323f42fed6d1d33d784fa35681e7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/layout/mainContainer.tpl',
      1 => 1474761255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e7122d140756_74157913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195111258857e7122d13e2e2_86709232', 'mainContainer');
}
/* {block 'leftMenu'} */
class Block_157527068757e7122d112387_87975587 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'leftMenu'} */
/* {block 'centralContainer'} */
class Block_187641780857e7122d13b191_79934594 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'centralContainer'} */
/* {block 'mainContainer'} */
class Block_195111258857e7122d13e2e2_86709232 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3 col-md-2 sidebar">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_157527068757e7122d112387_87975587', 'leftMenu', $this->tplIndex);
?>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <ol class="breadcrumb">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['breadcrumb'], 'curr_id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->value) {
?>
                       <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ol>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_187641780857e7122d13b191_79934594', 'centralContainer', $this->tplIndex);
?>

    </div>
</div>
</div>    
<?php
}
}
/* {/block 'mainContainer'} */
}

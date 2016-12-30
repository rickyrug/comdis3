<?php
/* Smarty version 3.1.30, created on 2016-12-29 18:08:39
  from "C:\Users\60044723\xampp\htdocs\comdis\application\views\templates\layout\mainContainer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5865a587dc5d57_42868251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b1fc36c9900d14afffacd7ba62dcbad1953622e' => 
    array (
      0 => 'C:\\Users\\60044723\\xampp\\htdocs\\comdis\\application\\views\\templates\\layout\\mainContainer.tpl',
      1 => 1482938513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5865a587dc5d57_42868251 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104875865a587dc1ec9_53718927', 'mainContainer');
}
/* {block 'leftMenu'} */
class Block_55215865a587d9ec07_84469114 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'leftMenu'} */
/* {block 'centralContainer'} */
class Block_33185865a587dbe045_99013163 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'centralContainer'} */
/* {block 'mainContainer'} */
class Block_104875865a587dc1ec9_53718927 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3 col-md-2 sidebar">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55215865a587d9ec07_84469114', 'leftMenu', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_33185865a587dbe045_99013163', 'centralContainer', $this->tplIndex);
?>

    </div>
</div>
</div>    
<?php
}
}
/* {/block 'mainContainer'} */
}

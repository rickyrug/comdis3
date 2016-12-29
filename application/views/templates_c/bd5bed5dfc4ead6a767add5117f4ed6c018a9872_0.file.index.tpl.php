<?php
/* Smarty version 3.1.30, created on 2016-12-28 22:06:13
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58648bb58b2ef6_09376232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd5bed5dfc4ead6a767add5117f4ed6c018a9872' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/index.tpl',
      1 => 1482984289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58648bb58b2ef6_09376232 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16714036558648bb58acc44_07341571', 'centralContainer');
?>

<?php }
/* {block 'centralContainer'} */
class Block_16714036558648bb58acc44_07341571 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title_clients'];?>
</h1>
    <div id="toolbar">
        <div class="form-inline" role="form">
            <div class="form-group">
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/Adminindex" class="btn btn-default">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span><?php echo $_smarty_tpl->tpl_vars['data']->value['home_label'];?>
</a>
            </div>
            <div class="form-group">
                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/addView" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['data']->value['add_label'];?>
</a>
            </div>
        </div>
    </div>
    
    <table 
        data-toggle="table"
        data-sort-name="ID"
        data-search="true"
        data-pagination="true"
        data-page-size="5"
        data-toolbar="#toolbar"
        >
        <thead>
            <tr>
                <th data-field="ID" data-sortable="true" ><?php echo $_smarty_tpl->tpl_vars['data']->value['id_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['name_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['rfc_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['status_label'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['data']->value['actions_label'];?>
</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['clientsList'], 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <td id='idcliente'><?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->rfc;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->status;?>
</td>
                    
                   
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/updateView/<?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
"
                           class="btn btn-default">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/deleteView/<?php echo $_smarty_tpl->tpl_vars['row']->value->idclient;?>
"type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                        
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
    
<?php
}
}
/* {/block 'centralContainer'} */
}

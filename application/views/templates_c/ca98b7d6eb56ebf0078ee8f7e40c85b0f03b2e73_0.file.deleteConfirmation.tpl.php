<?php
/* Smarty version 3.1.30, created on 2016-10-06 21:14:55
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/deleteConfirmation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f7051f6d4138_12771983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca98b7d6eb56ebf0078ee8f7e40c85b0f03b2e73' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/deleteConfirmation.tpl',
      1 => 1475806489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f7051f6d4138_12771983 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81892742657f7051f6cfa07_16770777', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_81892742657f7051f6cfa07_16770777 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
<small><?php echo $_smarty_tpl->tpl_vars['data']->value['titledeleteclient'];?>
</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient" class="alert-link"><?php echo $_smarty_tpl->tpl_vars['data']->value['return'];?>
</a>
    </div>
    <div class="jumbotron">
        <h3><?php echo $_smarty_tpl->tpl_vars['data']->value['titledeleteq'];?>
</h3>
        <input type="hidden" id="idclient" name="idclient" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['client']->idclient;?>
" />
        <p>
            <button id="btndelete" class="btn btn-primary btn-lg" href="#" role="button"><?php echo $_smarty_tpl->tpl_vars['data']->value['delete'];?>
</button>
            <a class="btn btn-default btn-lg" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient"  role="button"><?php echo $_smarty_tpl->tpl_vars['data']->value['return'];?>
</a>
        </p>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript">
        $('#btndelete').click(function(){
            var idclient =$("#idclient").val();
            var show = {};
            show['idclient'] = idclient;
            $.post(
                    "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/deleteConfirmation",
                    show
                   ).fail(function(data){
                    alert("ERRROR");   
                    }).success(function(data){
                       var obj = jQuery.parseJSON(data)
                            console.log(obj.err.code);
                            if (obj.err.code === 0) {
                                $('#msgconfirm').removeClass('hidden');
                                $('#msgconfirm').addClass('alert-success');
                                $('#btndelete').addClass('hidden');
                                $('#msgconfirm p').text(obj.confirm_msg);
                            } else {
                                $('#msgconfirm').removeClass('hidden');
                                $('#msgconfirm').addClass('alert-danger');
                              //  $('#btndelete').addClass('hidden');
                                $('#msgconfirm p').text(obj.err.message);
                            }
                   });
        });
        
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'centralContainer'} */
}

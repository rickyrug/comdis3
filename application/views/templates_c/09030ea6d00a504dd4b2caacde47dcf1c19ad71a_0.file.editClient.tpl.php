<?php
/* Smarty version 3.1.30, created on 2016-10-03 21:41:00
  from "/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/editClient.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f316bc748952_95037646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09030ea6d00a504dd4b2caacde47dcf1c19ad71a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/comdis_dev/application/views/templates/CatalogClient/editClient.tpl',
      1 => 1475548852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f316bc748952_95037646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13453884257f316bc739e44_81903650', 'centralContainer');
}
/* {block 'centralContainer'} */
class Block_13453884257f316bc739e44_81903650 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
<small><?php echo $_smarty_tpl->tpl_vars['data']->value['titleeditclient'];?>
</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient" class="alert-link"><?php echo $_smarty_tpl->tpl_vars['data']->value['return'];?>
</a>
    </div>
    <form id="clientform" action='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/updateConfirmation'>
        <input type="hidden" name="idclient" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['client']->idclient;?>
" />
        <div class="form-group">
            <label for="name"><?php echo $_smarty_tpl->tpl_vars['data']->value['name_label'];?>
</label>
            <input  type="text" class="form-control" id="name" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['name_label'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['client']->name;?>
">
        </div>
        <div class="form-group">
            <label for="rfc"><?php echo $_smarty_tpl->tpl_vars['data']->value['rfc_label'];?>
</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['rfc_label'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['client']->rfc;?>
">
        </div>
        <button id="btnsave" type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['data']->value['save'];?>
</button>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient" class="btn btn-link"><?php echo $_smarty_tpl->tpl_vars['data']->value['return'];?>
</a>
    </form>
<?php echo '<script'; ?>
 type="text/javascript" >
        
        $(document).ready(function () {
    $('#clientform')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_nvalid_name'];?>
",
                        validators: {
                            notEmpty: {
                                message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_required_name'];?>
"
                            },
                            stringLength: {
                                min: 5,
                                max: 30,
                                message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_lenght_name'];?>
"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_regex_name'];?>
"
                            }
                        }
                    },
                    rfc: {
                        message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_nvalid_rfc'];?>
",
                        validators: {
                            notEmpty: {
                                message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_required_rfc'];?>
"
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: "<?php echo $_smarty_tpl->tpl_vars['data']->value['msg_cli_lenght_rfc'];?>
"
                            },
                        }
                    }
                }
            })
            .on('success.form.bv', function (e) {
                e.preventDefault();
                var str = $("#clientform").serialize();
                var action = $("#clientform").attr('action')


                $.post(
                        action,
                        str
                        )
                        .fail(function () {

                            $.get('<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/index.php/CatalogClient/getError', function (data) {
                                console.log(data);
                                alert("Error");
                            });
                        })
                        .done(function (data) {
                            var obj = jQuery.parseJSON(data)
                            console.log(obj.err.code);
                            if (obj.err.code === 0) {
                                $('#msgconfirm').removeClass('hidden');
                                $('#msgconfirm').addClass('alert-success');
                                $('#btnsave').addClass('hidden');
                                $('#msgconfirm p').text(obj.confirm_msg);
                            } else {
                                $('#msgconfirm').removeClass('hidden');
                                $('#msgconfirm').addClass('alert-danger');
                                $('#btnsave').addClass('hidden');
                                $('#msgconfirm p').text(obj.err.message);
                            }
                        });
            });

});
        
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'centralContainer'} */
}

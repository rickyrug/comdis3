{block name=centralContainer}
  <h1 class="page-header">{$data['title_supplier']}<small>{$data['edit_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="{$base_url}/index.php/CatalogSupplier" class="alert-link">{$data['return']}</a>
    </div>
    <form id="supplierform" action='{$base_url}/index.php/CatalogSupplier/updateConfirmation'>
        <input type="hidden" name="idsupplier" value="{$data['supplier']->idsupplier}" />
        <div class="form-group">
            <label for="name">{$data['name_label']}</label>
            <input  type="text" class="form-control" id="name" name="name" placeholder="{$data['name_label']}" value="{$data['supplier']->name}">
        </div>
        <div class="form-group">
            <label for="rfc">{$data['rfc_label']}</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="{$data['rfc_label']}" value="{$data['supplier']->rfc}">
        </div>
        <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
        <a href="{$base_url}/index.php/CatalogSupplier" class="btn btn-link">{$data['return']}</a>
    </form>
<script type="text/javascript" >
        
        $(document).ready(function () {
    $('#supplierform')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        message: "{$data['msg_cli_nvalid_name']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_cli_required_name']}"
                            },
                            stringLength: {
                                min: 5,
                                max: 30,
                                message: "{$data['msg_cli_lenght_name']}"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: "{$data['msg_cli_regex_name']}"
                            }
                        }
                    },
                    rfc: {
                        message: "{$data['msg_cli_nvalid_rfc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_cli_required_rfc']}"
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: "{$data['msg_cli_lenght_rfc']}"
                            },
                        }
                    }
                }
            })
            .on('success.form.bv', function (e) {
                e.preventDefault();
                var str = $("#supplierform").serialize();
                var action = $("#supplierform").attr('action')


                $.post(
                        action,
                        str
                        )
                        .fail(function () {

                            $.get('{$base_url}/index.php/CatalogSupplier/getError', function (data) {
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
        
    </script>
{/block}
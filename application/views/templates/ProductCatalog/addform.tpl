{block name=centralContainer}
    <h1 class="page-header">{$data['title_products']}<small>{$data['add_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="{$base_url}/index.php/ProductCatalog" class="alert-link">{$data['return']}</a>
    </div>
    <form id="variableform" action='{$base_url}/index.php/ProductCatalog/addConfirmation'>
        <div class="form-group">
            <label for="code">{$data['code_label']}</label>
            <input  type="text" class="form-control" id="code" name="code" placeholder="{$data['code_label']}">
        </div>
        <div class="form-group">
            <label for="name">{$data['name_label']}</label>
            <input  type="text" class="form-control" id="name" name="name" placeholder="{$data['name_label']}">
        </div>
        <div class="form-group">
            <label for="sellprice">{$data['sell_price_label']}</label>
            <input  type="text" class="form-control" id="sellprice" name="sellprice" placeholder="{$data['sell_price_label']}">
        </div>
        <div class="form-group">
            <label for="buyprice">{$data['buy_price_label']}</label>
            <input  type="text" class="form-control" id="buyprice" name="buyprice" placeholder="{$data['buy_price_label']}">
        </div>
        <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
        <a href="{$base_url}index.php/ProductCatalog" class="btn btn-link">{$data['return']}</a>
    </form>
    <script type="text/javascript" >
        
        $(document).ready(function () {
    $('#variableform')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    code: {
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            },
                            stringLength: {
                                min: 4,
                                max: 10,
                                message: "{$data['msg_pro_lenght_code']}"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: "{$data['msg_ge_nvalid_desc']}"
                            }
                        }
                    },
                    name: {
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            },
                            stringLength: {
                                min: 1,
                                max: 255,
                                message: "{$data['msg_ge_lenght_desc']}"
                            }
                        }
                    },
                    sellprice: {
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            },
                            numeric: {
                            message: "{$data['msg_ge_nvalid_desc']}",
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                        }
                    },
                    buyprice: {
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            },
                            numeric: {
                            message: "{$data['msg_ge_nvalid_desc']}",
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                        }
                    }
                    
                }
            })
            .on('success.form.bv', function (e) {
                e.preventDefault();
                var str = $("#variableform").serialize();
                var action = $("#variableform").attr('action')


                $.post(
                        action,
                        str
                        )
                        .fail(function () {

                            $.get('{$base_url}/index.php/VariablesCatalog/getError', function (data) {
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
                               // $('#btnsave').addClass('hidden');
                                $('#msgconfirm p').text(obj.err.message);
                            }
                        });
            });

});
        
    </script>
{/block}
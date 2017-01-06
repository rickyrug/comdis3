{block name=centralContainer}
    <h1 class="page-header">{$data['config_prod_prices_label']}<small>{$data['add_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p></p>

    </div>

    <div class="row">
        <form id="sellsform" action='{$base_url}/index.php/Sells/editConfirmation'>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="idclient">{$data['client_label']}</label>

                    <select id="idclient" name="idclient" class="form-control"  placeholder="{$data['client_label']}">
                        <option value=""></option>
                        {html_options options=$client_options selected=$customer_id}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                    <label for="type">{$data['type_label']}</label>
                    <select name="type" class="form-group form-control">
                        <option value=""></option>
                        {html_options options=$type_options selected=$typeid}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                    <label for="delverydate">{$data['validdatedue_label']}</label>
                    <input  type="text" class="form-control " id="validdatedue" name="delverydate" placeholder="{$data['validdatedue_label']}" value="{$data['sell']->delivery_date|date_format:"%Y-%m-%d"}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                    <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
                </div>

            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Subtotal</th>
                    <td></td>
                    <td>0.0</td>
                </tr>
                <tr>
                    <th>Descuento </th>
                    <td>{$data['sell']->discount|string_format:"%.2f"} %</td>
                    <td>0.0</td>
                </tr>
                <tr>
                    <th>Impuesto </th>
                    <td>{$data['sell']->tax|string_format:"%.2f"} %</td>
                    <td>0.0</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td></td>
                    <td>0.0</td>
                </tr>
            </table>
        </div>
    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-condensed">
                                
                            </table>
                        </div>
                    </div>
    <script type="text/javascript" >

        $(document).ready(function () {
            /*Activa el search del dropdown*/
            $("#idclient").chosen();




            $('#sellsform')
                    .bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            idclient: {
                                message: "{$data['msg_ge_nvalid_desc']}",
                                validators: {
                                    notEmpty: {
                                        message: "{$data['msg_ge_required_desc']}"
                                    }
                                }

                            },
                            type: {
                                message: "{$data['msg_ge_nvalid_desc']}",
                                validators: {
                                    notEmpty: {
                                        message: "{$data['msg_ge_required_desc']}"
                                    }
                                }
                            },
                            delverydate: {
                                message: "{$data['msg_ge_nvalid_desc']}",
                                validators: {
                                    notEmpty: {
                                        message: "{$data['msg_ge_required_desc']}"
                                    },
                                    date: {
                                        format: 'YYYY-MM-DD',
                                        message: 'The value is not a valid date YYYY-MM-DD'
                                    }
                                }
                            }

                        }
                    })
                    .on('success.form.bv', function (e) {
                        e.preventDefault();
                        var str = $("#sellsform").serialize();
                        var action = $("#sellsform").attr('action')


                        $.post(
                                action,
                                str
                                )
                                .fail(function () {

                                    $.get('{$base_url}/index.php/Sells/getError', function (data) {
                                        console.log(data);
                                        alert("Error");
                                    });
                                })
                                .done(function (data) {
                                    var obj = jQuery.parseJSON(data);
                                    console.log(obj);
                                    if (obj.err.code === 0) {
                                        $('#msgconfirm').removeClass('hidden');
                                        $('#msgconfirm').addClass('alert-success');
                                        $('#btnsave').addClass('hidden');

                                        $('#msgconfirm p').text(obj.confirm_msg);
                                        setTimeout(function () {
                                            window.location.href = obj.redirect;
                                        }, 2000);
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
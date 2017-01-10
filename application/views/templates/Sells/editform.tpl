{block name=centralContainer}
    <h1 class="page-header">{$data['title_sell']}<small>{$data['edit_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p></p>

    </div>
    <form id="sellsform" action='{$base_url}/index.php/Sells/updateConfirmation'>
        <input type="hidden" name="idsell" value="{$data['sell']->idsell}" />
        <div class="form-group">
            <label for="idclient">{$data['client_label']}</label>

            <select id="idclient" name="idclient" class="form-control"  placeholder="{$data['client_label']}">
                <option value=""></option>
                {html_options options=$client_options selected=$customer_id}
            </select>
        </div>
        <div class="form-group ">
            <label for="type">{$data['type_label']}</label>
            <select name="type" class="form-group form-control">
                <option value=""></option>
                {html_options options=$type_options selected=$typeselected}
            </select>
        </div>   
        <div class="form-group ">
            <label for="delverydate">{$data['deliverydate_label']}</label>
            <input  type="text" class="form-control " id="delverydate" name="delverydate" placeholder="{$data['deliverydate_label']}" value="{$data['sell']->delivery_date|date_format:"%Y-%m-%d"}">
        </div>
        <div class="form-group ">
            <label for="tax">{$data['tax_label']}</label>
            <div class="input-group">
                <input  type="text" class="form-control " id="tax" name="tax" placeholder="{$data['tax_label']}" value="{$data['sell']->tax}">
                <div class="input-group-addon">%</div>
            </div>     
        </div>
        <div class="form-group ">
            <label for="discount">{$data['discount_label']}</label>
            <div class="input-group">
                <input  type="text" class="form-control " id="discount" name="discount" placeholder="{$data['discount_label']}" value="{$data['sell']->discount}">
                <div class="input-group-addon">%</div>
            </div>
            
        </div>
        <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
        <a href="{$base_url}index.php/Sells" class="btn btn-link">{$data['return']}</a>
    </form>

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
                            },
                            tax: {
                                message: "{$data['msg_ge_nvalid_desc']}",
                                validators: {
                                    notEmpty: {
                                        message: "{$data['msg_ge_required_desc']}"
                                    },
                                    between: {
                                        min: 0,
                                        max: 100,
                                        message: 'Tax must be between 0 and 100'
                                    }
                                }
                            },
                            discount: {
                                message: "{$data['msg_ge_nvalid_desc']}",
                                validators: {
                                    notEmpty: {
                                        message: "{$data['msg_ge_required_desc']}"
                                    },
                                            
                                    between: {
                                        min: 0,
                                        max: 100,
                                        message: 'Discount must be between 0 and 100'
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
                                    console.log(data);
                                    var obj = jQuery.parseJSON(data);
                                    
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


{block name=centralContainer}
    <h1 class="page-header">{$data['config_prod_prices_label']}<small>{$data['add_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p></p>
        <a href="{$base_url}/index.php/ProductPriceClient" class="alert-link">{$data['return']}</a>
    </div>
    <form id="priceform" action='{$base_url}/index.php/ProductPriceClient/addConfirmation'>
        <div class="form-group">
            <label for="idclient">{$data['client_label']}</label>
            
            <select id="idclient" name="idclient" class="form-control"  placeholder="{$data['client_label']}">
                <option value=""></option>
                {html_options options=$client_options selected=$customer_id}
            </select>

           <!-- <input  type="text" class="form-control" id="idclient" name="idclient" placeholder="{$data['client_label']}">-->
        </div>
        <div class="form-group">
            <label for="idproduct">{$data['product_label']}</label>
            <select id="idproduct" name="idproduct" class="form-control "  placeholder="{$data['product_label']}">
                <option value=""></option>
                {html_options options=$product_options selected=$product_id}
            </select>
            <!--<input  type="text" class="form-control" id="idproduct" name="idproduct" placeholder="{$data['product_label']}">-->
        </div>
        <div class="form-group ">
            <label for="validdatedue">{$data['validdatedue_label']}</label>
            <input  type="text" class="form-control " id="validdatedue" name="validdatedue" placeholder="{$data['validdatedue_label']}">
        </div>
        <div class="form-group ">
            <label for="price">{$data['price_label']}</label>
            <input  type="text" class="form-control" id="price" name="price" placeholder="{$data['price_label']}">
        </div>
        <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
        <a href="{$base_url}index.php/ProductPriceClient" class="btn btn-link">{$data['return']}</a>
    </form>
    
    <script type="text/javascript" >
              
  $(document).ready(function () {
      /*Activa el search del dropdown*/
      $("#idclient").chosen();
      $("#idproduct").chosen();
      
      
      
    $('#priceform')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    idclient:{
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            }
                        }
                        
                    },
                    idproduct:{
                        message: "{$data['msg_ge_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_ge_required_desc']}"
                            }
                        }
                    },
                    validdatedue:{
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
                    price: {
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
                var str = $("#priceform").serialize();
                var action = $("#priceform").attr('action')


                $.post(
                        action,
                        str
                        )
                        .fail(function () {

                            $.get('{$base_url}/index.php/ProductPriceClient/getError', function (data) {
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


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
                    <input type="hidden" name="idsells" value="{$data['sell']->idsell}" />
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
        <div class="col-md-4">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Subtotal</th>
                    <td></td>
                    <td><input type="text" name="undertotal" id="undertotal" value="" readonly="readonly" /></td>
                </tr>
                <tr>
                    <th>Descuento </th>
                    <td><small>{$data['sell']->discount|string_format:"%.2f"} %</small></td>
                    <td><input type="text" name="discounttotal" id="discounttotal" value="" readonly="readonly" /></td>
                </tr>
                <tr>
                    <th>Impuesto </th>
                    <td><small>{$data['sell']->tax|string_format:"%.2f"} %</small></td>
                    <td><input type="text" name="taxtotal" id="taxtotal" value="" readonly="readonly" /></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td></td>
                    <td><input type="text" name="total" id="total" value="" readonly="readonly" /></td>
                </tr>
            </table>
        </div>
        <div class="col-md-8">
            <form id="formproductadd" action='{$base_url}/index.php/SellsDetail/addProductConfirmation'>
                <input type="hidden"  name="idsell" value="{$data['sell']->idsell}" />
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th style="width: 50%">Product</th>
                        <th style="width: 15%">QTY</th>
                        <th style="width: 15%">Price</th>
                        <th style="width: 15%">Desc</th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select id="idproduct" name="idproduct" class="form-control "  placeholder="{$data['product_label']}">
                                <option value=""></option>
                                {html_options options=$product_options }
                            </select>
                        </td>
                        <td><input type="text" name="quantity" value="" class="form-control input-sm"/></td>
                        <td><input type="text" id="prodprice" name="price" value="" class="form-control input-sm"/></td>
                        <td><input type="text" name="discount" value="{$data['sell']->discount|string_format:"%.2f"}" class="form-control input-sm" readonly="readonly"/></td>

                        <td>
                            <a class="btn btn-group-xs" id="additembtn">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="tablesellsdtl" class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th data-field="idsells_dtl">ID</th>
                        <th data-field="name">Product</th>
                        <th data-field="quantity">Quantity</th>
                        <th data-field="price">Price</th>
                        <th data-field="discount">Discount</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="modeledititem" class="modal fade" tabindex="-1" role="dialog"></div>                
    <script type="text/javascript" >

        $(document).ready(function () {
            /*Activa el search del dropdown*/
            $("#idclient").chosen();
            $("#idproduct").chosen();
            loadDtlTable();


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

        
        $('#idproduct').change(function (e) {
            var selectedproduct = $('option:selected',this).val();
            var selectedclient  = $('#idclient option:selected').val();
            var request = new Object();
            request.idproduct = selectedproduct;
            request.idclient = selectedclient ;
            $.post('{$base_url}/index.php/SellsDetail/getProductRecomendedPrice',request)
            .done(function(data){
                var obj = JSON.parse(data);
               
                if(obj.price_available === 'CO'){ //CONFIGURADO
                    $("#prodprice").val(obj.validprice.price);
                }else if(obj.price_available === 'CA'){
                    $('#msgconfirm').removeClass('hidden');
                    $('#msgconfirm').addClass('alert-warning');
                    $('#msgconfirm p').text(obj.message);
                    $("#prodprice").val(obj.validprice.sell_price);
                }
                
            });
        });
        
        $("#additembtn").click(function(){
           
             var str = $("#formproductadd").serialize();
             $('#formproductadd').trigger("reset");
             $("#idproduct").val('').trigger("chosen:updated");
             $.post('{$base_url}/index.php/SellsDetail/addProductConfirmation',str).done(function(data){

                  refreshDtlTable();
              }); 
             
              
                
        });
        
        function refreshDtlTable(){
            var request = new Object();
            var table = $('#tablesellsdtl');
            
            request.idsell = $("#formproductadd input[name=idsell]").val();
              $.post('{$base_url}/index.php/SellsDetail/getSellsItems',request).done(function(data){
                  
                 
                  
                  var result = JSON.parse(data);
                  
                  var onb= new Object();
                    onb.data = result.items;
                    table.bootstrapTable('load',onb);
                    setSummaryInfo(result.summary.undertotal,result.summary.tax,
                                   result.summary.discount,result.summary.total);
              });
        }
        
        $('#tablesellsdtl').on('click-row.bs.table',function(row, $element, field){
            console.log($element);
           $.get('{$base_url}/index.php/SellsDetail/updateViewItem',$element).done(function(data){
               $("#modeledititem").html(data);
               $('#modeledititem').modal('show')
           });
        });
        
        function loadDtlTable(){
            var request = new Object();
            var table = $('#tablesellsdtl');
            
            request.idsell = $("#formproductadd input[name=idsell]").val();
              $.post('{$base_url}/index.php/SellsDetail/getSellsItems',request).done(function(data){
                  var result = JSON.parse(data);
                  
                  var onb= new Object();
                    onb.data = result.items;
                    table.bootstrapTable(onb);
                    setSummaryInfo(result.summary.undertotal,result.summary.tax,
                                   result.summary.discount,result.summary.total);
              });
        }
        
        function setSummaryInfo(undertotal,taxtotal,discounttotal,total){
            $("#undertotal").val(undertotal);
            $("#taxtotal").val(taxtotal);
            $("#discounttotal").val(discounttotal);
            $("#total").val(total);
        }
    </script>

{/block}
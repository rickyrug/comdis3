{block name=centralContainer}
    <h1 class="page-header">{$data['title_sell']}<small>{$data['add_label']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p></p>

    </div>

    <div class="row">
        <form id="sellsform" action='{$base_url}/index.php/Sells/updateConfirmation'>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="hidden" name="idsells" value="{$data['sell']->idsell}" />
                    <label for="idclient">{$data['client_label']}</label>

                    <select id="idclient" name="idclient" class="form-control"  placeholder="{$data['client_label']}" disabled="disabled">
                        <option value=""></option>
                        {html_options options=$client_options selected=$customer_id}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                    <label for="type">{$data['type_label']}</label>
                    <select name="type" class="form-group form-control" disabled="disabled">
                        <option value=""></option>
                        {html_options options=$type_options selected=$typeid}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                    <label for="delverydate">{$data['deliverydate_label']}</label>
                    <input  type="text" class="form-control " id="validdatedue" name="delverydate" placeholder="{$data['validdatedue_label']}" value="{$data['sell']->delivery_date|date_format:"%Y-%m-%d"}" disabled="disabled">
                </div>
            </div>
          <!--  <div class="col-md-3">
                <div class="form-group ">
                    <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
                </div>

            </div>-->
        </form>
    </div>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th style="width: 40%">Subtotal</th>
                    <td style="width: 30%"></td>
                    <td style="width: 30%"><input type="text" name="undertotal" id="undertotal" value="" readonly="readonly" /></td>
                </tr>
                <tr>
                    <th>Descuento <span id="descuentohdr" class="glyphicon glyphicon-edit"></span></th>
                    <td >{$data['sell']->discount|string_format:"%.2f"} %</td>
                    <td><input type="text" name="discounttotal" id="discounttotal" value="" readonly="readonly" /></td>
                </tr>
                <tr>
                    <th>Impuesto <span class="glyphicon glyphicon-edit"></span></th>
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
        <div id="toolbar">
                <div class="form-inline" role="form">

                    <div class="form-group">
                        <a href="#" id="btndeletedtl" class="btn btn-default">{$data['titledelete_registry']}</a>
                    </div>
                </div>
            </div>
        <div class="col-lg-12">
            <table id="tablesellsdtl" 
                   class="table table-bordered table-condensed"
                   data-toolbar="#toolbar"
            >
                <thead>
                    <tr>
                        <th data-checkbox="true"></th>
                        <th data-field="idsells_dtl">ID</th>
                        <th data-field="name">Product</th>
                        <th data-field="quantity" data-editable="true">Quantity</th>
                        <th data-field="price" data-editable="true" >Price</th>
                        <th data-field="discount" >Discount</th>
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
        
        $("#btndeletedtl").click(function(){
            var selected = $('#tablesellsdtl').bootstrapTable('getAllSelections');
            var obj = new Object();
            var request =  new Array();
            for (var i = 0; i < selected .length; i++){
                
                request.push(selected[i].idsells_dtl);
                
            }
            obj.idsells_dtl = request;
            
             $.post('{$base_url}/index.php/SellsDetail/deleteConfirmation',obj).done(function(data){
                  console.log(data);
  
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
        
       
        
        $('#tablesellsdtl').on('editable-save.bs.table',function(row, field,$el , oldValue){            
            console.log($el);
            if($el[field] === ""){
                $el[field] = oldValue;
            }
            
            $.post('{$base_url}/index.php/SellsDetail/updateItemConfirmation',$el).done(function(data){
              refreshDtlTable();
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
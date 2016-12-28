{block name=centralContainer}
    <h1 class="page-header">{$data['title_variables']}<small>{$data['titledelete_registry']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="{$base_url}/index.php/VariablesCatalog" class="alert-link">{$data['return']}</a>
    </div>
    <div class="jumbotron">
        <h3>{$data['titledeleteq']}</h3>
        <input type="hidden" id="idvariable" name="idvariable" value="{$data['variable']->idvariable}" />
        <p>
            <button id="btndelete" class="btn btn-primary btn-lg" href="#" role="button">{$data['delete']}</button>
            <a class="btn btn-default btn-lg" href="{$base_url}/index.php/VariablesCatalog"  role="button">{$data['return']}</a>
        </p>
    </div>
    <script type="text/javascript">
        $('#btndelete').click(function(){
            var idvariable =$("#idvariable").val();
            var show = {};
            show['idvariable'] = idvariable;
            $.post(
                    "{$base_url}/index.php/VariablesCatalog/deleteConfirmation",
                    show
                   ).fail(function(data){
                    alert("ERRROR");   
                    }).success(function(data){
                        console.log(data);
                       var obj = jQuery.parseJSON(data);
                            
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
        
    </script>
{/block}
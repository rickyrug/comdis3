{block name=centralContainer}
    <h1 class="page-header">{$data['title_sell']}<small>{$data['titledelete_registry']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="{$base_url}/index.php/Sells" class="alert-link">{$data['return']}</a>
    </div>
    <div class="jumbotron">
        <h3>{$data['titledeleteq']}</h3>
        <input type="hidden" id="idsell" name="idsell" value="{$data['sell']->idsell}" />
        <p>
            <button id="btndelete" class="btn btn-primary btn-lg" href="#" role="button">{$data['delete']}</button>
            <a class="btn btn-default btn-lg" href="{$base_url}/index.php/Sells"  role="button">{$data['return']}</a>
        </p>
    </div>
    <script type="text/javascript">
        $('#btndelete').click(function(){
            var idsell =$("#idsell").val();
            var show = {};
            show['idsell'] = idsell;
            $.post(
                    "{$base_url}/index.php/Sells/deleteConfirmation",
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
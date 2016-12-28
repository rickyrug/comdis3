{block name=centralContainer}
    <h1 class="page-header">{$data['title_variables']}<small>{$data['titleaddvariables']}</small></h1>
    <div id="msgconfirm" class="alert hidden" role="alert">
        <p></p>
        <a href="{$base_url}/index.php/VariablesCatalog" class="alert-link">{$data['return']}</a>
    </div>
    <form id="variableform" action='{$base_url}/index.php/VariablesCatalog/addConfirmation'>
        <div class="form-group">
            <label for="description">{$data['description_label']}</label>
            <input  type="text" class="form-control" id="description" name="description" placeholder="{$data['description_label']}">
        </div>
      
        <button id="btnsave" type="submit" class="btn btn-primary">{$data['save']}</button>
        <a href="{$base_url}/index.php/VariablesCatalog" class="btn btn-link">{$data['return']}</a>
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
                    description: {
                        message: "{$data['msg_var_nvalid_desc']}",
                        validators: {
                            notEmpty: {
                                message: "{$data['msg_var_required_desc']}"
                            },
                            stringLength: {
                                min: 1,
                                max: 50,
                                message: "{$data['msg_var_lenght_desc']}"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: "{$data['msg_var_nvalid_desc']}"
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
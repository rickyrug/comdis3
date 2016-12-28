{block name=mainContainer}
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3 col-md-2 sidebar">
            {block name=leftMenu}{/block}
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <ol class="breadcrumb">
                {foreach from=$data['breadcrumb'] item=curr_id}
                       <li><a href="#">{$curr_id}</a></li>
                {/foreach}
            </ol>
        {block name=centralContainer}{/block}
    </div>
</div>
</div>    
{/block}
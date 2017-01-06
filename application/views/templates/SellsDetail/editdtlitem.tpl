  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{$idselldtl}</h4>
      </div>
      <div class="modal-body">
          <form id="editsellsitem" action="{$base_url}/index.php/SellsDetail/updateConfirmation}">
               <div class="form-group">
                    <label for="editproduct">Product</label>
                    <input  type="text" class="form-control" id="editproduct" name="editproduct" value="{$idproduct}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="editquantity">Quantity</label>
                    <input  type="text" class="form-control" name="editquantity" value="{$quantity|string_format:"%.2f"}" >
                </div>
                <div class="form-group">
                    <label for="editprice">Price</label>
                    <input  type="text" class="form-control" name="editprice" value="{$price|string_format:"%.2f"}" >
                </div>
              
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

<div class="modal fade bs-example-modal-sm" id="update-form" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-postion-20pc modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-weight: bold" class="modal-title">Cập nhật trạng thái cho đơn hàng</h5>
            </div>
            <div class="modal-body">
                <form class="" style="padding-left: 30%">
                    <div class="checkbox">
                        <label id="order-delivered-box">
                            <input id="order-delivered" type="radio" name="status" value="1"> Đã giao 
                        </label>
                    </div>
                    <div class="checkbox">
                        <label id="order-undelivered-box">
                            <input id="order-undelivered" type="radio" name="status" value="0"> Chưa giao
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-2" data-dismiss="modal">Đóng</button>
                <button type="button" id="update-form-submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
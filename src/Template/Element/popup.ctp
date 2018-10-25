<div class="modal" id="modal_alert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo __('LABEL_INFO') ?></h4>
            </div>
            <div class="modal-body">
                <p id="modal_alert_body"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo __('LABEL_CLOSE') ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal_renewal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo __('LABEL_MONTHLYCARD_RENEWAL') ?></h4>
            </div>
            <div class="modal-body">
                <div class="renewal-type-body form-group FormFromToContainer renewal-by-date-selected">
                    <label class="" for="option2">Ngày bắt đầu - Ngày kết thúc</label>
                    <div class="dateFromToInputs">
                        <div class="form-group text">
                            <input type="text" name="renewal_date_to" class="form-control" id="renewal_date_from" value="" required="required">
                        </div>
                        <span class="form_from_to_separator">〜</span>
                        <div class="form-group text">
                            <input type="text" name="renewal_date_to" class="form-control" id="renewal_date_to" value="" required="required">
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            $("#renewal_date_from, #renewal_date_to").datepicker({
                                format: 'yyyy-mm-dd',
                                clearBtn: true,
                                todayHighlight: true,
                                autoclose: true,
                                language: 'ja',
                            }).on('changeDate', function () {
                                $(this).datepicker('hide');
                            });
                        });
                    </script>
                    <div class="clearfix"></div>
                </div>
                <div class="renewal-type-body renewal-by-days">
                    <label class="">Số ngày gia hạn</label>
                    <div class="form-group text">
                        <input type="text" name="renewal_days" class="form-control" id="renewal_days" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-modal-renewal"><?php echo __('LABEL_RENEWAL') ?></button>
                <button type="button" class="btn btn-alert" data-dismiss="modal"><?php echo __('LABEL_CLOSE') ?></button>
            </div>
        </div>
    </div>
</div>

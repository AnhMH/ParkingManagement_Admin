<div class="row">
        <div class="col-md-12">    
            <div class="box-customer">   
                <div class="box-body-customer">
                    <h4><?php echo __('LABEL_FILE_IMPORT') ?></h4>
                    <div class="box-main">
                        <form method="post" action="<?php echo $BASE_URL ?>/cards/import" enctype="multipart/form-data" >
                            <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getParam('_csrfToken'); ?>"/>
                            <div class="form-group">
                                <input id="file" type="file" name="file" class="inputfile icsv_file"/>
                            </div>
                            <div class="form-group button-group">
                                <input type="submit" value="<?php echo __('LABEL_SAVE');?>" class="btn btn-primary">
                                <a href="javascript:;" onclick="return downloadFileSample('cards.xlsx')" class="btn btn-info"><?php echo __('LABEL_DOWNLOAD_FILE_SAMPLE');?></a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php if (!empty($data)): ?>
        <div class="col-md-12"> 
            <table id="" class="table table-customer table-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%"></th>
                        <th width="20%"><?php echo __('LABEL_CARD_CODE');?></th>
                        <th width="10%">Status</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $k => $v): ?>
                        <tr>
                            <td><?php echo $k + 1; ?></td>
                            <td><?php echo !empty($v['code']) ? $v['code'] : ''; ?></td>
                            <td>
                                <?php if (!empty($v['status'])): ?>
                                <label class="label  <?php echo ($v['status'] == 'OK') ? 'label-success' : 'label-danger'; ?>"><?php echo $v['status']; ?></label>
                                <?php endif; ?>
                            </td>
                            <td><?php echo !empty($v['message']) ? $v['message'] : ''; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

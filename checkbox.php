<?php
defined('YII_ENV') or exit('Access Denied');
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/10/3
 * Time: 12:04
 */
/* @var \yii\web\View $this */
$this->title = '编辑账户信息';
$url_manager = Yii::$app->urlManager;
$current_url = Yii::$app->request->absoluteUrl;
$return_url = $url_manager->createUrl(['admin/user/index']);
$this->params['active_nav_link'] = 'admin/user/edit';
?>
<link href="https://cdn.bootcss.com/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" rel="stylesheet">
<style>
    form {
        position: relative;
    }

    .form-disable {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .75);
        z-index: 10;
        text-align: center;
        padding: 50px 0;
    }

    .form-disable .alert {
        display: table;
        margin: 0 auto;
    }

    .form-control:disabled, .form-control[readonly] {
        opacity: .5;
    }
</style>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl(['admin/user/index']) ?>">账户列表</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">编辑账户信息</li>
    </ol>
</nav>
<div class="alert alert-secondary">当前子账户数量：<?= $account_count ?>
    ，最大子账户数量：<?= $account_max == -1 ? '无限制' : $account_max ?></div>

<form method="post" return="<?= $return_url ?>" class="auto-form card">
    <?php if ($account_over_max) : ?>
        <div class="form-disable">
            <div class="alert alert-danger">
                <div class="mb-2 pl-3 pr-3"><b>子账户创建数量上限！</b></div>
                <div>当前子账户数量：<?= $account_count ?></div>
                <div>最大子账户数量：<?= $account_max ?></div>
            </div>
        </div>
    <?php endif; ?>
    <div class="card-header"><?= $this->title ?></div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label required">用户名</label>
            <div class="col-sm-6">
                <?php if ($model->isNewRecord) : ?>
                    <input class="form-control "
                           value="<?= $model->username ?>" name="username">
                <?php else : ?>
                    <input type="text" readonly class="form-control-plaintext "
                           value="<?= $model->username ?>">
                <?php endif; ?>
            </div>
        </div>

        <?php if ($model->isNewRecord) : ?>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label required">登录密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control " value="" name="password">
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">手机号</label>
            <div class="col-sm-6">
                <input class="form-control " value="<?= $model->mobile ?>" name="mobile">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">备注</label>
            <div class="col-sm-6">
                <input class="form-control " value="<?= $model->remark ?>" name="remark">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label required">小程序数量</label>
            <div class="col-sm-6">
                <input class="form-control " type="number" step="1" min="0"
                       value="<?= $model->app_max_count ?>" name="app_max_count">
                <div class="fs-sm text-muted">此用户可以创建的小程序的数量，填写0则表示不限制用户创建小程序的数量</div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label required">账户有效期</label>
            <div class="col-sm-6">
                <div class="form-inline">
                    <?php if ($model->id == 1) : ?>
                        <input type="hidden" name="no_expire_time" value="on">
                        <div class="text-muted" style="padding-top: calc(.5rem - 1px * 2);">总管理员账户此项无法修改</div>
                    <?php else : ?>
                        <input id="expire_time" class="form-control" value="<?= date('Y-m-d', $model->expire_time) ?>"
                               name="expire_time" <?= $model->expire_time == 0 ? 'readonly' : null ?>>

                        <label class="custom-control custom-checkbox ml-3">
                            <input <?= $model->expire_time == 0 ? 'checked' : null ?>
                                    type="checkbox"
                                    name="no_expire_time"
                                    class="custom-control-input no-expire-time">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">永久</span>
                        </label>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label required">选择分类</label>
           <div class="col-sm-6">
              <select id="testSelect" onchange="gradeChange()" data-live-search="true" name="cid" tabindex="-98" class=" form-control">
                <option value="0" selected="selected">请选择分类</option>
               <?php foreach ($list2 as $key => $item) : ?>
                 <option value="<?= $item->id ?>" > <?= $item->name ?> </option>
               <?php endforeach; ?>
              </select></div>
        </div>
        <?php $admin_permission_list = json_decode($model->permission, true);
        if (!is_array($admin_permission_list)) {
            $admin_permission_list = [];
        } ?>
         <script type="text/javascript">
               function gradeChange() {
                        var ids =   $('#testSelect option:selected') .val();
                         $("input[data-id=ids]").val(ids);
                         document.getElementById("catin").innerHTML = "";
                         <?php
                           if($admin_permission_list){
                         foreach ($admin_permission_list as $key => $item5) : ;?>
                         if (ids ==  <?=$key ?>) {
                             var permission_my =  <?php echo json_encode($item5,JSON_UNESCAPED_UNICODE);?>;
                             console.log(permission_my);
                         }
                          <?php endforeach; }else {?>
                              var permission_my = '';
                          <?php  }  ?>

                         <?php foreach ($list2 as $key => $item8) : ?>
                          if (ids == <?=$item8->id ?>) {
                              var permission =  <?=$item8->permission?>;
                          }
                          <?php endforeach; ?>

                        // console.log(permission);

                        for (var i in permission) {

                        <?php foreach ($permission_list as $item9) : ?>
                           if(permission[i] == "<?= $item9->name?>") {
                              var index = $.inArray(permission[i],permission_my);
                              if(index >= 0){
                                   $("#catin").append('<label class="custom-control custom-checkbox mr-5"><input type="checkbox" class="custom-control-input" checked value="<?= $item9->name?>" name="permission[]"><span class="custom-control-indicator"></span><span class="custom-control-description"><?= $item9->display_name ?></span></label>');
                                }else {
                                   $("#catin").append('<label class="custom-control custom-checkbox mr-5"><input type="checkbox" class="custom-control-input" value="<?= $item9->name?>" name="permission[]"><span class="custom-control-indicator"></span><span class="custom-control-description"><?= $item9->display_name ?></span></label>');
                                }
                           }

                        <?php endforeach; ?>

                        }
                 }
         </script>


        <div class="form-group row">
            <label class="col-sm-3 col-form-label required">权限设置</label>
            <div id="catin" class="col-sm-6" style="padding-top: calc(.5rem - 1px * 2);">

            </div>
        </div>
          <input type="hidden" data-id="ids" name="ids" value="">
        <div class="form-group row">
            <label class="col-sm-3"></label>
            <div class="col-sm-6 offset-sm-3">
                <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
            </div>
        </div>
    </div>
</form>
<!-- <script src="https://cdn.bootcss.com/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script> -->
<script>

    $.datetimepicker.setLocale('zh');

    $('#expire_time').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        minDate: '<?=date('Y-m-d')?>',
    });

    $(document).on('change', '.no-expire-time', function () {
        if ($(this).prop('checked')) {
            $('#expire_time').prop('readonly', true);
        } else {
            $('#expire_time').prop('readonly', false);
        }
    });

</script>

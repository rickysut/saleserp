<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo $title ?></h1>
            <small><?php echo $title ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('permission') ?></a></li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="column">

   
                   

                </div>
            </div>
        </div>

        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo $title ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open("Permission/create/") ?>
                    <div class="panel-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="role_id" id="type" placeholder="<?php echo display('role_name') ?>" required />
                            </div>
                        </div>
             <?php
            $m=0;
            foreach($accounts as $key=>$value) {
                $account_sub = $this->db->select('*')->from('sub_module')->where('mid',$value['id'])->get()->result();
                ?>
                <table class="table table-bordered">
                    <h2 class=""><?php echo display($value['name']);?></h2>
                    <thead>
                    <tr>
                        <th><?php echo display('sl_no');?></th>
                        <th><?php echo display('menu_name');?></th>
                        <th><?php echo display('create');?></th>
                        <th><?php echo display('read');?></th>
                        <th><?php echo display('update');?></th>
                        <th><?php echo display('delete');?></th>
                    </tr>
                    </thead>
                    <?php $sl = 0 ?>
                    <?php if (!empty($account_sub)) { ?>
                        <?php foreach ($account_sub as $key1 => $module_name) { ?>

                            <?php
                            $createID = 'id="create'.$m.''.$sl.'"';
                            $readID   = 'id="read'.$m.''.$sl.'"';
                            $updateID = 'id="update'.$m.''.$sl.'"';
                            $deleteID = 'id="delete'.$m.''.$sl.'"';
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo ($sl+1) ?></td>
                                <td>
                                    <?php echo display($module_name->name)?>
                                    <input type="hidden" name="fk_module_id[<?php echo $m?>][<?php echo $sl?>][]" value="<?php echo $module_name->id ?>" id="id_<?php echo $module_name->id ?>">
                                </td>
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <?php echo form_checkbox('create['.$m.']['.$sl.'][]', '1', null, $createID); ?>
                                        <label for="create<?php echo $m ?><?php echo $sl ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <?php echo form_checkbox('read['.$m.']['.$sl.'][]', '1', null, $readID); ?>
                                        <label for="read<?php echo $m ?><?php echo $sl ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <?php echo form_checkbox('update['.$m.']['.$sl.'][]', '1', null, $updateID); ?>
                                        <label for="update<?php echo $m ?><?php echo $sl ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <?php echo form_checkbox('delete['.$m.']['.$sl.'][]', '1', null, $deleteID); ?>
                                        <label for="delete<?php echo $m ?><?php echo $sl ?>"></label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php $sl++ ?>
                        <?php } ?>
                    <?php }  ?>
                </table>
                <?php $m++; } ?>
                <div class="form-group text-right">
                <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
            </div>
            <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Add new customer end -->

<script type="text/javascript">
    //Delete Category
    $(".DeleteRole").click(function(){
        var id=$(this).attr('name');
        var csrf_test_name=  $("[name=csrf_test_name]").val();
        var x = confirm("<?php echo display('are_you_sure_to_delete')?>");
        if (x==true){
            $.ajax
            ({
                type: "POST",
                url: '<?php echo base_url('Permission/role_delete')?>',
                data: {id:id,csrf_test_name:csrf_test_name},
                cache: false,
                success: function(datas)
                {
                    location.reload();
                }
            });
        }
    });
</script>


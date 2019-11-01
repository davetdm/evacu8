
<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Groups</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/settings/configs" class="btn btn-primary btn-block">Configs</a>
            <a href="/settings/groups" class="btn btn-primary btn-block">Groups</a>
            <a href="/settings/anchors" class="btn btn-primary btn-block">Anchors</a>
        </div>
        <div class="col-md-10">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Configurations</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Configs</th>
                                    <th style="width:200px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($groups as $group){ 
                                    $group_configs = $this->GroupConfigModel->getByGrouId($group->id);
                                ?>
                                    <tr>
                                        <td><?php echo $group->name; ?></td>
                                        <td>
                                            <?php 
                                            if($group_configs){
                                                foreach($group_configs as $group_config){
                                                    $in_config = $this->ConfigsModel->select($group_config->config_id);
                                                    echo "$in_config->name | ";
                                                } 
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data="<?=$group->id?>" class="btnEdit">
                                                edit
                                            </a> | 
                                            <a href="javascript:void(0)" data="<?=$group->id?>" class="btnDelete text-danger">
                                                delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo form_open("/settings/addConfigToGroup", 'id="frmAddConfigToGroup"'); ?>
                <h4>Assing configs to groups</h4>
                <br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="group_id" class="form-control">
                                <option value=""> -- select group</option>
                                <?php foreach($groups as $group){
                                    echo "<option value='$group->id'>$group->name</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="config_id" class="form-control">
                                <option value=""> -- select config</option>
                                <?php foreach($configs as $config){
                                    echo "<option value='$config->id'>$config->name</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>


<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Settings</h1>
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
                    <h4 class="my-0 font-weight-normal">Anchors</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Anchor</th>
                                    <th>Config</th>
                                    <th>Location</th>
                                    <th style="width:200px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($anchors as $anchor){ 
                                    $config = $this->ConfigsModel->select($anchor->config_id);    
                                ?>
                                    <tr>
                                        <td><?php echo $anchor->anchor_id; ?></td>
                                        <td><?php echo $config->name; ?></td>
                                        <td><?php echo $anchor->location; ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data="<?=$anchor->id?>" class="btnEdit">edit</a> | 
                                            <a href="javascript:void(0)" data="<?=$anchor->id?>" class="btnDelete text-danger">delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php echo form_open("/settings/addAnchor", 'id="frmAddAnchor"'); ?>
                <h4>Add Anchor</h4>
                <br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="anchor_id" class="form-control" placeholder="Anchor ID">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="config_id">
                                <option value=""> -- select config</option>
                                <?php foreach($configs as $config){
                                    echo "<option value='$config->id'>$config->name</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>

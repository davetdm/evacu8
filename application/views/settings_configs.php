
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
                    <h4 class="my-0 font-weight-normal">Groups</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th style="width:200px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($configs as $config){ ?>
                                    <tr>
                                        <td><?php echo $config->id; ?></td>
                                        <td><?php echo $config->name; ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data="<?=$config->id?>" class="btnEdit">edit</a> | 
                                            <a href="javascript:void(0)" data="<?=$config->id?>" class="btnDelete text-danger">delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php echo form_open("/settings/addConfig", 'id="frmAddConfig"'); ?>
                <h4>Add Config</h4>
                <br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Config Name">
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

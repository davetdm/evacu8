
<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Tags</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/tags/add" class="btn btn-primary btn-block">Add Tag</a>
            <a href="/tags/assign" class="btn btn-primary btn-block">Assign Tag</a>
            <a href="/tags/assign" class="btn btn-primary btn-block">Assigned Tags</a>
        </div>
        <div class="col-md-10">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Anchors</h4>
                </div>
                <div class="card-body">
                
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


ACHORS:
    anchor_id:13001,
    chanel:0,
    rssi_value:-33.0,
ACHORS:
    anchor_id:13001,
    chanel:1,
    rssi_value:-33.0,
ACHORS:
    anchor_id:13002,
    chanel:0,
    rssi_value:-33.0,
ACHORS:
    anchor_id:13002,
    chanel:1,
    rssi_value:-35.0,


ESTIMATES:
    time_sec:1570452927,
    time_m_sec:52861,
    tag_id_dec:1450741879,
    tag_id_hex:56789077,
    blink_id:44,
    pos_x:2.020316550863081,
    pos_y:0.0,
    pos_z:0.0,
    config:officeTest
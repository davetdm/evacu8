<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Persons</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/person" class="btn btn-primary btn-block">Persons</a>
            <a href="/person/add" class="btn btn-primary btn-block">Add Person</a>
        </div>
        <div class="col-md-10">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Update Person</h4>
                </div>
                <div class="card-body">
                    <?php echo form_open('person/save_person','id="personForm"'); ?>
                        <input name="id" type="hidden" value="<?php echo $person->id; ?>">
                        <div class="form-group">
                            <input name="first_name" id="first_name" type="text" class="form-control col-6" 
                                placeholder="First Name" value="<?php echo $person->first_name; ?>" required="">
                        </div>
                        <div class="form-group">
                            <input name="last_name" id="last_name" type="text" class="form-control col-6" 
                                placeholder="Last Name" value="<?php echo $person->last_name; ?>" required="">
                        </div>
                        <div class="form-group">
                            <input name="id_passport" id="id_passport" type="text" class="form-control col-6" 
                                placeholder="ID Or Passport" value="<?php echo $person->id_passport; ?>" required="">
                        </div>
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control col-6" 
                                placeholder="Email Address" value="<?php echo $person->email; ?>" required="">
                        </div>
                        <div class="form-group">
                            <input name="mobile" id="mobile" type="text" class="form-control col-6" 
                                placeholder="Mobile" value="<?php echo $person->mobile; ?>" required="">
                        </div>
                        <div class="form-group">
                            <select name="type" id="type" class="form-control col-6">
                                <option value="<?php echo $person->type; ?>"><?php echo $person->type; ?></option>
                                <?php foreach($groups as $group){ 
                                    if($person->type == $group->name) {continue;}
                                    echo "<option value='$group->name'>$group->name</option>";
                                }?>
                            </select> 
                        </div>
                        <div class="form-group">                         
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>


               

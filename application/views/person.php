<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once  VIEWPATH . "header.php"; ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Person</title>
</head>
<body>
<section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
            <h2> Person</h2>
            <br>
                <div class="content-bottom">
                <?php echo form_open('person/add_person','id="personForm"'); ?>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="first_name" id="first_name" type="text" value="" placeholder="First Name" required="">
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="last_name" id="last_name" type="text" value="" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="id_passport" id="id_passport" type="text" value="" placeholder="ID Or Passport" required="">
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="email" id="email" type="text" value="" placeholder="Email Address" required="">
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="mobile" id="mobile" type="text" value="" placeholder="Mobile" required="">
                            </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div class="content-input-field">
                            <select name="type" id="type">
                                <option value="0">Select type</option>
                                <option value="employee">Employee</option>
                                <option value="visitor">Visitor</option>
                                <option value="contractor">Contractor</option>
                            </select> 
                            </div>
                        </div>
                        <br>
                       
                            <br>
                        <div class="content-input-field">                         
                            <button  type="submit" onsubmit ="return Validate();" class="btn btn-primary btn-lg">Add Person</button>
                        </div>
                        <br>
                        <div class="content-input-field">
                            <a href="<?php echo base_url(); ?>person/view_person" 
                            class="btn btn-primary btn-lg btn-block">List Person</a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
 </section>
</body>
</html>
<?php require VIEWPATH . "footer.php"; ?>

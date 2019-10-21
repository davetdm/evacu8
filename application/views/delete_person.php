<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Person</title>
</head>
<body>
<section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
                <h2>Delete Person</h2>
                <form id="deleteForm" action="<?php echo base_url(); ?>person/delete_person" method="post">
                    <input name="id" id="id" type="hidden" value="<?php echo $person->id; ?>">
                    <br/>
                    <p>
                    <h4>Are you sure you want to delete <?php echo $person->first_name ?><br/></h4>
             
                    </p>
                    <br/>
                   
                    <div class="content-input-field">                         
                        <button type="submit"  class="btn btn-primary btn-lg">Delete</button></a> 
                    </div>
                </form>
                
            </div>
        </div>
 </section>
</body>
</html>

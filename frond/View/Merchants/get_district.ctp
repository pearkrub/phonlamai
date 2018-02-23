<select class="form-control" name="district_id" id="district_id" required>
    <option value="">- - - เลือกตำบล - - -</option>
    <?php foreach($districts as $key => $district_name){ ?>
        <option value="<?php echo $key ?>"><?php echo $district_name ?></option>
    <?php }?>
</select>
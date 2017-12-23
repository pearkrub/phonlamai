<select class="form-control" name="amphur_id" id="amphur_id">
    <option value="">- - - เลือกอำเภอ - - -</option>
    <?php foreach($amphures as $key => $amphur_name){ ?>
        <option value="<?php echo $key ?>"><?php echo $amphur_name ?></option>
    <?php }?>
</select>
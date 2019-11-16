<?php echo validation_errors(); ?>
<?php echo form_open('urls/create') ?>

<label for="long">You URL</label>
<input type="input" name="long"><br>

<input type="submit" name="submit" value="Create url pair">
</form>

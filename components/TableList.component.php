<form method="post" class="container mt-5">
    <label for="tablename" class="form-label">Table Name:</label>
    <select name="table_name" class="form-select">
        <?php
        $db_Connection = mysqli_connect('abadi.medis.land', 'gmj', 'GMJ5Rd@t@5Q!', 'gmjir_ojs');
        $table_list = (mysqli_fetch_all(mysqli_query($db_Connection, "SHOW TABLES")));
        foreach ($table_list as $key => $value) {
            echo ('<option value="' . $value[0] . '">' . $value[0] . '</option>');
        }
        ?>
    </select>
    <div class="form-check mt-4">
        <input type="checkbox" name="html_en" checked id="html-char" class="form-check-input">
        <label for="html-char" class="form-check-label">Encode Html chars</label>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Show</button>
</form>
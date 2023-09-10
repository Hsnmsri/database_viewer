<table class="table table-hover">

    <thead style="position: sticky; top:0;left:0;">

        <tr class="table-dark">
            <?php
            $table_columns = mysqli_fetch_all(mysqli_query($db_Connection, "DESCRIBE $table_name;"));
            // var_dump($table_columns);
            foreach ($table_columns as $key => $value) {
                echo ("<th>");
                echo ($table_columns[$key][0]);
                echo ("</th>");
            }
            ?>
        </tr>

    </thead>

    <tbody>
        <?php
        // Get Table row count
        $db_rowcount = mysqli_fetch_assoc(mysqli_query($db_Connection, "SELECT COUNT(*) as total FROM `metadata_description_settings`;"));
        $db_rowcount = $db_rowcount['total'];

        $jump = (($db_rowcount / 2) == 0) ? 2 : ($db_rowcount % 10);

        for ($i = 1; $i <= $db_rowcount; $i = $i + $jump) {

            $data = mysqli_fetch_all(mysqli_query($db_Connection, "SELECT * FROM $table_name LIMIT $jump OFFSET " . ($i == 1 ? 0 : ($jump + $i))));

            foreach ($data as $key => $value) {

                $display_status = false;
                foreach ($value as $keyData => $valueData) {

                    // search keywords
                    $search_array = [
                        // "SELECT",
                        // "FROM",
                        // "WHERE",
                        // "INSERT",
                        // "UPDATE",
                        // "DELETE",
                        // "CREATE",
                        // "ALTER",
                        // "DROP",
                        // "TABLE",
                        // "INDEX",
                        // "PRIMARY",
                        // "UNIQUE",
                        // "FOREIGN",
                        // "KEY",
                        // "DATABASE",
                        // "VIEW",
                        // "PROCEDURE",
                        // "FUNCTION",
                        // "TRIGGER",
                        // "UNION",
                        // "INNER",
                        // "LEFT",
                        // "RIGHT",
                        // "JOIN",
                        // "ORDER BY",
                        // "GROUP BY",
                        // "DISTINCT",
        
                        // "select",
                        // "from",
                        // "where",
                        // "insert",
                        // "update",
                        // "delete",
                        // "create",
                        // "alter",
                        // "drop",
                        // "table",
                        // "index",
                        // "primary",
                        // "unique",
                        // "foreign",
                        // "key",
                        // "database",
                        // "view",
                        // "procedure",
                        // "function",
                        // "trigger",
                        // "union",
                        // "inner",
                        // "left",
                        // "right",
                        // "join",
                        // "on",
                        // "order by",
                        // "group by",
                        // "as",
                        // "distinct",
                        "<script"
                    ];

                    // search in fields
                    foreach ($search_array as $search) {
                        if (strpos($valueData, $search) !== false) {
                            $display_status = true;
                        }
                    }

                }

                // print data
                if ($display_status) {
                    echo ('<tr>');

                    // print data
                    foreach ($value as $keyData => $valueData) {

                        echo ("<td>");

                        $html_enti_status = $_POST['html_en'] ?? false;
                        echo ($html_enti_status ? htmlspecialchars($valueData) : $valueData);

                        echo ("</td>");
                    }

                    echo ("</tr>");
                }

            }

        }
        ?>
    </tbody>

</table>
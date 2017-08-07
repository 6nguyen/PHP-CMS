<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            
            <h1 class="text-center">Student Roster</h1>
            
                <?php 
                global $connection;
                $query = "SELECT * FROM students";
                $result = mysqli_query($connection, $query);

                if (count($result) > 0): ?>
                <table class="table table-striped">
                  <thead class="thead-default">
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
                    <tr>
                      <td><?php echo implode('</td><td>', $row); ?></td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
                <?php endif; ?>
                    
                <button class="btn btn-default"><a href="create.php">Add Student</a></button>

        </div>
    </div>
</body>
</html>
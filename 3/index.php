<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent Required Fields</title>
    <script>
        function toggleRequired() 
        {
            const dropdown = document.getElementById("myDropdown");
            const textField = document.getElementById("myTextField");
            if (dropdown.value === "Yes")
            {
                textField.required = true;
            }
            else
            {
                textField.required = false;
            }
        }
    </script>
</head>
<body>

    <form action="process.php" method="post">
        <label for="myDropdown">Choose an option:</label>
        <select id="myDropdown" name="dropdown" onchange="toggleRequired()">
            <option value="">Select an option</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <br><br>

        <label for="myTextField">Enter text:</label>
        <input type="text" id="myTextField" name="textField">

        <br><br>

        <input type="submit" value="Submit">
    </form>
    
</body>
</html>

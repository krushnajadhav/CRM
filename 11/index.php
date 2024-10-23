


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent Dropdowns Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        select {
            margin: 10px 0;
            padding: 10px;
            width: 200px;
        }
    </style>
</head>
<body>

<h2>Select Location</h2>

<select id="country" onchange="fetchStates()">
    <option value="">Select Country</option>
    <!-- Countries will be populated here -->
</select>

<select id="state" onchange="fetchCities()" disabled>
    <option value="">Select State</option>
</select>

<select id="city" disabled>
    <option value="">Select City</option>
</select>

<script>
    window.onload = function() 
    {
        fetchCountries();
    };

    function fetchCountries() 
    {
        fetch('api.php?action=getCountries')
            .then(response => response.json())
            .then(data => {
                var countryDropdown = document.getElementById("country");
                data.forEach(function(country) {
                    countryDropdown.innerHTML += '<option value="' + country.id + '">' + country.name + '</option>';
                });
            });
    }

    function fetchStates() 
    {
        var countryId = document.getElementById("country").value;
        if (countryId) {
            fetch('api.php?action=getStates&country_id=' + countryId)
                .then(response => response.json())
                .then(data => {
                    var stateDropdown = document.getElementById("state");
                    stateDropdown.innerHTML = '<option value="">Select State</option>';
                    data.forEach(function(state) {
                        stateDropdown.innerHTML += '<option value="' + state.id + '">' + state.name + '</option>';
                    });
                    stateDropdown.disabled = false;
                    document.getElementById("city").innerHTML = '<option value="">Select City</option>'; // Reset cities
                    document.getElementById("city").disabled = true; // Disable city dropdown
                });
        }
    }

    function fetchCities() 
    {
        var stateId = document.getElementById("state").value;
        if (stateId) {
            fetch('api.php?action=getCities&state_id=' + stateId)
                .then(response => response.json())
                .then(data => {
                    var cityDropdown = document.getElementById("city");
                    cityDropdown.innerHTML = '<option value="">Select City</option>';
                    data.forEach(function(city) {
                        cityDropdown.innerHTML += '<option value="' + city.id + '">' + city.name + '</option>';
                    });
                    cityDropdown.disabled = false;
                });
        }
    }
</script>

</body>
</html>

<?php 
//Asuming i have database connection already present

if (isset($_GET['action'])) 
{
    switch ($_GET['action']) 
    {
        case 'getCountries':
            $result = $conn->query("SELECT id, name FROM countries");
            $countries = [];
            while ($row = $result->fetch_assoc()) 
            {
                $countries[] = $row;
            }
            echo json_encode($countries);
            break;

        case 'getStates':
            $countryId = $_GET['country_id'];
            $result = $conn->query("SELECT id, name FROM states WHERE country_id = $countryId");
            $states = [];
            while ($row = $result->fetch_assoc()) 
            {
                $states[] = $row;
            }
            echo json_encode($states);
            break;

        case 'getCities':
            $stateId = $_GET['state_id'];
            $result = $conn->query("SELECT id, name FROM cities WHERE state_id = $stateId");
            $cities = [];
            while ($row = $result->fetch_assoc()) 
            {
                $cities[] = $row;
            }
            echo json_encode($cities);
            break;
    }
}
?>
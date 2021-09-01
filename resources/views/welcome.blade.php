<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>distance calcule</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

div class="col-md-6">
<form method="POST" action="getMiles">
@csrf 
<div class="form-group"><label>adresse de départ: </label>
 <input class="form-control" id="from_places" placeholder="Enter a location" />
 <input id="origin" name="origin" required="" type="hidden" /></div>

<div class="form-group"><label>adresse d'arriver: </label>
 <input class="form-control" id="to_places" placeholder="Enter a location" /> 
 <input id="destination" name="destination" required="" type="hidden" /></div>

 <input class="btn btn-primary" type="submit" value="Calculate" /></form>
</div>
</div>
</div>
</body>

<script>

    //premiere function test(fonctionelle mais incomplète)
   /*function cities(){

    <form method="POST" action="getMiles">
    @csrf 
    <input type="text" name="pick" id="from_places" required>
    <input type="text" name="delivery" id="to_places" required>
  
    <input type="submit" name="send" id="Submit">

</form>
        var options= {
            types: ['(cities)']
        };

        var pickInput = document.getElementById('pick');
        var pickAutocomplete = new google.maps.places.Autocomplete(pickInput, options);

        var deliveryInput = document.getElementById('delivery');
        var deliveryAutocomplete = new google.maps.places.Autocomplete(deliveryInput, options);


    }*/
    
 
    $(function() {
        // ajout de mes inputs listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });

        });
      
      
    });



</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAb1UA5bvaHAPMhM-B1jAGeh0z5AiD27g&libraries=places&callback=cities"></script>


</html>
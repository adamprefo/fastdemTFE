<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @foreach ($devis as $devi)
    @foreach ($packs as $pack)
    @if(isset(Auth::user()->id) && Auth::user()->id == $devi->user_id && $devi->packs_id == $pack->id)

    <title>Devis n°{{$client->id}}</title>
    @endif
    @endforeach
    @endforeach

    <!-- Favicon -->
    <link rel="icon" href="/img/camion.jpg" type="image/x-icon" />


</head>

<body>
    <h1>Votre devis complet</h1>
    <h3>Because sometimes, all you need is something simple.</h3>


    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/img/logo.png" alt="Company logo" style="width: 100%; max-width: 200px" />
                            </td>

                            <td>
                                Facture #: {{$client->id}}<br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Fastdem Belgium,<br />
                                Rue De L'optimisme 55<br />
                                Bruxelles, 1000.
                            </td>
                        
                            <td>
                            @foreach ($users as $userss)
                            {{$userss->name}} {{$userss->lastname}}<br />
                                {{$userss->phone}}<br />
                               {{$userss->email}}
                               
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Votre devis comprend:</td>


                <td>Utilisateur n° {{$client->user_id}} #</td>

            </tr>

            <tr class="details">
                <td>Adresse de départ:</td>

                <td>{{$client->startAddress}}</td>
            </tr>

            <tr class="details">
                <td>Adresse de d'arriver:</td>

                <td>{{$client->finishAddress}}</td>
            </tr>

            <tr class="details">
                <td>statut du paiement:</td>

                <td>{{$client->status}}</td>
            </tr>

            <tr class="details">
                <td>Prix du devis HP (Hors Pack):</td>
                @foreach ($packs as $pack)
                @if( $client->pack_id == 1)

                <td> {{ $client->price - $pack->price}}€</td>
                   
            </tr>
              
                @endif
                @endforeach



           
                @foreach ($packs as $pack)
                @if(isset(Auth::user()->id) && Auth::user()->id == $devi->user_id && $devi->packs_id == $pack->id)
            <tr class="heading">
                <td>Votre pack comprend:</td>

                <td>{{$pack->name}}</td>
            </tr>

            <tr class="item">
                <td>Taille du camion:</td>

                <td> @if($pack->size_truck == 'Large') 
                    35
                    @else
                    45
                    @endif m²</td>
                
            </tr>

            <tr class="item">
                <td>Nombre de travailleur:</td>

                <td>{{$pack->nb_workers}} déménageurs</td>
            </tr>

            <tr class="item last">
                <td>Nombre d'heure prester:</td>

                <td>{{$pack->time_workers}} heures</td>
            </tr>
            <tr class="item last">
                <td>Prix du pack:</td>

                <td>{{$pack->price}} €</td>
            </tr>


            <tr class="total">
                <td></td>

                <td>Total: {{$client->price}} €</td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgb(37, 150, 190);

            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</body>

</html>
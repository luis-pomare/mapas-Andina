<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        <!-- Libreria de mapas -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <style>
            #map{
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }
        </style>
    </head>


    
    <body>
        <div id='map'></div>

        <!-- scripts -->
        <script>
            const coordenadas = {

            "locations": [

            {"nombre": "Bogotá", "latitud": 4.6097, "longitud": -74.0817},

            {"nombre": "Medellín", "latitud": 6.2442, "longitud": -75.5812},

            {"nombre": "Cali", "latitud": 3.4516, "longitud": -76.5320},

            {"nombre": "Barranquilla", "latitud": 10.9639, "longitud": -74.7969},

            {"nombre": "Cartagena", "latitud": 10.3910, "longitud": -75.4794},

            {"nombre": "Bucaramanga", "latitud": 7.1254, "longitud": -73.1198},

            {"nombre": "Santa Marta", "latitud": 11.2404, "longitud": -74.2115},

            {"nombre": "Pereira", "latitud": 4.8133, "longitud": -75.6961},

            {"nombre": "Manizales", "latitud": 5.0687, "longitud": -75.5174},

            {"nombre": "Villavicencio", "latitud": 4.1533, "longitud": -73.6350},

            {"nombre": "Pasto", "latitud": 1.2136, "longitud": -77.2811},

            {"nombre": "Ibagué", "latitud": 4.4389, "longitud": -75.2322},

            {"nombre": "Neiva", "latitud": 2.9273, "longitud": -75.2819},

            {"nombre": "Montería", "latitud": 8.7489, "longitud": -75.8810},

            {"nombre": "Cúcuta", "latitud": 7.8938, "longitud": -72.5078},

            {"nombre": "Popayán", "latitud": 2.4442, "longitud": -76.6145},

            {"nombre": "Tunja", "latitud": 5.5341, "longitud": -73.3634},

            {"nombre": "Arauca", "latitud": 7.0840, "longitud": -70.7576},

            {"nombre": "Quibdó", "latitud": 5.6922, "longitud": -76.6581},

            {"nombre": "Valledupar", "latitud": 10.4634, "longitud": -73.2532},

            {"nombre": "Yopal", "latitud": 5.3389, "longitud": -72.3947},

            {"nombre": "Riohacha", "latitud": 11.5444, "longitud": -72.9072},

            {"nombre": "Florencia", "latitud": 1.6144, "longitud": -75.6065},

            {"nombre": "Armenia", "latitud": 4.5343, "longitud": -75.6758},

            {"nombre": "Mocoa", "latitud": 1.1523, "longitud": -76.6428},

            {"nombre": "Mitú", "latitud": 1.1983, "longitud": -70.1732},

            {"nombre": "San Andrés", "latitud": 12.5788, "longitud": -81.7000},

            {"nombre": "Inírida", "latitud": 3.8652, "longitud": -67.9239},

            {"nombre": "Puerto Carreño", "latitud": 6.1850, "longitud": -67.4936},

            {"nombre": "Puerto Asís", "latitud": 0.5043, "longitud": -76.5016},

            {"nombre": "Puerto Leguízamo", "latitud": -0.1933, "longitud": -74.7775},

            {"nombre": "Leticia", "latitud": -4.2159, "longitud": -69.9403},

            {"nombre": "Puerto Inírida", "latitud": 3.8616, "longitud": -67.9297},

            {"nombre": "Arauquita", "latitud": 7.0311, "longitud": -71.4257},

            {"nombre": "Sogamoso", "latitud": 5.7196, "longitud": -72.9322},

            {"nombre": "Girardot", "latitud": 4.3094, "longitud": -74.8010},

            {"nombre": "Honda", "latitud": 5.1903, "longitud": -74.7416},

            {"nombre": "Lorica", "latitud": 9.2338, "longitud": -75.8204},

            {"nombre": "Ipiales", "latitud": 0.8225, "longitud": -77.6441},

            {"nombre": "Turbo", "latitud": 8.0882, "longitud": -76.7293},

            {"nombre": "Girón", "latitud": 7.0682, "longitud": -73.1696},

            {"nombre": "Chía", "latitud": 4.8614, "longitud": -74.0296},

            {"nombre": "Zipaquirá", "latitud": 5.0234, "longitud": -74.0071},

            {"nombre": "Moniquirá", "latitud": 5.8906, "longitud": -73.5506},

            {"nombre": "Aguazul", "latitud": 5.1694, "longitud": -72.6455},

            {"nombre": "El Carmen de Bolívar", "latitud": 9.7202, "longitud": -75.1200},

            {"nombre": "Sabaneta", "latitud": 6.1509, "longitud": -75.6236},

            {"nombre": "Ciénaga", "latitud": 11.0046, "longitud": -74.2365}

            ]

            }


            let map = L.map('map').setView([4.5709, -74.2973], 5)
            L.tileLayer('https://api.maptiler.com/maps/basic-v2/{z}/{x}/{y}.png?key=2d9qf8gQKueHi3WUJd9F', {
                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
            }).addTo(map);
            
            async function delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            async function addMarkersWithDelay() {
            for (const coordenada of coordenadas.locations) {
                L.marker([coordenada.latitud, coordenada.longitud]).addTo(map);
                await delay(1000); 
            }
            }

            addMarkersWithDelay();
        </script>
    </body>
</html>

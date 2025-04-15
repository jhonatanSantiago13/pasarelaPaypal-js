pequeño ejemplo para realizar cobros con la pasarela de pagos Paypal usando JS

en index.php muestra el boton de pagar con Paypal y pagar con tarejeta de credito o de debito en index3.php solo se muestra pagar co ntarejta de credito o de debito

index.php cambiar en la SDK el client Id

<script src="https://www.paypal.com/sdk/js?client-id=CLIENT_ID¤cy=MXN"> </script>
index3.php

<script src="https://www.paypal.com/sdk/js?client-id=CLIENT_ID¤cy=MXN&components=buttons&locale=es_MX&buyer-country=MX"> </script>
NOTA: en el SDK del index3.php se muestra la configuración para idioma español y dirección mexicana &locale=es_MX&buyer-country=MX
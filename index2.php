<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script
            src="https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN"
            
></script> -->

<!-- <script 
    src="https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN&components=buttons,funding-eligibility">
</script> -->

</head>
<body>

<div id="paypal-button-container"></div>

<script>
 // Cargar el SDK de PayPal con los componentes necesarios
 var script = document.createElement('script');
    script.src = "https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN&components=buttons,funding-eligibility";
    script.async = true;

    // Esperar a que el SDK de PayPal cargue completamente
    script.onload = function() {
        // Ahora podemos renderizar el botón
        paypal.Buttons({
            fundingSource: paypal.FUNDING.CARD,  // Ajusta según lo que desees mostrar
            style: {
                color: 'black',
                shape: 'pill',
                label: 'pay',
                height: 40
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '3000'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location.href = 'detalle-compra.php?orderID=' + details.id + '&amount=' + details.purchase_units[0].amount.value;
                });
            },
            onCancel: function(data) {
                alert('Pago cancelado');
                console.log(data);
            }
        }).render('#paypal-button-container');  // Renderizar en el contenedor
    };

    // Insertar el script en el documento
    document.head.appendChild(script);
</script>    
</body>
</html>
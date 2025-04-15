<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Initialize the JS-SDK -->
 <script
            src="https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN"
            
></script>
</head>
<body>

    <div id="paypal-button-conteiner"></div>

    <script>

        paypal.Buttons({
            
            style:{
                size: 'responsive',
                height: 40,
                color: 'blue',
                shape: 'pill',
                label : 'pay',
            
            },
            createOrder: function(data,action) {
                
                return action.order.create({
                    purchase_units: [{
                        amount:{
                            //monto de la compra
                            value: 3000
                        },
                        payment_instruction: {
                                installment_options: [
                                    {
                                        term: 3, // Opción de 3 meses
                                        type: 'PAY_LATER'
                                    },
                                    {
                                        term: 6, // Opción de 6 meses
                                        type: 'PAY_LATER'
                                    }
                                ]
               }
                    }]
                });

            },
            onApprove: function(data,action) {
                // Captura el pago
                action.order.capture().then(function(details){
                    // alert('Gracias por su compra, ' + details.payer.name.given_name);
                    // console.log(details);

                    const orderID = details.id;
                    const amount = details.purchase_units[0].amount.value;
                    const payerName = details.payer.name.given_name;
                    const payerSurName = details.payer.name.surname;
                    const payerEmail = details.payer.email_address;
                    

                    console.log('ID de la orden: ' + orderID);
                    console.log('Monto: ' + amount);
                    console.log('Nombre: ' + payerName);
                    console.log('Apellido: ' + payerSurName);
                    console.log('Email: ' + payerEmail);
               
                    // window.location.href = 'detalle-compra.php?orderID=' + details.id + '&amount=' + details.purchase_units[0].amount.value; 
                });
            },
            onCancel: function(data){
                alert('Pago cancelado');
                console.log(data);
            }

        }).render('#paypal-button-conteiner'); // Renders the PayPal button into #paypal-button-container
        // This function displays Smart Payment Buttons on your web page.
        
        
    // https://www.youtube.com/watch?v=nAz8xRQaPZQ
    /* -- activar meses sin intereses
    https://www.paypal.com/businessmanage/preferences/installmentplan
    */
    </script>

</body>
</html>
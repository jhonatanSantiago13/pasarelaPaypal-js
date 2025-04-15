<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pago con Tarjeta</title>

  <!-- Incluir solo el componente de botones -->
  <!-- <script
    src="https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN&components=buttons"
  ></script> -->
  <script
  src="https://www.paypal.com/sdk/js?client-id=AfMYcMtWq_i1D2JOlPyccVRs6kTtEvjy-IqfDnJd-e8XVhdZjEJN6fkMdmnXJ-GuZkdF7UMkqt-Q86NK&currency=MXN&components=buttons&locale=es_MX&buyer-country=MX">
</script>

</head>
<body>
<div id="paypal-button-container"></div>

  <script>
    paypal.Buttons({
      // Mostrar solo el botón de tarjeta
      fundingSource: paypal.FUNDING.CARD,

      style: {
        layout: 'vertical',
        color: 'black',
        shape: 'pill',
        label: 'pay',
        height: 45
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '3000'
            }
          }]
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
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
        });
      },

      onCancel: function (data) {
        alert('Pago cancelado');
        console.log(data);
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
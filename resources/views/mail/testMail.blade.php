<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Conferma Ordine</title>
  </head>
  <body>
    <h1>Conferma Ordine</h1>

    <p> {{$order['firstname']}} {{$order['lastname']}}, il tuo ordine è stato accettato. </p>
    <p> Verrà consegnato il prima possibile a questo indirizzo: {{$order['address']}}.</p>
    <p> Totale: {{$order['total_price']}}€.</p>
    <p> Ti ringraziamo per il tuo acquisto e ti auguriamo Buon Appetito.</p>
    <h5 style="color: lightblue"> A presto, Team Deliveboo.</h5>


  </body>
</html>

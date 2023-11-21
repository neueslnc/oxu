<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS чек</title>
    <link rel="stylesheet" href="./style.css">
    
  </head>
  <body class="bill">
    <section id="bill-print" class="bill-print">
      <div class="bill-print-header">
        <h1 style="color : black;">coffich</h1>
        <p>
          <span style="color : black;">Ор-р Ан Нажод </span>
        </p>
        <p style="color : black;">Телефон: +998 (97) 8610010 <br>+998 (97) 8620010</p>
        <p style="color : black;"> +998 (97) 8630010 <br>+998 (97) 8640010</p>
        <p style="color : black;">14/08/20223 14:05</p>
      </div>
      <div class="bill-print-products">
        <p>
          <span style="color : black;">Товары</span>
          <span style="color : black;">Цена</span>
          <span style="color : black;">Кол-во</span>
        </p>
      </div>
      <div class="bill-print-total">
        <p>
          <span style="color : black;">Итог:</span>
          <span style="color : black;">1000</span>
        </p>
      </div>
    </section>
    <section class="bill-actions">
      <button id="print">Печать чека</button>
      <button id="new">Назад</button>
    </section>
    <script>
      (function() {
        let printButton = document.querySelector('#print');
        let newButton = document.querySelector('#new');
        
        printButton.addEventListener( 'click', function( e ) {
          window.print();
        });
      })();
    </script>
  </body>
</html>
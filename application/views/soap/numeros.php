<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h5>Esta seccion se intento pero no funciono marco error en los cors</h5>
<div class="Contenedor">
    <form>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingNumero" name="idusario" placeholder="usuario">
            <label for="floatingNumero">Número</label>
        </div>
        <div class="botonesAccion">
            <button type="button" onclick="convertir()"  class="btn btn-success">Enviar</button>
        </div>
    </form>
    <div id="cardNumber" class="card">
    </div>
</div>

<script>
    
    // $(document).ready(function(){
        function convertir(){
            console.log($("#floatingNumero").val());
            $.ajax({
                url: `https://www.dataaccess.com/webservicesserver/NumberConversion.wso`, // La URL a la que se enviará la petición
                method: 'POST',        // El método HTTP (GET, POST, PUT, DELETE, etc.)
                dataType: 'xml',     // El tipo de dato esperado en la respuesta ('html', 'xml', 'json', 'text', 'script')
                contentType: 'text/xml',
                data:   `
                        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                        <soap:Body>
                            <NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/">
                            <ubiNum>${$("#floatingNumero").val()}</ubiNum>
                            </NumberToWords>
                        </soap:Body>
                        </soap:Envelope>
                        `,
                headers: {
                            "SOAPAction": "http://www.dataaccess.com/webservicesserver/NumberConversion.wso/NumberToWords"
                        },
                success: function(data) {

                    console.log(data);
                            // var row = '<div class="card">' +
                            //             '<div class="card-header">' + data +"</div>" +
                            //             '<div class="card-body">' + '<h5 class="card-title">' + "Mostrar" + "</h5>" + "</div>" + 
                            //           "</div>";
                            // $("#cardNumber").append(row);
                },
                error: function(xhr, status, error) {
                    // Esta función se ejecuta si hay un error en la petición
                    console.error('Error:', status, error);
                    $("#cardNumber").empty(); 
                    var row =  '<tr>' +
                                    `<td colspan="4" class="text-center fs-5">Ocurrió un error al convertir el número. Por favor, inténtelo nuevamente.${error}</td>` +
                                '</tr>';
                    $("#cardNumber").append(row);
                    // Aquí puedes manejar el error
                },
                complete: function(xhr, status) {
                    // Esta función se ejecuta siempre, independientemente del éxito o el error
                    console.log('Completado:', status);
                    // Esta función se ejecuta si la petición es exitosa
                }
    });
}
</script>
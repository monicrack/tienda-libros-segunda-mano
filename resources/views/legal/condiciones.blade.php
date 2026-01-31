{{-- Vista que muestra el aviso legal del sitio web.
     Proporciona información condiciones de venta --}}

@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-center mb-4" style="color:#D4AF37;" id="libros">Condiciones de Venta</h1>
    <p class="text-dark">
        Las presentes Condiciones Generales de Venta tienen por objeto regular el acceso y el régimen de
        adquisición de los productos y servicios facilitados por la web de la librería <strong>ReLibroManía.</strong>
    </p>
    <h2>Aceptación</h2>
    <p class="text-dark">
        La realización de una compra en el sitio web, supone la aceptación por el usuario de de todas las cláusulas
        dispuestas en el momento de la contratación, con lo que se considera que ha leído y comprende las presentes
        condiciones generales de venta, a las que el usuario tendrá derecho de acceso siempre y, en especial,
        antes del inicio del procedimiento de contratación de productos.
    </p>
    <h2>Modificación</h2>
    <p class="text-dark">
        Estas condiciones generales de venta podrán ser modificadas por el titular del sitio web sin previo aviso,
        considerándose vigentes en cada momento la versión publicada en la web en el momento de la contratación.
        Por este motivo, la librería TROTALIBROS insta al usuario a leer atentamente las condiciones de venta cada
        vez que proceda a la contratación de algún producto o servicio.
    </p>

    <h2>Características de los productos</h2>
    <p class="text-dark">
        Con carácter general, los productos ofertados a través del sitio web son libros de segunda mano.
        Todos los ejemplares pasan un control de calidad antes de su comercialización, siendo además revisados
        específicamente antes del envío. En ningún caso se enviaran libros con defectos que impidan la correcta
        utilización por parte del comprador. Algunos libros, no obstante, pueden presentar marcas debidas al uso
        o al paso del tiempo, o algún nombre o dedicatoria en el interior siempre que no afecten a la utilización
        del producto.
    </p>
    <h2>Precios</h2>
    <p class="text-dark">
        Los precios y tarifas aplicables a la contratación de los productos o servicios ofrecidos, serán los que
        figuren en el momento en que se inicie el proceso de contratación. Los precios de los libros incluyen los
        impuestos aplicables. Antes de proceder a la compra se le informará del precio completo, incluyendo los
        gastos de envío, que aparecerán desglosados.
    </p>
    <p class="text-dark">
        Los precios y descripciones de los productos podrán ser modificados cuando el titular del sitio web lo 
        considere conveniente, comprometiéndose a que esté visible el precio a aplicar en el momento de la 
        contratación.
    </p>
    <h2>Cancelación y derecho de desestimiento</h2>
    <p class="text-dark">
        El comprador tiene derecho, conforme a la legislación vigente, a desistir del contrato durante un periodo 
        de 14 días naturales sin necesidad de indicar justificación, salvo excepción legal. Transcurrido este plazo 
        desde la fecha de celebración del contrato, se dará por concluido el periodo de desistimiento. Para ejercer 
        su derecho, el cliente comunicará fehacientemente su decisión a través de una carta enviada por correo postal 
        o correo electrónico en la que se indique con claridad el número de pedido. En dicha comunicación, 
        además de su deseo de desistir del contrato de compraventa, deberán figurar con claridad el nombre y 
        dirección del comprador, así como el número de pedido y la fecha. Si así lo desea, tenemos a su disposición 
        un formulario de desistimiento que le podemos proporcionar. No dude en solicitarlo.
    </p>
    <p class="text-dark">
        En todos los casos, una vez efectuada la comunicación, el comprador hará llegar la totalidad de los ejemplar
        es incluidos en el pedido objeto de la devolución en el mismo estado en el que le fueron entregados, en un 
        plazo no superior a 14 días naturales a partir de la fecha en que comunique su decisión de desistimiento 
        del contrato. Una vez recibidos los artículos y comprobado su estado, la librería reembolsará a la mayor 
        brevedad el importe total de los libros, excluidos los gastos de envío, que correrán por cuenta del 
        comprador, excepto en aquellos casos en que la devolución sea causada por algún defecto que impida el 
        normal uso del artículo.
    </p>
    <h2>Modalidades, Gastos y Plazos de envío</h2>
    <p class="text-dark">
        Los gastos de envío correrán por cuenta del comprador y serán a añadir al precio de los libros adquiridos. 
        En todos los casos, antes de confirmar el pedido el comprador dispondrá de la información exacta del 
        coste de los gastos de envío. El plazo estimado es de 72/96h desde la expedición. Los pedidos se expiden 
        dentro de las 48 horas siguientes a la recepción del pedido, excepto para pedidos recibidos a partir de las 
        12h del viernes, en los que el envío se efectuará el lunes o el siguiente día laborable.
    </p>
</div>
@endsection
{{-- Vista que muestra la política de protección de datos del sitio web.
     Proporciona información sobre se tratan los datos, quién es el responsable,
     la información que se recopila, su finalidad y para que se usan --}}

@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-center mb-4" style="color:#D4AF37;" id="libros">Protección de datos</h1>
    <p class="text-dark">

        En <strong>ReLibroManía</strong> valoramos tu privacidad y nos comprometemos a cumplir con el Reglamento General
        de Protección de Datos (RGPD) y demás normativas aplicables en España. A continuación, te explicamos cómo
        recopilamos, utilizamos y protegemos tus datos personales.
    </p>
    <h2>Responsable del tratamiento</h2>
    <p class="text-dark">
        El responsable del tratamiento de los datos recabados a través de este sitio web es:
        <br><strong>ReLibroManía</strong>
        <br>Email de contacto: libros@relibromania.es
    </p>
    <h2>Información que recopilamos</h2>
    <p>Podemos recopilar los siguientes datos personales:</p>
    <ul>
        <li>Nombre y apellidos</li>
        <li>Correo electrónico</li>
        <li>Dirección de envío</li>
        <li>Datos de navegación y uso del sitio web</li>
    </ul>
    <p>Los datos personales solo se utilizarán para las finalidades indicadas y no se cederán a terceros sin
        consentimiento previo del usuario, salvo obligación legal.</p>
    <h2>Finalidad del tratamiento</h2>
    <p class="text-dark">
        Utilizamos tus datos para:
    </p>
    <ul>
        <li>Gestionar tus compras y pedidos</li>
        <li>Responder a consultas o solicitudes</li>
        <li>Mejorar la experiencia de usuario</li>
        <li>Enviar comunicaciones relacionadas con tu actividad en la web</li>
    </ul>
    <h2>Legitimación</h2>
    <p class="text-dark">
        La base legal para el tratamiento de tus datos es tu consentimiento, la ejecución de un contrato
        o el cumplimiento de obligaciones legales.
    </p>
    <h2>Conservación de los datos</h2>
    <p class="text-dark">
        Los datos se conservarán durante el tiempo necesario para cumplir con las finalidades descritas
        o mientras exista una relación contractual
    </p>
    <h2>Derechos del usuario</h2>
    <p class="text-dark">
        Puedes ejercer tus derechos de acceso, rectificación, supresión, oposición, portabilidad y limitación escribiendo a:
    </p>
    <p><strong>libros@relibromania.es</strong></p>
    <h2>Política de menores</h2>
    <p class="text-dark">
        Quien facilita los datos a través de los formularios de esta Web y acepta su tratamiento declara formalmente
        ser mayor de 14 años. Queda prohibido el acceso y uso del portal a los menores de 14 años de edad.
        El RESPONSABLE recuerda a las personas mayores de edad que tengan a su cargo menores, que será de su exclusiva
        responsabilidad si algún menor incorpora sus datos para solicitar algún producto. También les informa que existen
        programas informáticos para acotar la navegación mediante el filtro o bloqueo a determinados contenidos.
    </p>
    <h2>Seguridad</h2>
    <p class="text-dark">
        Implementamos medidas técnicas y organizativas para proteger tus datos frente a accesos no autorizados,
        pérdida o alteración.
    </p>
    
</div>
@endsection
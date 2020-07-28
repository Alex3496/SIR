@extends('layouts.base')

@section('content')
<div class="container" id="Us">
  <div class="row">
    <div class="col-12 col-md-6">
      <h2>Nosotros</h2>
      <p>Somos una compaña que ofrece servicio online de reservaciones para envíos de mercancía a nivel internacional, con SIR se hace posible la reserva integral de envíos comerciales en pocos minutos, sin necesidad de esperar días o semanas por una cotización.</p>

      <p>El <b>Sistema Intermodal de Reservaciones</b> (SIR) nació 2019 con la idea de facilitar a los importadores y exportaciones el acceso de tarifas y cotización de transporte: terrestre, marítimo y aéreo en tiempo real, ahorrando a las empresas horas o incluso días para recibir una cotización para su envió de mercancía.</p>

      <p>Con un equipo de expertos recibirás ayuda comercial y operativa especializada a lo largo de todo el proceso de importación o exportación de tu mercancía.</p>
    </div>
    <div class="col-12 col-md-6 center" >
      <img src="{{asset('images/puerto2.jpg')}}" alt="" srcset="">
    </div>
  </div>
</div>
<div id="Us_content" class="container">
  <div class="row">
    <div class="col">
      <h2>Misión</h2>
      <p>Ser la plataforma por excelencia donde los importadores y exportadores a nivel internacional puedan cotizar y reservar su envió en pocos minutos.</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h2>Visión</h2>
      <p>Evolucionar la forma de hacer la reserva y transportación de mercancía a nivel internacional, brindando a los importadores y exportadores solución de forma rápida y eficiente.</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h2>Valores</h2>
      <ul id="values-list">
        <li><b>Transformación:</b> Buscamos generar cambios en el entorno en el que operan las empresas de transporte y la logística. </li>
        <li><b>Honestidad:</b> Manejarse con transparencia y siempre hablar con la verdad es nuestro un valor fundamental. </li>
        <li><b>Mejora Continúa:</b> Buscamos la excelencia en nuestros procesos y métodos de trabajo. </li>
        <li><b>Pasión:</b> Todos los que somos parte SIR damos lo mejor para que las cosas sucedan y así transmitir nuestro valor a clientes y proveedores. </li>
      </ul>
    </div>
  </div>
</div>
@endsection
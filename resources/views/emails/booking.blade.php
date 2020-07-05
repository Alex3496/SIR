<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet"> 
    <style type="text/css">
      img{
        margin: 1rem;
        max-height: 64px;
      }
      body{
        font-family: 'Heebo', sans-serif;
        background-color: #eaeaea
      }
      ul{
        list-style-type: none;
        padding-left: 10px;
      }
      h4{
        margin: .5rem 0;
      }
      p{
        margin-top: .5rem;
      }
      .container{
        display: flex;
        justify-content: center;
      }
      .card{
        width: 100%;
        border: solid 1px ;
        background-color: #fff;
        border-color: #c8c8c8;
        border-radius: 5px;
      }
      .card-header{
        padding: 15px;
        background-color: #c8c8c8;
        display: flex;
        justify-content: space-around;
        align-content: center;
        border-radius: 5px 5px 0 0;
      }
      .card-body{
        padding: 2rem;
      }
      .row {
        display: flex;
        justify-content: space-around;

      } 
    </style>
  </head>
  <body>
    <main>
      <div class="container">
        <div class="card">
          <div class="card-header">
            <img src="{{ asset('images/logos/logo.png') }}"/>
            <h1>{{__('IBooking System')}}</h1>
          </div>
          <div class="card-body">
            <h4>Solicitud de transporte</h4>
            <p>El usuario: {{$user['name']}}, esta intereado en una de tus tarifas registradas:</p>
              <div>
                <small>{{ __('Origen') }}:</small>
                <h4>{{$tariff->origin}}</h4>
                <p>{{$tariff->get_state_origin}}, {{$tariff->get_country_origin}}</p>
              </div>   
              <div>
                <small>{{ __('Destino') }}:</small>
                <h4>{{$tariff->destiny}}</h4>
                <p>{{$tariff->get_state_destiny}}, {{$tariff->get_country_destiny}}</p>
              </div>
              <ul>
                <li><b>{{__('Precio')}}:</b> {{$tariff->rate}} <small>dlls</small> </li>
                <li><b>{{__('Transporte')}}:</b>  {{$tariff->get_type_tariff}} </li>
                <li><b>{{__('Contenedor')}}:</b> {{$tariff->get_type_equipment}} </li>
              </ul>
            <hr/>
            <label>Datos del usuario</label>
            <ul>
              <li><b>{{__('Nombre')}}:</b> {{$user['name']}}</li>
              <li><b>{{__('Empresa')}}:</b> {{$user['company_name']}}</li>
              <li><b>{{__('Correo')}}:</b> {{$user['email']}}</li>
              @if($user['phone'])
                <li><b>{{__('Telefono')}}:</b> {{$user['phone']}}</li>
              @endif
              @if($user['date'])
                <li><b>{{__('Fecha de envio')}}:</b> {{$user['date']}}</li>
              @endif
              @if($user['message'])
                <li><b>{{__('Mesanje')}}</b><br><p>{{$user['message']}}</p></li>
              @endif
            </ul>
            <hr>
            <label>Ponte en contacto con el para realizar la negacion.</label>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

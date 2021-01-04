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
      .card-footer{
        height: 6rem;
        padding: 1.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #c8c8c8; ;
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
            <h4>Interesado en tu petición</h4>
            <p>El usuario: {{$user['name']}}, esta interesado en una de las peticiones publicadas</p>
              <div>
                <small>{{ __('Origen') }}:</small>
                <h4>{{$petition->origin}}</h4>
                <p>{{$petition->get_state_origin}}, {{$petition->get_country_origin}}</p>
              </div>   
              <div>
                <small>{{ __('Destino') }}:</small>
                <h4>{{$petition->destiny}}</h4>
                <p>{{$petition->get_state_destiny}}, {{$petition->get_country_destiny}}</p>
              </div>
              <ul>
                <li><b>{{__('Precio')}}:</b> {{$petition->rate}} <small>{{$petition->currency}}</small> </li>
                <li><b>{{__('Contenedor')}}:</b> {{$petition->get_type_equipment}} </li>
              </ul>
            <hr/>
            <label>Datos del Usuario y/o Empresa</label>
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
              @if($user['collection_address'])
                <li><b>{{__('Dirección de Recolección')}}:</b> {{$user['collection_address']}}</li>
              @endif
              @if($user['delivery_address'])
                <li><b>{{__('Dirección de Entrega')}}:</b> {{$user['delivery_address']}}</li>
              @endif
            </ul>
            <hr>
            <label>Ponte en contacto con el usuario para realizar la negociación.</label>
          </div>
          <div class="card-footer">
            <p>Todos los derechos reservados 2020 SIR</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

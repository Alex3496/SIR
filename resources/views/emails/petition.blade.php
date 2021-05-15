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
      .flex-start{
        display: flex;
        justify-content: flex-start;
        align-items: center;
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
            <h4>Interesado en tu Carga publicada</h4>
            <p>El usuario: {{$user['name']}}, esta interesado en una de tu Cargas publicadas</p>
              <div>
                <small>{{ __('Origen') }}:</small>
                <p> {{$petition->origin}} {{$petition->get_state_origin}}, {{$petition->get_country_origin}}</p>
              </div>   
              <div>
                <small>{{ __('Destino') }}:</small>
                <p> {{$petition->destiny}} {{$petition->get_state_destiny}}, {{$petition->get_country_destiny}}</p>
              </div>
              <ul>
                <li><b>{{__('Precio')}}:</b> {{$petition->rate}} <small>{{$petition->currency}}</small> </li>
                <li><b>{{__('Contenedor')}}:</b> {{$petition->get_type_equipment}} </li>
                <li><b>{{__('Disponible hasta:')}}</b> {{$petition->load_date}} {{$petition->load_hour}} </li>
                @if(isset($petition->po_reference))
                  <li><b>#PO / Referencia:</b> {{ $petition->po_reference }}</li>
                @endif
                @if(isset($petition->bill_landing))
                  <li><b>Bill of Landing:</b>  {{ $petition->bill_landing }}</li>
                @endif
              </ul>
            <hr/>
            <ul>
              <li><b>{{__('Nombre')}}:</b> {{$user['name']}}</li>
              <li><b>{{__('Empresa')}}:</b> {{$user['company_name']}}</li>
              <li><b>{{__('Correo')}}:</b> {{$user['email']}}</li>
              @if($user['phone'])
                <li><b>{{__('Telefono')}}:</b> {{$user['phone']}}</li>
              @endif
              @if($user['message'])
                <li><b>{{__('Mesanje')}}:</b><br><p>{{$user['message']}}</p></li>
              @endif
            </ul>
            <hr>
            <label>Ponte en contacto con el usuario para realizar la negociación.</label>
          </div>
          <div class="card-footer">
            <p>Todos los derechos reservados 2021 SIR</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

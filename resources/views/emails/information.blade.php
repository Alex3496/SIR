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
      h2{
        margin: .5rem 0;
        text-align: center;
      }
      h1{
        text-align: center;
      }
      p{
        margin-top: .5rem;
      }
      .container{
        display: flex;
        justify-content: center;
      }
      .card{
        width: 50%;
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
        display: flex;
        flex-direction: column;
        justify-content: space-around;
      }
      .row {
        display: flex;
        justify-content: space-around;

      }

      .text-left{
        text-align: left;
      }

      @media (max-width: 800px){

        .card{
          width: 100%;
          border: solid 1px ;
          background-color: #fff;
          border-color: #c8c8c8;
          border-radius: 5px;
        }

        .card-header{
          padding: 15px 15px 15px 15px;
          background-color: #c8c8c8;
          display: flex;
          justify-content: space-between;
          align-content: center;
          border-radius: 5px 5px 0 0;
        }


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
            <h4>Solicitud de información</h4>
            <p>Un usuario ha solicitado información, tiene alguna duda o pregunta.</p>
            <h3>Datos del usuario:</h3>
              <div>
                <small>{{ __('Nombre') }}:</small>
                <h4 class="ml"> {{$information['name']}} {{$information['lastName']}} </h4>
              </div>   
              <div>
                <small>{{ __('Correo') }}:</small>
                <h4 class="ml"> {{$information['email']}}</h4>
              </div>
              <div>
                <small>{{ __('Teléfono') }}:</small>
                <h4 class="ml"> {{$information['phone'] ?? '-'}}</h4>
              </div>
              <div>
                <small>{{ __('Mensaje') }}:</small>
                <h4 class="ml"> {{$information['message']}}</h4>
              </div>
            <hr>
            <label>Contacta con el usuario, para resolver cualquier duda que tenga.</label>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

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
        height: 15rem;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        text-align: center;
      }
      .row {
        display: flex;
        justify-content: space-around;

      }

      @media (max-width: 800px){

        .card{
          width: 100%;
          border: solid 1px ;
          background-color: #fff;
          border-color: #c8c8c8;
          border-radius: 5px;
          text-align: center;
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
            <h2>Verificar correo</h2>
            <p>Haz click en el siguiente enlace para verificar tu cuenta.</p>
            <a href="{{$verificationUrl}}" class="btn btn-success"> Verifica Cuenta</a>
            <p>Si no has creado una cuenta con nosotros, ignora este correo.</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

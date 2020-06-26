<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet"> 
    <style type="text/css">
      img{
        margin: 1rem;
        height: 64px;
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
            <h4>Cambiar contraseña</h4>
            <p>Haz click en el siguinte enlace para restablecer tu comtraseña</p>
            <a href="{{$url}}">  Restablecer contraseña</a>
            <p>Si no has crado una cuanta con nosotros no hagas nada</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"/>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col">
    		<h1>Saludos</h1>
    		<p>Haz click en el siguinte enlace para restablecer tu comtraseña</p>
    		<a href="{{$url}}" class="btn btn-success">  Restablecer contraseña</a>
    		<p>Si no has crado una cuanta con nosotros no hagas nada</p>
    		</div>
    	</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>

    <table width="100%" border="0">
      <tbody>
        <tr>
          <td colspan="3"> <img src="{{asset('img/Logo.png')}}" width="300" alt=""> </td>
        </tr>
        <tr>
          <td></td>
           <td> <center><p width="150" style="background-color:black;"><img src="{{asset('img/logo2.png')}}" ></p> </center></td>
           <td></td>
        </tr>
        <tr>
            <td colspan="3"> <center><h2>CORREO INSTITUCIONAL<br> GOBIERNO AUTÓNOMO MUNICIPAL DE POTOSÍ </h2></center> </td>
        </tr>
        <tr>
            <td colspan="3"> <center><h2>{{ $dato->nombre }} </h2></center> </td>
        </tr>

        <tr>
          <td colspan="3">
            <br><br>
            <table>
              <tr> <th style="font-size: 25px;"> Dirección URL: </th>          <td> http://correo.potosi.bo/ </td>   </tr>
              <tr> <th style="font-size: 25px;"> Usuario: </th>                <td> {{$dato->correo}} </td>          </tr>
              <tr> <th style="font-size: 25px;"> Contraseña: </th>             <td> {{$dato->clave}} </td>           </tr>
              <tr> <th style="font-size: 25px;"> Correo: </th>                 <td> {{$dato->correo}}@potosi.bo </td></tr>
              <tr> <td colspan="2">&nbsp;</td> </tr>
            </table>
          </td>
        </tr>

        <tr>
          <td colspan="3"> <center> Potosí – {{date('Y')}} </center> </td>
        </tr>
      </tbody>
    </table>

  </body>
</html>

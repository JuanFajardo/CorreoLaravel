@extends('gamp')

@section('empleado')   @endsection
@section('titulo') Bienes @endsection


@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}


        <div class="row">
          <div class="col-md-6">
            <label for="correo_" > <b><i>Correo</i></b> </label>
            {!! Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'id'=>'correo_', 'required']) !!}
          </div>
          <div class="col-md-6">
            <label for="clave_" > <b><i>Clave</i></b> </label>
            {!! Form::text('clave', null, ['class'=>'form-control', 'placeholder'=>'Clave', 'id'=>'clave_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="nombre_" > <b><i>Nombre Completo</i></b> </label>
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'id'=>'nombre_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="cargo_" > <b><i>Cargo Institucional</i></b> </label>
            {!! Form::text('cargo', null, ['class'=>'form-control', 'placeholder'=>'Cargo Institucional', 'id'=>'cargo_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="unidad_" > <b><i>Unidad</i></b> </label>
            {!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder'=>'Unidad', 'id'=>'unidad_', 'required', 'list'=>'lista-unidad']) !!}
            <datalist id="lista-unidad">
              @foreach($unidads as $unidad)
                <option value="{{$unidad->unidad}}">
              @endforeach
            </datalist>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="entrega_" > <b><i>Entrega de Correo</i></b> </label>
            {!! Form::select('entrega', ['SI'=>'SI', 'NO'=>'NO'], 'NO', ['class'=>'form-control', 'id'=>'entrega_', 'required']) !!}
          </div>
          <div class="col-md-6">
            <label for="observacion_" > <b><i>Observacion</i></b> </label>
            {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion_']) !!}
          </div>
        </div>

        <hr>

        {!! Form::hidden('id_usuario', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">

                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Correo.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-6">
                        <label for="correo" > <b><i>Correo</i></b> </label>
                        {!! Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'id'=>'correo', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="clave" > <b><i>Clave</i></b> </label>
                        {!! Form::text('clave', null, ['class'=>'form-control', 'placeholder'=>'Clave', 'id'=>'clave', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="nombre" > <b><i>Nombre Completo</i></b> </label>
                        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'id'=>'nombre', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="cargo" > <b><i>Cargo Institucional</i></b> </label>
                        {!! Form::text('cargo', null, ['class'=>'form-control', 'placeholder'=>'Cargo Institucional', 'id'=>'cargo', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="unidad" > <b><i>Unidad</i></b> </label>
                        {!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder'=>'Unidad', 'id'=>'unidad', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="entrega" > <b><i>Entrega de Correo</i></b> </label>
                        {!! Form::select('entrega', ['SI'=>'SI', 'NO'=>'NO'], null, ['class'=>'form-control', 'id'=>'entrega', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="entrega" > <b><i>Fecha Entrega</i></b> </label>
                        {!! Form::text('fecha_activacion', null, ['class'=>'form-control', 'id'=>'fecha_activacion', 'readonly']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="observacion" > <b><i>Fecha Desactivado</i></b> </label>
                        {!! Form::text('fecha_desactivacion', null, ['class'=>'form-control', 'id'=>'fecha_desactivacion', 'readonly']) !!}
                      </div>
                    </div>

                    <hr>

                    {!! Form::hidden('id_usuario', '1') !!}

                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection


@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo Correo </a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{asset('index.php')}}"   >  Inicio </a>
                    </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Unidad</th>
                                    <th>Cargo</th>
                                    <th>Activo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{ $dato->id }}</td>
                                        <td>{{ $dato->correo }}@potosi.bo</td>
                                        <td>{{ $dato->nombre }}</td>
                                        <td>{{ $dato->unidad }}</td>
                                        <td>{{ $dato->cargo }}</td>
                                        <td>
                                          @if ( $dato->activo == '1' )
                                            <a class="span span-primary">  Activado en {{ $dato->fecha_activacion }} </a>
                                          @else
                                            <a class="span span-danger">Desactivado en {{ $dato->fecha_desactivacion }} </a>
                                          @endif
                                        </td>
                                        <td>
                                          <a href="{{asset('index.php/Correo/reporte/'.$dato->id)}}"  class="" style="color: #007bff;"> <li class="fa fa-file-pdf"></li> Imprimir</a> &nbsp;&nbsp;&nbsp;
                                          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                          <!--<a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Nueva Clave</a>-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Correo.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaAgenda').DataTable({
                "order": [[ 0, 'desc']],
                "language": {
                    "bDeferRender": true,
                    "sEmtpyTable": "No ay registros",
                    "decimal": ",",
                    "thousands": ".",
                    "lengthMenu": "Mostrar _MENU_ datos por registros",
                    "zeroRecords": "No se encontro nada,  lo siento",
                    "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
                    "infoEmpty": "No ay entradas permitidas",
                    "search": "Buscar ",
                    "infoFiltered": "(Busqueda de _MAX_ registros en total)",
                    "oPaginate":{
                        "sLast":"Final",
                        "sFirst":"Principio",
                        "sNext":"Siguiente",
                        "sPrevious":"Anterior"
                    }
                }
            });
        });
        /*
        $('.nuevo').click(function(event){
          event.preventDefault();
          $('#form-insert').closest('form').find("input[type=text], textarea").val("");
        });
        */

        $('#correo_').click(function(event){
            var clave = "";
            for(i=1; i<=10; i++){
              var numero = Math.floor(Math.random() * 10);
              if(numero % 2 == 0 ){
                var dato = Math.floor(Math.random() * (48 - 57 + 1) ) + 57;
                var ascii = String.fromCharCode(dato);
              }else{
                var dato = Math.floor(Math.random() * (65 - 90 + 1) ) + 90;
                var ascii = String.fromCharCode(dato);
              }
              clave = clave + ascii;
            }
            $('#clave_').val(clave);
        });


        $('.actualizar').click(function(event){
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-update')
            var url = form.attr('action').replace(':DATO_ID', id);
            form.get(0).setAttribute('action', url);
            link  = '{{ asset("/index.php/Correo/")}}/'+id;

            $.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    $.each(data, function(index, el) {

                      $('#correo').val(el.correo);
                      $('#clave').val(el.clave);
                      $('#nombre').val(el.nombre);
                      $('#cargo').val(el.cargo);
                      $('#unidad').val(el.unidad);
                      $('#entrega').val(el.entrega);
                      $('#fecha_activacion').val(el.fecha_activacion);
                      $('#fecha_desactivacion').val(el.fecha_desactivacion);
                      $('#activo').val(el.activo);
                      $('#observacion').val(el.observacion);

                    });
                }
            });
        });

        $('.eliminar').click(function(event) {
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':DATO_ID',id);
            var data = form.serialize();

            if(confirm('Esta seguro de eliminar al Bien'))
            {
                $.post(url, data, function(result, textStatus, xhr) {
                    alert(result);
                    fila.fadeOut();
                }).fail(function(esp){
                    fila.show();
                });
            }
        });
    </script>
@endsection

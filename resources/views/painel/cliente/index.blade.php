@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Cadastro de Clientes</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCadCliente"><i class="fa fa-user-plus"></i>
            NOVO CLIENTE
        </button>
        <!-- Inicio Modal Cadastrar Cliente -->
        <div class="modal fade" id="modalCadCliente" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="ModalLabel" > Cadastar Novo Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('cadastrar.cliente') }}">
                                    <!-- gera token de proteção para o formulário -->
                                    {!! csrf_field() !!}
                                    
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Nome:</label>
                                        <input name="nome" type=text class="form-control" id="nome">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">CPF:</label>
                                        <input name="cpf" type=text class="form-control" id="cpf">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Rua:</label>
                                        <input name="rua" type=text class="form-control" id="rua">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Numero:</label>
                                        <input name="numero" type=text class="form-control" id="numero">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Referencia:</label>
                                        <input name="referencia" type=text class="form-control" id="referencia">
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>	
		<!-- Fim  modal cadastrar-->
    </div>




    <div class="box-body">
                <div class="col-md-12">
                    <table class="table table-hover" id="tabelaCliente">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Rua</th>                                
                                <th>Número</th>
                                <th>Referencia</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cli)
                            <tr>
                                <td>{{$cli->id}}</td>
                                <td>{{$cli->nome}}</td>
                                <td>{{$cli->cpf}}</td>
                                <td>{{$cli->rua}}</td>
                                <td>{{$cli->numero}}</td>
                                <td>{{$cli->referencia}}</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-primary" 
                                    data-toggle="modal" data-target="#myModal">Visualizar</button>
                                    <button type="button" class="btn btn-xs btn-warning" 
                                    data-toggle="modal" data-target="#exampleModal">Editar</button>
                                    <a href=""><button type="button" class="btn btn-xs btn-danger">Excluir</button></a>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>    
                    </table>        
                </div>
    </div>                    


</div>


    
    

    <!-- plugin jquery busca e filtro https://datatables.net/ -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js">
	<script>
		$(document).ready( function () {
			$('#tabelaCliente').DataTable({
				"language": {
					sEmptyTable: "Nenhum registro encontrado",
					sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
					sInfoFiltered: "(Filtrados de _MAX_ registros)",
					sInfoPostFix: "",
					sInfoThousands: ".",
					sLengthMenu: "_MENU_ resultados por página",
					sLoadingRecords: "Carregando...",
					sProcessing: "Processando...",
					sZeroRecords: "Nenhum registro encontrado",
					sSearch: "Pesquisar",
					oPaginate: {
					sNext: "Próximo",
					sPrevious: "Anterior",
					sFirst: "Primeiro",
					sLast: "Último",
					},
					oAria: {
					sSortAscending: ": Ordenar colunas de forma ascendente",
					sSortDescending: ": Ordenar colunas de forma descendente",
					},
					}
			});
		} );
	</script>
@stop
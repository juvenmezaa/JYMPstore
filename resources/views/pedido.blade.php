@extends("principal")
@section("navbar")
<script src="{{asset('js/pedidosCascada.js')}}"></script>

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="{{url('/')}}">JYMPstore</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown" >
                    <a class="page-scroll" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button">Hombres<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('productos/hombres')}}">Ver todo</a></li>
                        @foreach($categoriasH as $c)
                            <li><a href= "{{url('productosCategoria')}}/hombres/{{$c->nombre}}">{{$c->nombre}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown" >
                    <a class="page-scroll" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button">Mujeres<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('productos/mujeres')}}">Ver todo</a></li>
                        @foreach($categoriasM as $c)
                            <li><a href= "{{url('productosCategoria')}}/mujeres/{{$c->nombre}}">{{$c->nombre}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::User()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::User()->type==1)
                        <li><a href="{{ url('/panel') }}">Administrador</a></li>
                        @else
                        <li><a href="{{ url('/pedidosUser') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> Pedidos</span></a></li>
                        <li><a href="{{ url('/comprasUser') }}"><span class="glyphicon glyphicon-saved" aria-hidden="true"> Compras</a></a></li>
                        @endif
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!-- <li class="divider"></li> -->
                    </ul>
                </li>
                @else
                <li>
                    <a class="page-scroll" href="{{url('/login')}}">Iniciar Sesión</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
@stop
@section("1")
<br><br><br>
<form action="{{url('/pedidoEnviado')}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div style="margin-left: 5%;">
	<div class="panel panel-warning" style="width: 95%;">
		<div class="panel-heading"> <h1>Agregar al carrito</h1></div>
		<div class="panel-body">
			<h4>Datos del Pedido</h4><br>
			<table class="table table-hover">
				<tr>
					<th>Id. del producto</th>
					<th>Imagen</th>
					<th>Descripcion</th>
					<th>Talla</th>
					<th>Cantidad</th>
					<th>Precio Unitario</th>
				</tr>
				<tr>
				<input type="hidden" value="{{$producto[0]->id}}" name="id_producto">
					<td>{{$producto[0]->id}}</td>
					<td style="width: 15%;">
						<img id= "imagenP" src="{{ asset('img/productos')}}/{{$producto[0]->imagen}}" style="width: 30%;" onerror="this.src='{{ asset('img/categorias')}}/{{$producto[0]->generica}}'"/></td>
					<td>{{$producto[0]->descripcion}}</td>
					<td>
						<select name="tallas" id="tallas" onchange="cascadaCantidad()" class="form-control">
							@foreach($tallas as $t)
								<option value="{{$t->id}}" value2="{{$t->cantidad}}">{{$t->talla}}</option>
							@endforeach
						</select></td>
					<td>
						<select name="cantidad" id="cantidad" class="form-control">
							@for($i=1; $i<=$tallas[0]->cantidad; $i++)
								<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
					</td>
					<input type="hidden" value="{{$producto[0]->precio}}" id="precio" name="precio">
					<th>
						{{$producto[0]->precio}}
					</th>

				</tr>
			</table>
			<hr>
			<!--div class="col-sm-12">
				<div class="pull-right col-sm-4">
					<h4>CUPON</h4>
					<input type="text" name="cupon" class="form-control">
				</div>
			</div-->
			
                <input type="submit" class="btn btn-primary" style="margin-left: 80%;" value="Agregar">
		</div>
    </div>
</div>
</form>
@stop
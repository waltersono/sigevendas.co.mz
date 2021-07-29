<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    @if(Auth::user()->role == 'Manager' || Auth::user()->role == 'Administrator')

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard') }}">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    @endif
    @if(Auth::user()->role == 'Manager')

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><a class="text-dark" href="#collapseAdmin" data-toggle="collapse">Administra&ccedil;&atilde;o</a></span>
    </h6>
    <ul class="nav flex-column mb-2" id="collapseAdmin">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('stores.index') }}">
          <span data-feather="home"></span>
          Estabelecimentos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
          <span data-feather="layers"></span>
          Categorias
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('suppliers.index') }}">
          <span data-feather="truck"></span>
          Fornecedores
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
          <span data-feather="gift"></span>
          Produtos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('entrances.index') }}">
          <span data-feather="arrow-right"></span>
          Entradas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('receipts.index') }}">
          <span data-feather="file-text"></span>
          Recibos
        </a>
      </li>
    </ul>

    @endif

    @if(Auth::user()->role == 'Operator')

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><a class="text-dark" href="#collapseSells" data-toggle="collapse">Vendas</a></span>
    </h6>
    <ul class="nav flex-column mb-2" id="collapseSells">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sells.index') }}">
          <span data-feather="refresh-cw"></span>
          Vendas
        </a>
      </li>
    </ul>

    @endif

    @if(Auth::user()->role == 'Manager')

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><a class="text-dark" href="#collapseReports" data-toggle="collapse">Monitoria</a></span>
    </h6>
    <ul class="nav flex-column mb-2" id="collapseReports">
      <!-- <li class="nav-item">
        <a class="nav-link" href="">
          <span data-feather="file-text"></span>
          Relat&oacute;rios
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('stats.index') }}">
          <span data-feather="file-text"></span>
          Estatisticas
        </a>
      </li>
    </ul>

    @endif

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><a class="text-dark" href="#collapseSettings" data-toggle="collapse">Defini&ccedil;&otilde;es</a></span>
    </h6>
    <ul class="nav flex-column mb-2" id="collapseSettings">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index') }}">
          <span data-feather="info"></span>
          Perfil
        </a>
      </li>
      @if(Auth::user()->role !== 'Operator')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
          <span data-feather="user"></span>
          Usu&aacute;rios
        </a>
      </li>
      @endif

    </ul>
  </div>
</nav>
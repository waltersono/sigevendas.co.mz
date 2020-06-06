<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><a class="text-dark" href="#collapseAdmin" data-toggle="collapse">Administra&ccedil;&atilde;o</a></span>
        </h6>
        <ul class="nav flex-column mb-2 collapse" id="collapseAdmin">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Unidades Organicas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Departamentos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reparticoes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Funcionarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="briefcase"></span>
              Instituicoes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="book"></span>
              Cursos
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><a class="text-dark" href="#collapseReports" data-toggle="collapse">Relatorios</a></span>
        </h6>
        <ul class="nav flex-column mb-2 collapse" id="collapseReports">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Nivel Academico
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Estudantes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Graduados
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Estatisticas
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><a class="text-dark" href="#collapseSettings" data-toggle="collapse">Defini&ccedil;&otilde;es</a></span>
        </h6>
        <ul class="nav flex-column mb-2 collapse" id="collapseSettings">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
              <span data-feather="user"></span>
              Perfil
            </a>
          </li>
        </ul>
      </div>
    </nav>
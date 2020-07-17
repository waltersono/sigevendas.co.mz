<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}" >
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><a class="text-dark" href="#collapseAdmin" data-toggle="collapse">Administra&ccedil;&atilde;o</a></span>
        </h6>
        <ul class="nav flex-column mb-2" id="collapseAdmin">
          <li class="nav-item">
            <a class="nav-link " href="{{ route('organicUnities.index') }}">
              <span data-feather="codepen"></span>
              Unidades Org&acirc;nicas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('departments.index') }}">
              <span data-feather="codepen"></span>
              Departamentos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('delegations.index') }}">
              <span data-feather="codepen"></span>
              Delega&ccedil;&otilde;es
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('repartitions.index') }}">
              <span data-feather="codepen"></span>
              Reparti&ccedil;&otilde;es
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('employees.index') }}">
              <span data-feather="users"></span>
              Funcion&aacute;rios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('academicLevels.index') }}">
              <span data-feather="book"></span>
              N&iacute;vel Acad&eacute;mico
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('careers.index') }}">
              <span data-feather="star"></span>
              Carreira
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('institutions.index') }}">
              <span data-feather="briefcase"></span>
              Institui&ccedil;&otilde;es
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('courses.index') }}">
              <span data-feather="book-open"></span>
              Cursos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('trainings.index') }}">
              <span data-feather="bookmark"></span>
              Forma&ccedil;&otilde;es
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><a class="text-dark" href="#collapseReports" data-toggle="collapse">Monitoria</a></span>
        </h6>
        <ul class="nav flex-column mb-2" id="collapseReports">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.index') }}">
              <span data-feather="file-text"></span>
              Relat&oacute;rios
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
        <ul class="nav flex-column mb-2" id="collapseSettings">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
              <span data-feather="user"></span>
              Perfil
            </a>
          </li>
        </ul>
      </div>
    </nav>

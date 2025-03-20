<!-- header.php -->
<style>
  /* Estilos customizados para o header */
  header {
    background-color: var(--color-neutral-0); /* #0E3659 */
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    position: fixed;
    padding: 12px 80px;
    width: 100%;
    z-index: 10;
    overflow: visible;
  }
  /* Você pode manter outros estilos customizados, se necessário */
  .nav-list li a {
    color: var(--color-neutral-40); /* #D99923 */
    font-size: 18px;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    transition: 0.4s ease;
  }
  .nav-list li a:hover {
    background-color: #041f5a;
  }
</style>
<header>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="../../../Site mercury home e about/htmls/home adm.html">
          <img src="../../../Site mercury home e about/img/miesc.png" alt="Logo" width="30" height="60">
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarAdm">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarAdm">
        <ul class="nav navbar-nav navbar-right nav-list">
          <li><a href="../../../Site mercury home e about/htmls/home adm.html">Home</a></li>
          <li><a href="../../../Site mercury home e about/htmls/index adm.html">About</a></li>
          <li><a href="../../../feed/feed.php">Feed</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Resources <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="../camisas/camisas.php">Camisas</a></li>
              <li><a href="../campeoes/campeoes.php">Campeões</a></li>
              <li><a href="../resultados futsal/resultado.php">Resultados</a></li>
              <li><a href="../classificacao/classificacao.php">Classificação</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

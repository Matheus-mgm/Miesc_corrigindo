<!-- footer.php -->
<style>
  /* Estilos customizados para o footer */
  footer {
    width: 100%;
    color: var(--color-neutral-40); /* #D99923 */
    height: auto;
    left: 0;
    bottom: 0;
  }
  #footer_content {
    background-color: var(--color-neutral-10); /* #018DB5 */
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    padding: 3rem 3.5rem;
  }
  #footer_social_media {
    display: flex;
    gap: 2rem;
    margin-top: 1.5rem;
  }
  #footer_social_media .footer-link {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.5rem;
    width: 2.5rem;
    color: var(--color-neutral-0); /* #0E3659 */
    border-radius: 50%;
    transition: all 0.4s;
  }
  #footer_social_media .footer-link:hover {
    opacity: 0.8;
  }
  #instagram {
    background: linear-gradient(#7f37c9, #ff2992, #ff9807);
  }
  #whatsapp {
    background-color: #25d366;
  }
  .footer-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    list-style: none;
  }
  .footer-list .footer-link {
    color: var(--color-neutral-30); /* #0E3659 */
    transition: all 0.4s;
  }
  .footer-list .footer-link:hover {
    color: #7f37c9;
  }
  #footer_subscribe {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }
  .botao2 button {
    background-color: var(--color-neutral-0);
    color: var(--color-neutral-40);
    border: none;
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 5px;
  }
  #footer_copyright {
    display: flex;
    justify-content: center;
    background-color: var(--color-neutral-0);
    font-size: 0.9rem;
    padding: 1.5rem;
    font-weight: 100;
  }
  /* Media queries para responsividade do footer */
  @media screen and (max-width: 768px) {
    #footer_content {
      grid-template-columns: repeat(2, 1fr);
      gap: 2rem;
    }
  }
  @media screen and (max-width: 426px) {
    #footer_content {
      grid-template-columns: repeat(1, 1fr);
      padding: 3rem 2rem;
    }
  }
</style>
<footer>
  <div id="footer_content">
    <div id="footer_contacts">
      <img src="../../../Site mercury home e about/img/mercury.png" alt="Mercury" width="20" height="60">
      <br>
      <p>Organização, comunicação e <br> união, na palma da sua mão.</p>
      <div id="footer_social_media">
        <a href="https://www.instagram.com/mercury_techwave?igsh=MXBjMm9henVsZXlwdA==" class="footer-link" id="instagram">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="footer-link" id="whatsapp">
          <i class="fa-brands fa-whatsapp"></i>
        </a>
      </div>
    </div>
    <ul class="footer-list">
      <li><h3>Home</h3></li>
      <li><a href="../../../feed/feed.php" class="footer-link">Feed</a></li>
      <li><a href="#" class="footer-link">Events</a></li>
      <li><a href="../../../Site mercury home e about/htmls/index adm.html" class="footer-link">About</a></li>
    </ul>
    <ul class="footer-list">
      <li><h3>Events</h3></li>
      <li><a href="../screens/events/html/interclasse%20adm.html" class="footer-link">Interclasse</a></li>
      <li><a href="../sarau/homeadm.html" class="footer-link">Sarau</a></li>
      <li><a href="../sarau e paulo freire/Paulo Freire/pauloFreire adm.html" class="footer-link">Paulo Freire</a></li>
    </ul>
    <div id="footer_subscribe">
      <h3>Utilize o MIESC</h3>
      <div class="botao2">
        <a href="../../../screens/Cadastro/screens%20php/cadastro.php">
          <button>Se cadastre</button>
        </a>
      </div>
    </div>
  </div>
  <div id="footer_copyright">
    &#169; 2023 Mercury
  </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
          integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfW9Ux3QkF0P5mwz6wS/m3B9DJFap+7wqK9C5a3V9" 
          crossorigin="anonymous"></script>

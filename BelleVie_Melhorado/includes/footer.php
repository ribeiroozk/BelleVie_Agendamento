</main>
<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <a class="brand brand-footer" href="index.php">
                <span class="brand-mark">BV</span>
                <span>
                    <strong>BelleVie</strong>
                    <small>Ginecologia e obstetrícia</small>
                </span>
            </a>
            <p>Protótipo acadêmico desenvolvido em PHP, CSS e JavaScript puro.</p>
        </div>
        <div>
            <h3>Atendimento</h3>
            <p><?= e($clinic['hours']) ?></p>
            <p><?= e($clinic['phone']) ?></p>
        </div>
        <div>
            <h3>Links úteis</h3>
            <a href="agendamento.php">Agendar consulta</a>
            <a href="dashboard.php">Ver meus agendamentos</a>
            <a href="politica-privacidade.php">Política de privacidade</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; <?= date('Y') ?> BelleVie. Todos os direitos reservados.</span>
        <a href="#topo">Voltar ao topo ↑</a>
    </div>
</footer>
<script src="assets/js/app.js"></script>
</body>
</html>

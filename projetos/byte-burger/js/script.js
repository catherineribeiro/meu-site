// ============================================
//   BYTE BURGER — script.js
//   Web Design | Instituto Federal Brasília
// ============================================


// ── DARK / LIGHT MODE ──

/**
 * Alterna entre o tema escuro e o tema claro.
 * Lê o atributo data-theme do <html> e troca para o oposto.
 */
function toggleTheme() {
  const html = document.documentElement;
  const isLight = html.getAttribute('data-theme') === 'light';

  // Troca o tema
  html.setAttribute('data-theme', isLight ? 'dark' : 'light');

  // Atualiza o ícone e o texto do botão
  const btn = document.getElementById('themeBtn');
  btn.querySelector('.theme-icon').textContent = isLight ? '🌙' : '☀️';
  document.getElementById('themeLabel').textContent = isLight ? 'Modo Claro' : 'Modo Escuro';
}


// ── FILTRO DINÂMICO DE CATEGORIAS ──

/**
 * Filtra as seções do cardápio de acordo com a categoria clicada.
 *
 * @param {string} cat   - Categoria selecionada: 'all', 'lanches', 'bebidas' ou 'sobremesas'
 * @param {HTMLElement} btn - Botão que foi clicado (para marcar como ativo)
 */
function filter(cat, btn) {
  // Remove a classe 'active' de todos os botões de filtro
  document.querySelectorAll('.filter-btn').forEach(function(b) {
    b.classList.remove('active');
  });

  // Adiciona 'active' apenas no botão clicado
  btn.classList.add('active');

  // Mostra ou oculta as seções conforme a categoria
  document.querySelectorAll('.menu-section').forEach(function(section) {
    if (cat === 'all' || section.dataset.cat === cat) {
      section.classList.remove('hidden');
    } else {
      section.classList.add('hidden');
    }
  });
}

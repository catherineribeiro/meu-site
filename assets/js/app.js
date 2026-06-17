// =============================================
// app.js — Lógica de Programação I
// Projeto Integrador — TDSV1
// =============================================

function obterPaginaAtual() {
  const pagina = window.location.pathname.split('/').pop() || 'index.html';
  return pagina.includes('.') ? pagina : 'index.html';
}

function fecharMenuMobile() {
  const toggle = document.getElementById('menu-toggle');
  const navMenu = document.getElementById('nav-menu');

  if (!toggle || !navMenu) return;

  navMenu.classList.remove('aberto');
  toggle.classList.remove('aberto');
  toggle.setAttribute('aria-expanded', 'false');
  toggle.setAttribute('aria-label', 'Abrir menu');
}

function iniciarMenuMobile() {
  const toggle = document.getElementById('menu-toggle');
  const navMenu = document.getElementById('nav-menu');

  if (!toggle || !navMenu) return;

  toggle.addEventListener('click', function () {
    const aberto = navMenu.classList.toggle('aberto');
    toggle.classList.toggle('aberto', aberto);
    toggle.setAttribute('aria-expanded', aberto ? 'true' : 'false');
    toggle.setAttribute('aria-label', aberto ? 'Fechar menu' : 'Abrir menu');
  });

  navMenu.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', fecharMenuMobile);
  });

  document.addEventListener('keydown', function (evento) {
    if (evento.key === 'Escape') {
      fecharMenuMobile();
    }
  });
}

function marcarNavAtivo() {
  const paginaAtual = obterPaginaAtual();
  const links = document.querySelectorAll('nav a');

  links.forEach(function (link) {
    const href = link.getAttribute('href');
    if (href === paginaAtual || (paginaAtual === 'index.html' && href === './')) {
      link.classList.add('ativo');
    }
  });
}

function validarCampo(campo, msgErro, condicao) {
  const elementoErro = document.getElementById('erro-' + campo.id);

  if (!condicao) {
    campo.classList.add('erro');
    if (elementoErro) {
      elementoErro.textContent = msgErro;
      elementoErro.classList.add('visivel');
    }
    return false;
  }

  campo.classList.remove('erro');
  if (elementoErro) {
    elementoErro.classList.remove('visivel');
  }
  return true;
}

function validarEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function iniciarFormulario() {
  const form = document.getElementById('form-contato');
  if (!form) return;

  const campoNome = document.getElementById('nome');
  const campoEmail = document.getElementById('email');
  const campoMensagem = document.getElementById('mensagem');
  const feedback = document.getElementById('form-feedback');

  if (campoNome) {
    campoNome.addEventListener('blur', function () {
      validarCampo(campoNome, 'Por favor, informe seu nome.', campoNome.value.trim().length >= 2);
    });
  }

  if (campoEmail) {
    campoEmail.addEventListener('blur', function () {
      validarCampo(campoEmail, 'Informe um e-mail válido.', validarEmail(campoEmail.value.trim()));
    });
  }

  if (campoMensagem) {
    campoMensagem.addEventListener('blur', function () {
      validarCampo(campoMensagem, 'A mensagem deve ter pelo menos 10 caracteres.', campoMensagem.value.trim().length >= 10);
    });
  }

  form.addEventListener('submit', function (evento) {
    evento.preventDefault();

    const nomeValido = validarCampo(campoNome, 'Por favor, informe seu nome.', campoNome.value.trim().length >= 2);
    const emailValido = validarCampo(campoEmail, 'Informe um e-mail válido.', validarEmail(campoEmail.value.trim()));
    const mensagemValida = validarCampo(campoMensagem, 'A mensagem deve ter pelo menos 10 caracteres.', campoMensagem.value.trim().length >= 10);

    if (nomeValido && emailValido && mensagemValida) {
      feedback.textContent = '✓ Mensagem enviada com sucesso! Entrarei em contato em breve.';
      feedback.className = 'form-feedback sucesso';
      form.reset();
    } else {
      feedback.textContent = '✗ Preencha todos os campos corretamente antes de enviar.';
      feedback.className = 'form-feedback falha';
    }
  });
}

function aplicarFiltroProjetos(filtro, botoes, cards, mensagemVazia) {
  let visiveis = 0;

  botoes.forEach(function (botao) {
    botao.classList.toggle('ativo', botao.getAttribute('data-filtro') === filtro);
  });

  cards.forEach(function (card) {
    const tecnologias = card.getAttribute('data-tecnologias');
    const mostrar = filtro === 'todos' || tecnologias.includes(filtro);
    card.classList.toggle('oculto', !mostrar);
    if (mostrar) visiveis += 1;
  });

  if (mensagemVazia) {
    mensagemVazia.classList.toggle('visivel', visiveis === 0);
  }
}

function iniciarFiltroProjetos() {
  const botoesFiltro = document.querySelectorAll('[data-filtro]');
  const cards = document.querySelectorAll('[data-tecnologias]');
  const mensagemVazia = document.getElementById('filtro-vazio');

  if (botoesFiltro.length === 0) return;

  botoesFiltro.forEach(function (botao) {
    botao.addEventListener('click', function () {
      const filtro = botao.getAttribute('data-filtro');
      aplicarFiltroProjetos(filtro, botoesFiltro, cards, mensagemVazia);
    });
  });
}

function atualizarAnoFooter() {
  const elementos = document.querySelectorAll('.ano-atual');
  const anoAtual = new Date().getFullYear();
  elementos.forEach(function (el) {
    el.textContent = anoAtual;
  });
}

async function carregarPartial(elemento) {
  const nome = elemento.getAttribute('data-partial');
  if (!nome) return;

  try {
    const resposta = await fetch('assets/partials/' + nome + '.html');
    if (!resposta.ok) return;
    elemento.outerHTML = await resposta.text();
  } catch (erro) {
    console.warn('Partial não carregado:', nome, erro);
  }
}

async function carregarPartials() {
  const elementos = document.querySelectorAll('[data-partial]');
  await Promise.all(Array.from(elementos).map(carregarPartial));
}

function iniciarAplicacao() {
  iniciarMenuMobile();
  marcarNavAtivo();
  iniciarFormulario();
  iniciarFiltroProjetos();
  atualizarAnoFooter();
}

document.addEventListener('DOMContentLoaded', async function () {
  await carregarPartials();
  iniciarAplicacao();
});

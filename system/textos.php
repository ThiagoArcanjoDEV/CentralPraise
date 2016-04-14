<?php
/** Configurações de Textos**/
global $FileText;

// HOME
$FileText->set('home','title','In&iacute;cio');
$FileText->set('home','subtitle','Veja o que est&aacute; acontecendo no louvor da IJV');

// LOGIN
$FileText->set('login','title','Entrar');
$FileText->set('login','subtitle','Acessar o Sistema');
$FileText->set('login','without_account','N&atilde;o possui acesso?');
$FileText->set('login','input_text','Digite o login cadastrado');
$FileText->set('login','input_senha','Digite sua senha');
$FileText->set('login','forgot_password','Esqueceu sua senha?');
$FileText->set('login','form_info','Digite seu email e senha de acesso ...');
$FileText->set('login','ok','Acessando o sistema ...');
$FileText->set('login','error','Login/Senha n&atilde;o encontrados');

// MUSICAS
$FileText->set('musicas','title','M&uacute;sicas');
$FileText->set('musicas','subtitle','Letras e cifras das m&uacute;sicas cadastradas. Clique na aba desejada para visualiz&aacute;-la.');
defined('musicas_no_rows') || define('musicas_no_rows','Nenhuma m&uacute;sica encontrada');
$FileText->set('musicas','no_rows',musicas_no_rows);

// ESCALAS
$FileText->set('escalas','title','Escalas');
$FileText->set('escalas','subtitle','Lista dos pr&oacute;ximos eventos cadastrados e suas respectivas escalas.');
$FileText->set('escalas','next_events','Pr&oacute;ximos Eventos');
defined('escalas_no_rows') || define('escalas_no_rows','Nenhuma escala encontrada');
$FileText->set('escalas','no_rows',escalas_no_rows);

$FileText->set('escalas','nome','Nome do Evento');
$FileText->set('escalas','nome_text','Digite o nome deste evento (culto,confer&ecirc;ncia,...)');
$FileText->set('escalas','data','Dia e Hora');
$FileText->set('escalas','data_today',date("d/m/Y H:i"));
$FileText->set('escalas','agenda_obs','Observa&ccedil;&otilde;es sobre o evento');
$FileText->set('escalas','obs','Observa&ccedil;&otilde;es sobre para os escalados');
$FileText->set('escalas','equipes','Equipe escalada');
$FileText->set('escalas','membros','Membros escalados');
$FileText->set('escalas','select_membros','Selecionar Membros');
$FileText->set('escalas','musicas','Selecione as m&uacute;sicas previstas');

// EQUIPES
$FileText->set('equipes','title','Equipes');
$FileText->set('equipes','subtitle','Equipes de Louvor dispon&iacute;veis.');
$FileText->set('equipes','no_rows','Nenhuma equipe encontrada');

// MEMBROATUACAO
$FileText->set('membro_atuacao','atuacao_nao','Membro n&atilde;o pode ser escalado no momento');
$FileText->set('membro_atuacao','no_rows','Equipe sem membros ainda');

// MEMBRO

// NOTICIAS
defined('noticias_no_rows') || define('noticias_no_rows','Nenhuma not&iacute;cia nova');
$FileText->set('noticias','no_rows',noticias_no_rows);

// LOUVOR OPEN
$FileText->set('louvoropen','title','M&uacute;sicas de Hoje');
$FileText->set('louvoropen','no_rows',musicas_no_rows);

// LOGIN
$FileText->set('login','title','Acesso ao Sistema');

// LOGOUT
$FileText->set('logout','title','Sair do Sistema');

// ADMIN
$FileText->set('admin','title','Administra&ccedil;&atilde;o');

// PAINELUSER
$FileText->set('paineluser','title','Painel do Usu&aacute;rio');
$FileText->set('paineluser','subtitle','Favoritos, alterar dados, ver sua agenda...');
$FileText->set('paineluser','change','Alterar dados');
$FileText->set('paineluser','change_subtitle','Altere os seus dados no sistema');

$FileText->set('paineluser','name_input','Nome e Sobrenome');
$FileText->set('paineluser','tag_input','Digite uma TAG com 3 d&iacute;gitos');
$FileText->set('paineluser','tel_input','Telefone fixo');
$FileText->set('paineluser','cel_input','Celular (Whatszap,SMS...)');
$FileText->set('paineluser','email_input','E-mail para contato');
$FileText->set('paineluser','login_input','Login desejado');
$FileText->set('paineluser','senha_input','Digite uma senha de acesso');
$FileText->set('paineluser','senha_conf','Digite novamente sua senha para confirma&ccedil;&atilde;o');

// GERAL
$FileText->set('geral','member','Membro');
$FileText->set('geral','enter','Entrar');
$FileText->set('geral','exit','Sair');
$FileText->set('geral','exit_msg','Sair do sistema?');
$FileText->set('geral','filter','Filtrar');
$FileText->set('geral','filter_by','Filtrar Por');
$FileText->set('geral','add','Adicionar');
$FileText->set('geral','change','Alterar');
$FileText->set('geral','select_one','- Selecione abaixo -');

// ALERT
$FileText->set('alert','member_name','Digite o seu Nome e Sobrenome');
$FileText->set('alert','member_tag','Digite uma TAG para identificar voc&ecirc; nas escalas');
$FileText->set('alert','member_email','Digite um email v&aacute;lido');
$FileText->set('alert','login_text_empty','Escolha um login para acessar o sistema');
$FileText->set('alert','login_text_already','Login existente. Escolha outro');
$FileText->set('alert','login_senha_empty','Digite sua senha.');
$FileText->set('alert','login_senha_wrong','Senha digitada n&atilde;o est&aacute; correta. Tente novamente');
$FileText->set('alert','login_senha_conf','Senhas digitas s&atilde;o diferentes');
$FileText->set('alert','data_changed_ok','Dados alterados com SUCESSO!');
$FileText->set('alert','data_changed_error','N&atilde;o foi poss&iacute;vel alterar os dados. Tente Novamente');
$FileText->set('alert','escalas_nome_empty','O <b>Nome do evento</b> n&atilde;o pode estar em branco');
$FileText->set('alert','escalas_data_empty','Escoalha o <b>Dia e Hora</b> do Evento');
$FileText->set('alert','escalas_equipes_empty','Selecione a <b>Equipe</b> escalada');
$FileText->set('alert','escalas_musicas_empty','Voc&ecirc; n&atilde;o selecionou nenhuma <b>M&uacute;sica</b>. Lembre-se de selecionar posteriormente');
$FileText->set('alert','escalas_membros_empty','Voc&ecirc; n&atilde;o escalou nenhum <b>Membro</b>. Lembre-se de escalar posteriormente');
$FileText->set('alert','escala_add_ok','<b>Escala</b> adicionada com sucesso');
$FileText->set('alert','escala_add_error','Erro ao adicionar esta <b>Escala</b>. Tente Novamente');
$FileText->set('alert','escala_cifra_add_ok','<b>M&uacute;sicas</b> selecionadas.');
$FileText->set('alert','escala_cifra_add_error','Falha ao selecionar as <b>M&uacute;sicas</b>. Altere a escala e tente novamente');
$FileText->set('alert','escala_membro_add_ok','<b>Membros</b> escalados.');
$FileText->set('alert','escala_membro_add_error','Falha ao selecionar os <b>Membros</b> escalados. Altere a escala e tente novamente');
$FileText->set('alert','form_already_sended','Formul&aacute;rio j&aacute; enviado com sucesso');
?>

=== Plugin Name ===
Contributors: bernabauer
Donate link: http://www.bernabauer.com/
Tags: integration, hotwords, monetização, Brasil
Requires at least: 3.0
Tested up to: 3.0.1
Stable tag: 4.6.2

WP-HOTWords é o primeiro em português no repositório oficial de plugins para WordPress e ele inclui automaticamente os códigos necessários para o programa de monetização HOTWords. Além de facilitar o trabalho de incluir os códigos o plugin também permite personalizar as cores dos links de publicidade e ainda escolher se os links serão mostrados em textos de páginas estáticas, páginas com mais de um artigo e nos comentários. Você pode ainda determinar que os códigos não serão apresentados em determinados artigos.


== Description ==

Este plugin também está disponível em ingles e espanhol. Funciona com o [HOTWords México](http://www.hotwords.com.mx/) e [HOTWords Argentina](http://www.hotwords.com.ar/).

O funcionamento do plugin é bastante simples. Ele inclui os "divs" antes e depois do texto dos artigos e/ou dos comentários. A inclusão do código no rodapé do blog também é feita pelo plugin. A única configuração necessária a ser feita é informar o número de afiliado do programa na página de administração que é disponibilizada ao se habilitar o plugin. 

Uma funcionlidade que foi incluída por sugestão do [Alexandre Rauta](http://www.blogadao.com/) que usa o plugin foi a de escolher determinados artigos para que não sejam mostrados anúncios do HOTWords.

O plugin inclui ainda créditos para o HOTWords e para mim, o autor do plugin. Acabei incluindo a nota de rodapé após ler o artigo onde fica claro que ninguém prestigia o autor de plugins. A inspiração foi o [artigo do Matt](http://photomatt.net/2007/04/12/plugin-authors-get-no-love/ "Authors Get No Love"). Junto com a publicação desta nota de rodapé é publicado também a parte mais importante do código do hotwords. é o código onde está o código de afiliado.

Se você; tiver problemas com o plugin ou quer sugerir alguma modificação, por favor acesse a página de [contato](http://www.bernabauer.com/contato/) .

== Installation ==

A instalação do plugin é bastante simples.

1. Faça upload da pasta **wp-hotwords** para a pasta **/wp-content/plugins/**
2. **Ative** o WP-HOTWords no menu **Plugins** do Wordpress
3. **Informe o seu código de afiliado** e personalize a exibição dos anúncios

**Importante!**

Para que o plugin funcione corretamente, é **necessário** que o seu tema tenha uma chamada para função **wp_footer()**. Se você; não sabe como incluir a chamada, veja [aqui](http://www.wpdesigner.com/2007/05/30/where-exactly-should-you-place-wp_footer/ aqui). é necessário também que você; tenha uma conta ativa no [HOTWords](http://www.HOTWords.com.br/ "HOTWords").

== Frequently Asked Questions ==
   FAQ - Perguntas Frequentes 

 = Não aparecem anúncios nos meus artigos. Verifiquei o código da página do artigo e os códigos do HOTwords não estão sendo incluídos. O que eu faço? = 

 O problema pode estar no tema do seu blog, garanta que existe a chamada "wp_footer()" no arquivo de tema "Rodapé" (ou footer, caso seu wordpress esteja em inglês) do seu tema ativo. Veja mais [aqui](http://www.wpdesigner.com/2007/05/30/where-exactly-should-you-place-wp_footer/ aqui)
 
 = Preciso me cadastrar em algum lugar para usar este plugin? = 
 
 Sim! é necessário ter uma conta ativa no sistema [HOTWords](http://www.HOTWords.com.br/ "HOTWords") para que o plugin funcione como esperado.
 
 = Posso determinar que não sejam mostrados anúncios do HOTwords em alguns artigos? = 
 
 Se você; quiser que algum artigo não receba anúncios do HOTwords, basta escolher a opção **Não mostrar anúncios do HOTWords neste artigo** na página de edição de artigos.

== Changelog ==

= 4.6.2 = 
* 2010-10-31
* Correção : Módulo de envio de ganhos atualizado para o novo layout implantado no começo do mes.

= 4.6.1 =
* 2010-10-15
* Correção : Mensagens de erro e alertas de PHP foram consertadas com assertivas e troca de códigos e funções mais atualizadas do WordPress.
* Inclusão : Desinstalação agora é feita com recurso nativo do WordPress.
* Correção : Elevada a prioridade de execução do plugin para minimizar conflitos com outros plugins.

= 4.6 =
* 2010-03-21
* Melhoria : Controle da versão do PHP.
* Melhoria : Atualização dos rendimentos é feito quando as configurações do plugin são atualizadas.
* Inclusão : Suporte para HOTwords em Portugal e Espanha.

= 4.5 =
* 2010-01-24
* Melhoria : Links para os últimos tópicos do fórum de suporte.
* Melhoria : Alterada a nota de créditos do rodapé para ser mais discreto.
* Melhoria : Alterada a função para detectar páginas onde o código do HOTWords não deve ser mostrado.
* Melhoria : Incluída configuração para mostrar ou não publicidade HOTWords em páginas estáticas.

= 4.4.1 =
* 2009-06-21
* Correção : Primeiro parágrafo do artigo estava com aparência modificada com o plugin ativo.

= 4.4 =
* 2009-06-05
* Melhoria: Utilização de variável de ambiente para localização de arquivos fornecida pelo WordPress. Com isto a pasta de plugins pode ser renomeada para qualquer pasta.
* Melhoria: Inclusão do link para configuração do plugin na própria página de administração de plugins do WordPress.

= 4.3.1 =
* 2009-02-07
* Melhoria: Widget para o dashboard agora so aparece para usuarios com permissao para ativar plugins.
* Melhoria: Metabox sofreu acertos em relação aos labels das opções.

= 4.3 =
* 2009-01-29
* Inclusão: Widget para o dashboard.
* Inclusão: Suporte para sites no Mexico, Argentina e Sexywords (sites adultos).

= 4.2 = 
* 2008-11-09
* Melhoria: Acerto visual da página de administração.
* Inclusão: Suporte para a versão 2.7 do Wordpress.

= 4.1.1 = 
* 2008-09-14
* Melhoria: Ativação do plugin agora atualiza apenas o que é necessário na base de dados, preservando todas as configuraç&otilde;es.
* Inclusão: Opção para remover todas as opç&otilde;es do plugin.
* Correção : Removidos comentários que quebravam formatação do primeiro parágrafo do artigo.

= 4.1 = 
* 2008-08-10
* Melhoria: Código otimizado para minizar as chamadas ao banco de dados.
* Inclusão: Suporte a várias línguas.
* Modificação : Trocado o link de script de "www.hotwords.com.br/show.jsp?id=<codigo_do_afiliado>" para "ads<codigo_do_afiliado>.hotwords.com.br/show.jsp?id=codigo_do_afiliado"
* Correção : Atualizado código para envio de relatório de ganhos.

= 4.0 = 
* 2008-03-30
* Melhoria: Código totalmente reformulado.
* Inclusão: Possibilidade de envio por email dos ganhos (experimental)
* Melhoria: Plugin compatível com nova identidade visual da versão 2.5 do Wordpress.

= 3.0 = 
* 2007-11-04
* Melhoria: Opção de exclusão do código HOTWords por anúncio passa a estar na barra lateral da página de edição de artigos.
* Inclusão: Agora é possível escolher a cor para cada artigo.
* Correção: Funcionalidade para escolher cor so funcionava quando o blog estava na raiz do domínio. 
* Inclusão: é possível escolher se anúncios serão mostrados em páginas com mais de um artigo.
* Melhoria: FAQ recebeu novas perguntas e respostas.
* Melhoria: Otimização do plugin para minimizar as chamadas a banco de dados.

= 2.3 = 
* 2007-10-27
* Melhoria: Incluído "No Follow" para os links incluídos no rodapé.
* Melhoria: Incluída a versão do plugin na nota de rodapé.
* Melhoria: Ajustes no código do HOTWords para validação com XHTML.
* Melhoria: Ajustes no código fonte do plugin para acabar com tags HTML fora do padrão XHTML.

= 2.2 =
* 2007-09-29
* Incluído: Lista de exclusão de artigos para que não recebam anúncios do hotwords.
* Correção: O trigger para a ativação do plugin estava apontando para o antigo local do plugin.
* Incluído: Opção de Debug.

= 2.1 = 
* 2007-05-20
* Atualização: O DIV a ser incluído no texto foi alterado. Antes era &lt div id=hotwordstxt name=hotworestxt &gt agora não tem mais a tag “name”.

= 2.0 = 
* 2007-04-29
* Melhoria: Personalizacao do link de anuncio, agora com javascript para selecionar uma quantidade maior de cores ou digitação direta do código.
* Incluido: Escolha do local onde aparecem os códigos do HOTWords: Comentários e Artigos.
***IMPORTANTE****
** Para atualizar para esta versão você; precisa desativar a versão anterior. Este plugin agora é formado por 4 arquivos que devem ficar no diretório /wp-plugins/wp-hotwords. O arquivo ZIP já vem com a estrutura de diretório criada.
** Caso a seleção de cores através da nova ferramenta em javascript não funcione, certifique-se de que os arquivos js_color_picker_v2.js, js_color_picker_v2.css, color_functions.js e wp-hotwords.php estão dentro da pasta /wp-plugins/wp-hotwords. NOTA: a seleção de cores através da opção slider não funciona. Não sei porque.
** Ao ativar a nova versão certifique-se de configurar o plugin corretamente, pois a seleção de cor é armazenada de maneira diferente e existem novas opç&otilde;es que interferem na maneira que os anúncios são inseridos.

= 1.2 = 
* 2007-04-24
* Incluído: Personalização dos links do HOTWords através de cores pré-determinadas.

= 1.1 = 
* 2007-04-23
* Incluído: Personalização da nota de rodapé através de CSS.
* Incluído: Aviso visual de que a configuração não está completa.
* Melhoria: Limpeza do código e inclusão de comentários nas funç&otilde;es.

= 1.0 = 
* 2007-04-22
* Primeira versão com funcionalidades básicas.
# Projeto - My Bookshelf

## 1. Introdução

Implementar um projeto de **cadastro de livros**. O projeto deve ter uma **tela de login** para permitir que apenas usuários cadastrados tenham acesso. O sistema deve contar com a **lista de livros** com opções para *cadastrar um novo livro*, *alterar um livro já existente* e *remover um livro*.

Deve-se utilizar todo o conhecimento obtido no curso *Introdução a Programação Web com PHP*. O projeto deve ser feito utilizando todos os **conceitos aprendidos** até agora.

É importante tomar cuidado com a experiência do usuário, ou seja, utilizar campos com *labels*, *placeholders* e *mensagens de erro* bem definidas. A aplicação será o seu cartão de visitas. Se a sua aplicação **entregar valor** e tiver uma ótima **experiência de utilização**, o cliente voltará. Caso contrário, o cliente **não retornará** à sua aplicação.

Lembre-se que tudo **contará na avaliação**. A consistência nos *nomes dos componentes* da aplicação, a consistência na *escrita do código* (variáveis, funções e objetos), a *consistência na escrita do HTML e CSS*, os *commits e as mensagens utilizadas* entre outras **boas práticas**.

Boa codificação! ;)

## 2. Etapas do Projeto

1. criar o mapa de navegação da aplicação
   * pode-se utilizar alguma ferramenta para a criação do diagrama e detalhar o fluxo de navegação como o Lucid Chart
2. fazer protótipo de baixa fidelidade de cada uma das páginas (mobile e desktop)
    * deve-se criar o protótipo para validar o fluxo de navegação e a experiência do usuário
    * recomenda-se utilizar papel e caneta ou ferramentas como o Balsamiq
    * recomenda-se utilizar o aplicativo Marvel ou Pop para testar a navegação
3. implementação de cada uma das páginas do projeto e a lógica relacionada
   - validações client-side e server-side
   - mensagens de feedback adequadas
   - persistência dos dados

## 3. Detalhes do Projeto

### 3.1 Cadastro do Livro

* Título
* Autor(es)
* Editora
* Capa
* Descrição
* Número de Páginas
* Publicação Nacional
* Gênero
* Data de Cadastro

### 3.2 Cadastro de Usuário

* Nome
* E-mail
* Senha
* CPF
* Sexo
* Data de Nascimento
* CEP
* Endereço
  * Tipo de Logradouro
  * Logradouro
* Número
* Complemento
* Bairro
* Cidade
* Estado
* Interesses
* Aceita Receber Informações
* Ativo

## 4. Implementações Futuras

* não armazenar senhas utilizando texto puro
* implementar mecanismo de 'esqueci a minha senha'
* implementar funcionalidade para 'exclusão em lote'
* opção para gerar a 'lista de livros' no formato CSV
* adicionar um filtro para mostrar livros nacionais

## 5. Sugestões de Leitura

* leitura sobre armazenamento de senha

## A fazeres
* ler sobre a ferramenta emmet(ok)
* ler sobre organização de css e BEM(ok)
* ler sobre organização de arquivos em diretório
* atalhos mais usados vscode
* procurar outrar propriedades para input file
* instalar plugin auto-format
* instalar plugin de tirar espaços vazios(ok)
* Procurar sobre formatos de case(https://wprock.fr/en/blog/conventions-nommage-programmation/)
* https://speakerdeck.com/rafaelrinaldi/arquitetura-css
* Pesquisar BEM(ok)
* Leitura sobre o conceito mobile-first(ok)

* Ajustar tamanhos campos desktop
* estilizar o input file == bootstrap-----------------------------------
* estilizar o tamanho do action no desktop(ok)
* tornar o header fixo no mobile(ok)
* estilizar o resto das páginas

* trocar button para "cadastrar"(ok)
* Tirar borda (deixar zebrada)(ok)
* text-align left(ok)
* Centralizar os campos como column (ex autores)
* cor campo table mais clara #444(ok)
* estilizar os actions(ok)
* transformar content_alert em alert(ok)
* alert__book -> alert__strong(ok)
* modificar modifier -> toolbar(ok)
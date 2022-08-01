# Changelog

Todas mudanças realizadas neste projeto serão documentadas neste arquivo a partir de hoje 2022-07-06.


<!-- ## [0.2.6] - 2022-08-XX XX:XX
 
### Added

### Removed

### Changed -->


## [0.2.6] - 2022-08-01 20:16
 
### Added

- Ao clicar no botão "Ver" no menu "Ver Serviços" do painel de administração, irá levar a uma página de edição do serviço, onde dentro de cada campo, estará os dados do serviço. Ainda não é possivel editar o banco de dados.

### Removed



### Changed

- Algumas funções que inserem/modificam dados, verificam antes se o usuário logado é administrador, caso não seja, aparecerá uma mensagem.


## [0.2.5] - 2022-08-1 10:17
 
### Added

- Na página de admincp.php o menu lateral possui 2 opções:
    "Novo Serviço" possui um formulário nque o usuário preenche com seus dados e envia uma imagem que cadastra um novo serviço no banco de dados,
    "Ver Serviços" O usuário ve a lista de serviços cadastrados no banco de dados, ainda não é possivel pesquisar por serviços especificos.
- Back-End que recebe as imagens enviadas pelo usuário altera o nome do arquivo informando data e hora do envio em seu nome e depois move o arquivo para a pasta "img/service".


### Removed



### Changed


## [0.2.4] - 2022-07-30 20:42
 
### Added

- Nova função insertNewService($serviceObj, $conection) - Usada para tratar e dados e criar novo serviço no banco de dados.
- Agora imagens enviadas no cadastro de um novo serviço são movidas para "img/service".

### Removed



### Changed

- Algumas partes do codigo foram editadas para padronização e melhoria na leitura.





## [0.2.3] - 2022-07-28 15:37
 
### Added

- Criado layout de formulário para criar um novo serviço.

### Removed

- Vários itens do menu esquerdo.
- Todo o conteúdo que estavam na página inicial do painel administrativo.


### Changed

- Menu esquerdo do painel administrativo, reformulado possuindo agora apenas 3 categorias de menus, Serviços (novo serviço e ver serviços), Gallery (Nova Imagem, Ver Imagens), Caixa De Mensagem (Caixa de entrada, Enviar Mensagem).
- Reformulada a classe Service.php para se adequar ao banco de dados, sendo obrigatório inserir o Nome, Preço e Descrição para criar um novo objeto Service.
- codigo php para efetuar o login foi modificado, agora usando o metodo construtor do objeto.
- Nova mensagem ao acessar o painel administrativo.
- Agora ao acessar a pagina de administração, a logo da página aparece no carregamento inicial.




## [0.2.2] - 2022-07-24 21:29
 
### Added

- Novo diretório /admin com conteúdo para o front do painel administrativo.
- Página do Dashboard esta sendo montada.


### Removed

### Changed

- Alterado a classe User e a forma como a $_SESSION["userlogin"] era escrita ao fazer o login.



## [0.2.1] - 2022-07-23 00:49

### Added

- Criado codigo back-end para registro de novo usuário, sem exigencias de caracteres, apenas verifica se a senha esta escrita duas vezes repetidas, futuramente colocar mais exigencias de segurança.
- Criada nova função register($userObj,$conection).
- Uma Mensagem de sucesso é mostrada ao final do registro caso esta não apresente falhas.
- Uma mensagem é mostrada caso o email, celular, documento já estejam no banco de dados(duplicado).
- Novo arquivo "class/classes.php" que irá incluir todas as classes necessárias no projeto na página.
- nova classe "class/CheckMailCellDup.php" usada para a checagem de dados duplicados no cadastro de usuários.



### Removed

- login/menu-top.php

### Changed

- Modificado o changelog adicionando a data do commit da versão [0.2.0].


## [0.2.0] - 2022-07-20

### Added

- Novo layout na página register.php.
- Novo metodo de conexão  PDO ao banco de dados MySQL.
- Back-end php, sistema de login em PDO.
- Agora quando o usuário acessa a página de login.php é verificado se o usuário está logado, caso esteja, o usuário será redirecionado para o index.php.
- Novo, quando o usuário esta logado aparece uma mensagem de boas vindas no topo, utilisando ainda o icone de mapa, deve ser modificado no proximo update.
- Agora o menu para um usuário logado será diferente do menú sem uma sessão iniciada.
- Se o usuário logado for administrador, aparecerá a opção "Administração" no menu do topo(ainda não redireciona para página alguma.).
- Feito botão de logout que fica no topo da pagina ao lado da mensagem de boas vindas.
- Nova Função "logout()", ao ser invocada irá verificar se a sessão de usuário esta setada, caso esteja irá destruir todas as sessões.





### Removed

- Arquivos que eram necessários para o antigo layout dá página register.php, agora o novo layout possui configurações de bootstrap e css dentro do proprio arquivo register.php.


## [0.1.0] - 2022-07-06

### Added

- Esse arquivo changelog e todos os arquivos já criados no projeto até o momento
- Arquivos Gallery.php com a classe Gallery. Futuro Objeto que será usado para a galeria de imagens.
- Arquivos Service.php com a classe Service. Futuro Objeto que será usado para os serviços prestados pelo site.
- Arquivos User.php com a classe User. Futuro objeto que será usado para usuários utilizarem o site, fazendo logins e acesso a conteúdos especificos.

### Changed

- O Projeto teve um template html e CSS encontrado pronto e modificado, separando cada parte do codigo dentro do antigo index.html em arquivos separados dentro da pasta "requires", utilizando PHP para incluir cada parte do projeto no arquivo index.php, o antigo index.html foi renomeado para index-old.html.
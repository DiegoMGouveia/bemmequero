# Changelog

Todas mudanças realizadas neste projeto serão documentadas neste arquivo a partir de hoje 2022-07-06.


<!-- 

## [0.3.2] - 2022-09-XX XX:XX
 
### Added

### Removed

### Changed 

-->

## [0.3.10] - 2022-09-14 00:15
 
### Added

- Agora é possivel alterar o titulo da imagem da galeria de fotos.

### Removed

### Changed 

- Agora ao deletar um serviço, a imagem relacionada a ele também será deletada do servidor.


## [0.3.9] - 2022-09-13 22:58
 
### Added

- Nova classe UploadImagem.php usada para manipular o arquivo de imagem enviado pelo usuário, contem funções para tratar alguns possiveis erros de tipo de arquivo e alterar nome.

- [admincp.php] Nova função  para detectar a página atual para animar o menú conforme a area em que o usuário se encontra.

- [admincp.php] Agora é possivel alterar todos os dados dos serviços armazenados no banco de dados através do menu administrativo.

### Removed

### Changed 

- modificada uma falha na classe Service.php, na qual não estava setando um novo dado ao atributo image.




## [0.3.8] - 2022-09-08 09:36
 
### Added

-Agora vou referenciar a página modificada usando tags [index.php], [admincp.php], [usercp.php] afim de apresentar de qual area é a modificação realizada irá influenciar.

### Removed

### Changed 

- [admincp.php] Modificado o codigo que verifica se o usuário está logado, agora também irá verificar se o usuário logado tem permissão de "user", 
    caso seja "user" ele irá redirecionar para o index.php

-[admincp.php] Agora o submenu configurações permanece aberto ao navegar em "novo profissional".

-[SQL] backup do banco de dados realizado.


## [0.3.7] - 2022-09-08 02:33
 
### Added

- nova classe Team, feita para trabalhar com dados dos profissionais cadastrados no banco de dados e apresenta-los no index.php
- Criado formulario para adicionar novo profissional (team)
- Back para inserção no banco de dados testado.
- Nova função setTeam e uploadImgTeam, usados para manipular dados e inserir um novo profissional ao Team.

### Removed

### Changed 

- consertado bug que se a pessoa ao ser redirecionada para a tela de login após tentar acessar o painel administrativo, caso ela não efetuasse o login e acessassem o index.php, apresentava janela de erro.


## [0.3.6] - 2022-09-06 16:14
 
### Added

- Adicionada a função para modificar dados do site, agora é possivel o usuário modificar nome, telefone, email e endereço fisico da pádina através do banco de dados.

- Agora quando o usuário tenta acessar o painel administrativo sem ter feito o login, será redirecionado para a página de login.php e após efetuar o login irá redireciona-lo para a página index.php,
onde irá verificar se a sessão "roolback" foi criada, se for verdadeiro, irá verificar se o usuário é um admin, se for verdadeiro irá redirecionalo para a página que tentou acessar antes de efetuar o login, caso o usuário seja um "user" irá redireciona-lo para a página usercp.php. Desta forma o administrador estara retornando para a página em que estava acessando antes da sessão acabar rapidamente.

- Foram criadas novas funções(getOpenUserMenu, getOpenServiceMenu, getOpenGalleryMenu, getOpenConfigMenu) que verificam qual página o usuário esta acessando para que o menu fique aberto conforme a area administrativa o usuário se encontra.

### Removed

### Changed 

- Modificado a função updateConfig($configObj, $conection) para modificar os dados de configuração do site. 


## [0.3.5] - 2022-09-03 00:23
 
### Added

- Formulário com input titulo, descrição e imagem do conteúdo "sobre nós", por enquanto apenas coleta os dados do banco e dados e preenche os inputs para que o usuário possa alterar.(modificação de dados ainda não foi implantada.)
- Nova função getAbout($conection) retorna um objeto About com os seguintes atributos: titulo, descrição e imagem.



### Removed

### Changed 



## [0.3.4] - 2022-08-31 21:08
 
### Added

- Front formulário de configuração do site na area administrativa, onde receberá e informará dados e contato do site.

- Foi adicionado ao banco de dados uma nova tabela de configurações (config) onde guardara os seguintes dados: Nome, E-mail, Telefone e Endereço.

- Nova função "getConfig($conection)" que retornará o objeto com os dados do banco de dados com informações de configurações do site. Usada em toddas páginas onde o nome do site é apresentado, tornando a edição do nome do site mais dinâmica de edição.


### Removed

### Changed 



## [0.3.3] - 2022-08-29 22:40
 
### Added
- adicionado o banco de dados com dados usado no teste do projeto.


### Removed

### Changed 


## [0.3.2] - 2022-08-29 22:34
 
### Added


### Removed

### Changed 

- As imagens da galeria agora são as imagens cadastradas no banco de dados.
- A função "delGallery" testada, está funcionando, foi ajustada para deletar a imagem vinculada.


## [0.3.1] - 2022-08-28 00:02
 
### Added

- Painel Administrativo -> Galeria -> nova Imagem: agora tem um formulário que ao preencher e selecionar uma imagem, envia para a pasta "img/portfolio" e armazena os dados no banco de dados.
- Nova função "insertNewGallery" usada para inserir a nova imagem da galeria para o banco de dados.
- Nova função "delGallery" usada para deletar a imagem do banco de dados(ainda não testado).


### Removed

### Changed 

- Codigo organizado no arquivo admincp.php para melhor leitura e facil entendimento.
- Alterado alguns nomes de atributos da classe Gallery.php para se adequar ao banco de dados e de acordo com o front do index.php


## [0.3.0] - 2022-08-25 22:02
 
### Added

- Painel administrativo -> usuários -> ver usuários a lista com todos usuários cadastrado no banco de dados é mostrada, informando ID, Nome, Categoria(tipo), Documento, celular, e-mail e carteira do usuário. com 2 opções:
  1- Selecionar: Mostrará todas as informações do usuário em um formulário possibilitando a alteração dos dados.
  2- Excluir: Irá deletar o usuário imediatamente, irei adicionar em uma versão futura uma pergunta de confirmação para evitar falha humana.

- instalado composer para o funcionamento do PHPMailer, que ainda não está executando o envio de e-mails, será modificado em versões futuras.



### Removed


### Changed 
- otimização no arquivo functions/functions.php, afim de melhorar a qualidade de escrita do código e atualizado descrições de algumas funções.


## [0.2.9] - 2022-08-11 10:18
 
### Added

- Nova opção no menu superior, Meus Dados. Esta opção será destinada aos dados do proprio usuário, Observação, o campo "Notes" não possui dados do usuário, há uma mensagem lore ipsum.
- Agora a imagem no painel administrativo mostra a foto do usuário, caso ele tenha uma própria já adicionada ao seu perfil, caso contrário irá apresentar uma imagem padrão do sistema.

### Removed

- Pasta vazia /register/

### Changed 

- Agora o usuário quando se cadastra e não adiciona uma foto/imagem ao seu perfil, possuirá uma imagem padrão "img/profile/noimg.jpg".

## [0.2.8] - 2022-08-03 17:34
 
### Added

- Agora ao deletar um serviço, aparecerá uma mensagem informando que o serviço foi deletado e em 5 segundos o usuário será redirecionado automaticamente a listagem de serviços.
- Agora todos os serviços cadastrado no banco de dados, são apresentados na página inicial.
- Novas opções para alterar informações da página foram adicionadas ao menu lateral do painel administrativo:
    Menu->Usuários
        Novo Usuário
        Ver Usuários
    Nenu->Configurações
        Nome da página
        Sobre Nós
        Especialidades
        Profissionais
 Estas opções ainda não estão com suas funcionalidades ativas, foi desenvolvido apenas o front em HTML e Bootstrap.

### Removed

### Changed 

- versão do Admincp.php agora é 0.2.8 [informação do rodapé da página.]



## [0.2.7] - 2022-08-3 12:31
 
### Added

- Novo botão Deletar no menu Serviços -> Ver Serviços -> Deletar. Ao clicar no botão "Deletar", o usuário é levado a uma página quepergunta se ele realmente quer fazer isso, caso confirme o serviço será deletado.
- Função delService($conection), será necessário enviar a variavel de conexão, já que a função irá pegar o dado enviado por GET.

### Removed

### Changed 

- versão do Admincp.php agora é 0.2.7 [informação do rodapé da página.]


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
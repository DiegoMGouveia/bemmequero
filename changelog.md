# Changelog

Todas mudanças realizadas neste projeto serão documentadas neste arquivo a partir de hoje 2022-07-06.


## [0.2.0] - 

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
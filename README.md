# Clients
Sistema criado para estudos, disponibiliza um cadastro completo de clientes, onde um cliente pode ter inúmeros e-mails, telefones, endereços, documentos e outros campos conforme a necessidade.
Para agilizar o processo também faça uma importação por meio de um arquivo CSV, vejá com mais detalhes e até um exemplo em "Sobre".
Você pode acessar esses dados de qualquer outra aplicação por meio de um webservice, onde é preciso apenas ter um cadastro no sistema, vejá com mais detalhes em "Sobre".
Você precisa fazer um cadastro para ter acesso a todas essas funcionalidades.
Sistema internacionalizado.

# Requisitos
1 - Servidor Apache, MySQL >= 4 e PHP >= 5.4
2 - GD habilitado
3 - Rewrite habilitado

# Instalação
1 - Clone o repositório em uma pasta no seu servidor.
2 - Permissão de escrita em "pasta-do-sistema/images/captcha"
3 - Criar vhost para "pasta-do-sistema/"
4 - Configure os dados de conexão no banco de dados em "pasta-do-sistema/application/config/database.php"
5 - No diretório "pasta-do-sistema/application/third_party/DoctrineORM-2.2.2/bin" execute "sudo php doctrine orm:schema-tool:create"
6 - Acesse o vhost e comece a usar.

# Especificações técnicas
Sistema criado em PHP com MySQL, utilizando o framework CodeIgniter 3.0, ORM Doctrine 2.2.2, JQuery 1.11.2 e Bootstrap 3.3.4, seguindo os padrões MVC e Orientado a Objetos.

# Melhorias
Pretendo criar um migration e uma istalação simples como a do wordpress.

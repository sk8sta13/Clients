# Clients

## Sobre
Sistema criado para estudos, disponibiliza um cadastro completo de clientes, onde um cliente pode ter inúmeros e-mails, telefones, endereços, documentos e outros campos conforme a necessidade.

Para agilizar o processo também faça uma importação por meio de um arquivo CSV, vejá com mais detalhes e até um exemplo em "Sobre".

Você pode acessar esses dados de qualquer outra aplicação por meio de um webservice, onde é preciso apenas ter um cadastro no sistema, vejá com mais detalhes em "Sobre".

Você precisa fazer um cadastro para ter acesso a todas essas funcionalidades.

Sistema internacionalizado.

## Requisitos
* Servidor Apache, MySQL >= 4 e PHP >= 5.4
* GD habilitado
* Rewrite habilitado

## Instalação
* Clone o repositório em uma pasta no seu servidor.
* Permissão de escrita em "pasta-do-sistema/images/captcha"
* Criar vhost para "pasta-do-sistema/"
* Configure os dados de conexão no banco de dados em "pasta-do-sistema/application/config/database.php"
* No diretório "pasta-do-sistema/application/third_party/DoctrineORM-2.2.2/bin" execute "sudo php doctrine orm:schema-tool:create"
* Acesse o vhost e comece a usar.

## Especificações técnicas
Sistema criado seguindo os padrões MVC, orientado a objetos e utilizando:

* [PHP][1]
* [MySQL][2]
* [CodeIgniter 3.0][3]
* [ORM Doctrine 2.2.2][4]
* [JQuery][5]
* [Bootstrap 3.3.4][6]

## Melhorias
* Migration
* Instalador

[1]: http://php.net
[2]: http://mysql.com
[3]: http://codeigniter.com
[4]: http://doctrine-project.org
[5]: https://jquery.com
[6]: http://getbootstrap.com

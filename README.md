# entrevista-genesis
App Crud Gerenciador Travel
Sistema de Controle de Viagens Este projeto consiste em um CRUD (Create, Read, Update, Delete) para gerenciamento de Veículos, Motoristas e Viagens, utilizando Laravel e PostgreSQL (via Docker).

Tecnologias Utilizadas

PHP 8+ Laravel PostgreSQL 14+ Docker e Docker Compose

Funcionalidades

Veículos Modelo, Ano, Data de Aquisição, KM inicial, Renavam (único), Placa (única).

Motoristas Nome, Data de Nascimento (>=18 anos), CNH.

Viagens Associa um Veículo e um Motorista.

KM Inicial no início da viagem e KM Final após a conclusão. Validações Importantes

Motorista com menos de 18 anos não é permitido (validação via controller ou Form Request).

Renavam e Placa não podem se repetir entre veículos (uso de unique no banco).

KM Final deve ser maior ou igual ao KM Inicial na viagem (validado no controller).

// Configurações pós revisão

1. Criar tabela pivô na database que vai ligar viagenns e motoristas
2. Ajustar os models (ajustei motorista e viagem)
3. alteraçao no viagem controller (alterei o carregamento p plural)
4. formularios de criar e editar carregar todos os motoristas
5. modifiquei as regras de validação e a forma de persistência.
6. tive q refazer o controller pq tava tentanndo salvar em motorista_id e eu criei uma nova tabela no banco de dados.

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
CREATE TABLE tbSala (
    numero_sala INT AUTO_INCREMENT,
    descricao_sala VARCHAR(20),
    capacidade_sala INT,
    PRIMARY KEY (numero_sala)
);

CREATE TABLE tbDiretor (
    codigo_diretor INT AUTO_INCREMENT,
    nome_diretor VARCHAR(50),
    PRIMARY KEY (codigo_diretor)
);

CREATE TABLE tbFilme (
    codigo_filme INT AUTO_INCREMENT,
    nome_filme VARCHAR(50),
    ano_filme INT,
    categoria_filme VARCHAR(20),
    codigo_diretor INT,
    PRIMARY KEY (codigo_filme),
    FOREIGN KEY (codigo_diretor) REFERENCES tbDiretor(codigo_diretor)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tbSalaFilme (
    numero_sala INT,
    data_salafile DATE,
    horario_salafilme TIME,
    codigo_filme INT,
    PRIMARY KEY (numero_sala),
    FOREIGN KEY (numero_sala) REFERENCES tbSala(numero_sala),
    PRIMARY KEY (data_salafile),
    PRIMARY KEY (horario_salafilme),
    FOREIGN KEY (codigo_filme) REFERENCES tbFilme(codigo_filme)
);
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    jogo VARCHAR(255) NOT NULL,
    data_termino DATE,
    console VARCHAR(255) NOT NULL,
    nota INT NOT NULL,
    review TEXT NOT NULL)

<?php
/**
 * Este é um arquivo de configuração de exemplo.
 * Crie uma deste arquivo em /config/envs/ com o "nomeDaSuaMaquina.php".
 * Este arquivo não será comitado (está no gitignore) e será apenas seu.
 */
$MANUTENCAO = false;

class Config {
    // MySQL
    const DB_SERVER    = 'servidor',
          DB_NAME      = 'nomeDoBanco',
          DB_USERNAME  = 'usuario',
          DB_PASSWORD  = 'senha';
}
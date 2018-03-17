<?php
/**
 * Este é um arquivo de configuração de exemplo.
 * Crie uma deste arquivo em /config/envs/ com o "nomeDaSuaMaquina.php".
 * Este arquivo não será comitado (está no gitignore) e será apenas seu.
 */

$MANUTENCAO = false;

class Config {
    // MySQL - requerido
    const DB_SERVER    = 'servidor',
          DB_NAME      = 'nomeDoBanco',
          DB_USERNAME  = 'usuario',
          DB_PASSWORD  = 'senha';

    // Rollbar - opcional
    const ROLLBAR_TOKEN_SERVER = null,
        ROLLBAR_TOKEN_CLIENT = null,
        ROLLBAR_ENVIRONMENT = null,
        ROLLBAR_EXCEPTION_HANDLER = false,
        ROLLBAR_ERROR_HANDLER = false;

    // Error Reporting - opcional
    const ERROR_REPORTING_LEVEL = E_ERROR | E_WARNING | E_PARSE | E_NOTICE;
}
<?php

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

return [
  'dsn' => "pgsql:host={$_ENV['host']};dbname={$_ENV['dbname']}",
  'user' => "{$_ENV['user']}",
  'password' => "{$_ENV['password']}"
];

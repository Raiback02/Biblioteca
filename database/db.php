<?php

   $host = 'localhost';
   $user = 'root';
   $password = '';
   $dbname = 'bd_biblioteca';

   try {
       $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Conexão bem-sucedida!\n"; // Log para depuração
   } catch (PDOException $e) {
       die("Erro ao conectar ao banco de dados: " . $e->getMessage());
   }

   ?>
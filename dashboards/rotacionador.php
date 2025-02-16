<?php
// Redirecionamento conforme o tipo de usuário
if ($usuario["tipo"] == "Aluno") {
    header("Location: ../dashboards/aluno/dashboard.php");

} elseif ($usuario["tipo"] == "Assistente") {
    header("Location: ../dashboards/assistente/dashboard.php");

} else {
    header("Location: ../dashboards/admin/dashboard.php");
    
}

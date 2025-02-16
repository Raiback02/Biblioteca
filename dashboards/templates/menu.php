<div class="d-flex">
    <div class="bg-dark text-white vh-100 p-3" style="width: 350px;">
        <h4 class="text-left">Menu</h4>
        <ul class="nav flex-column">
            <?php if ($tipo_usuario == "Administrador"): ?>
                <li class="nav-item"><a href="?" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-clock-history"></i> Histórico de Atividades</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-book"></i> Gerenciar Livros</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-person"></i> Gerenciar Assistentes</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-people"></i> Gerenciar Alunos</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-journal"></i> Empréstimos e Devoluções</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-bookmark"></i> Livros Reservados</a></li>
            <?php elseif ($tipo_usuario == "Assistente"): ?>
                <li class="nav-item"><a href="?" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-journal"></i> Empréstimos e Devoluções</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-book"></i> Gerenciar Livros</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-people"></i> Gerenciar Alunos</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Relatórios</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="?" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="?page=reservar" class="nav-link text-white"><i class="bi bi-book-half"></i> Reservar Livros</a></li>
                <li class="nav-item"><a href="?page=reservas" class="nav-link text-white"><i class="bi bi-bookmark"></i> Minhas Reservas</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="container-fluid p-4">
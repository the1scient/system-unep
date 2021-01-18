<?php 
include_once("./global.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];

$query_not = "SELECT * FROM notificacoes WHERE user = '{$usuarioNome}' AND is_read = 0 ORDER BY id DESC";
$res_not = $conn->query($query_not);
$total_not = $res_not->num_rows;

if($total_not == 1) {
    $text_not = "notificação";
}
else {
    $text_not = "notificações";
}

$sql_get_adm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
$count_get_adm = mysqli_num_rows($sql_get_adm);

$sql_select_guia = mysqli_query($conn, "SELECT * FROM guias WHERE nickname = '{$usuarioNome}'");
$num_select_guia = mysqli_num_rows($sql_select_guia);
if($num_select_guia <= 0) {

}
else {
    $fetch_select_guia = mysqli_fetch_array($sql_select_guia);
    $getlider_guia = $fetch_select_guia["cargo"];
}


$sql_select_pf = mysqli_query($conn, "SELECT * FROM professores WHERE nickname = '{$usuarioNome}'");
$num_select_pf = mysqli_num_rows($sql_select_pf);
if($num_select_pf <= 0) {

}
else {
    $fetch_select_pf = mysqli_fetch_array($sql_select_pf);
    $getlider_pf = $fetch_select_pf["cargo"];
}


$sql_select_ins = mysqli_query($conn, "SELECT * FROM instrutores WHERE nickname = '{$usuarioNome}'");
$num_select_ins = mysqli_num_rows($sql_select_ins);
if($num_select_ins <= 0) {

}
else {
    $fetch_select_ins = mysqli_fetch_array($sql_select_ins);
    $getlider_ins = $fetch_select_ins["cargo"];
    
}


$patente_id = $patente_id;


$getusersudo = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}'");
$sqlfetchsudo = mysqli_fetch_array($getusersudo);
$usr_sudo = $sqlfetchsudo["usr_perm"];
?>


<header class="header-desktop2" style="background: #ffff00;">
                <div class="section__content section__content--p30">   
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none" style="">
                                <a href="painel.php">
                                <h3 style="color: white;"><img src="<?php echo $imagem_site ?>"> <?php echo $titulo_site ?> </h3>
                                </a>
                            </div>
                            <?php 
                            echo "<div style='display: none;'>";
                            if($_SESSION["usr"]) {
                                $usr = $_SESSION["usr"];
                            }
                            else {
                                $usr = "";
                            }
                            echo "</div>";
                            ?>

                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i style="color: black;" class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="perfil.php" method="POST">
                                            <input class="au-input au-input--full au-input--h65" type="text" name="usr" value="<?php echo $usr ?>" placeholder="Pesquise algum usuário..." />
                                            <span  class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i style="color: black;" class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>Você possui <strong><?php echo $total_not ?></strong> <?php echo $text_not ?>.</p>
                                        </div>
                                        <?php 
                                        $sql_not = mysqli_query($conn, $query_not);
                                        while($r_n = mysqli_fetch_array($sql_not)) {
                                            $data = date("d/m/Y", strtotime($r_n["data"]));
                                            $hora = date("H:i:s", strtotime($r_n["data"]));
                                            switch($r_n['noti_type']) {
                                            case 1:
                                                $bgc = "green";
                                            break;
                                            case 2:
                                                $bgc = "yellow";
                                            break;
                                            case 3:
                                                $bgc = "red";
                                            break;
                                            }
                                            echo ' <div class="notifi__item">
                                            <div style="background-color:'.$bgc.';"class="bg-c1 img-cir img-40">
                                                <img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$r_n["enviado_por"].'&action=std&direction=2&head_direction=2&size=l&headonly=1">
                                            </div>
                                            <div class="content">
                                                <p>'.$r_n['msg'].'</p>
                                                <span class="date" style="font-weight: bold;">'.$data.' às '.$hora.' por: '.$r_n['enviado_por'].'&nbsp;&nbsp;<a href="kernel/action.php?tipo=notificacao&id='.$r_n["id"].'">Arquivar</a></span>
                                            </div>
                                        </div>';
                                        }
                                        ?>
                                       
                                        
                                        <div class="notifi__footer">
                                            <a href="user_notificacoes.php">Todas notificações</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i style="color: black;" class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="meu_perfil.php">
                                                <i class="zmdi zmdi-account"></i>Conta</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="user_configs.php">
                                                <i class="zmdi zmdi-settings"></i>Configurações</a>
                                        </div>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
            <div class="logo" style="background: #47494e;">
                <a href="painel.php">
                    <h3 style="color: white;"><img src="<?php echo $imagem_site ?>"> <?php echo $titulo_site ?> </h3>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                   
                       <div style="margin-top: -35px; height: 120px; width: 50%; background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?&user=<?php echo $usuarioNome ?>&action=&direction=4&head_direction=3&img_format=png&gesture=&headonly=0&size=l),  radial-gradient(circle, rgba(97,97,97,1) 64%, rgba(0,0,0,1) 85%); background-position: center top -30px; border-radius: 60px; "></div>
                  
                    <h4 style="font-family: cursive;"><?php echo $usuarioNome ?></h4>
                    <a href="#">Cargo: <strong><?php echo $patente_nome ?></strong></a>                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="painel.php">
                                <i class="fas fa-home"></i>Home
                              
                            </a>
                           
                        </li>
                        
                        <?php if($count_get_adm > 0): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#" style="color: red;">
                                <i class="fas fa-gavel"></i>Administração
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <?php if($usr_sudo > 1): ?>
                            <li>
                                    <a href="tables.php?type=gerusers">
                                    <i class="fas fa-gear"><i class="fas fa-users"></i></i>Gerenciar usuários com permissão</a>
                            </li>
                            <li>
                                    <a href="forms.php?type=dar_adm_painel">
                                    <i class="fas fa-gear"><i class="fas fa-briefcase"></i></i>Dar admin</a>
                                </li>
                            
                           
                            <?php endif; ?>
                                <li>
                                    <a href="viewlogs.php">
                                   <i class="fas fa-search"></i>Logs</a>
                                </li>
                               
                                <li>
                                    <a href="tables.php?type=ver_historico">
                                   <i class="fas fa-search"></i>Ver histórico</a>
                                </li>
                                <li>
                                    <a href="tables.php?type=ver_avais">
                                   <i class="fas fa-search"></i>Ver avais</a>
                                </li>
                                <li>
                                    <a href="forms.php?type=setar_patente">
                                   <i class="fas fa-group"></i>Definir patente</a>
                                </li>
                                <li>
                                    <a href="forms.php?type=add_destaques">
                                   <i class="fas fa-group"></i>Adicionar destaques</a>
                                </li>
                                <li>
                                    <a href="forms.php?type=readmitir_policial">
                                   <i class="fas fa-group"></i>Readmitir funcionário</a>
                                </li>
                                <li>
                                    <a href="forms.php?type=atualizar_anuncio">
                                   <i class="fas fa-bullhorn"></i>Atualizar anúncio</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Relatórios
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                    <a href="forms.php?type=aval">
                                        <i class="fas fa-sign-in-alt"></i>Solicitar Aval</a>
                            </li>
                            <li>
                                    <a href="forms.php?type=relatorio_base">
                                        <i class="fas fa-sign-in-alt"></i>Relatório de Base</a>
                            </li>
                            <li>
                                    <a href="forms.php?type=relatorio_aula">
                                        <i class="fas fa-sign-in-alt"></i>Relatório de Aula</a>
                            </li>
                            <?php if($patente_id <= 16): ?>
                            <li>
                                <a href="forms.php?type=relatorio_ronda">
                                <i class="fas fa-sign-in-alt"></i>Relatório de Ronda</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                    <a href="forms.php?type=add_contrato">
                                        <i class="fas fa-sign-in-alt"></i>Contrato</a>
                                </li>
                           
                             
                            </ul>
                        </li>

                   
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file"></i>Documentos
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                    <a href="documento_estatuto.php">
                                        <i class="fas fa-sign-in-alt"></i>Estatuto</a>
                                </li>
                                <?php if($num_select_ins > 0): ?>
                                <li>
                                    <a href="tables.php?type=documento_aula_rh">
                                        <i class="fas fa-sign-in-alt"></i>Aula RH</a>
                                </li>
                                    <?php endif; ?>
                                    <?php if($num_select_guia > 0): ?>
                                        <li>
                                    <a href="tables.php?type=documentos_di">
                                        <i class="fas fa-sign-in-alt"></i>Aulas DI</a>
                                </li>
                                    <?php endif; ?>
                            </ul>
                        </li>


                       
                        <li>
                            <a href="tables.php?type=ver_policiais">
                                <i class="fas fa-group"></i>Lista de Funcionários</a>
                        </li>
                        
                     
                      
                      
                        <?php if($num_select_ins > 0): ?>
                                                <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>RH
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                    <a href="forms.php?type=add_funcionario">
                                   <i class="fas fa-plus"></i>Conta de Funcionário</a>
                                </li>
                                <li >
                                    <a href="forms.php?type=definir_tag">
                                        <i class="fas fa-sign-in-alt"></i>Definir TAG</a>
                                </li>
                            <?php if($getlider_ins > 1): ?>
                            <li >
                                    <a href="forms.php?type=add_instrutor" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Adicionar membro do RH</a>
                                </li>
                                <li >
                                    <a href="tables.php?type=ver_instrutores" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Ver/gerenciar membros</a>
                                </li>
                                <?php endif; ?>
                          
                              
                                <li>
                                    <a href="tables.php?type=relatorios_instrutores" >
                                        <i class="fas fa-sign-in-alt"></i>Ver relatórios</a>
                                </li>
                              
                               
                             
                            </ul>
                        </li>
                                            <?php endif; ?>

                     
                   
                      
                        <?php if($num_select_guia > 0): ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-md"></i>Dep. de Instrução
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <?php if($getlider_guia > 1):?>
                            <li >
                                    <a href="forms.php?type=add_guia" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Adicionar membro</a>
                                </li>
                           <?php endif; ?>
                               
                                <li>
                                    <a href="tables.php?type=ver_guias">
                                        <i class="fas fa-sign-in-alt"></i>Ver membros</a>
                                </li>
                         
                            </ul>
                        </li>
                        <?php endif; ?>

                   













                                            <?php if($num_select_pf > 0): ?>
                                                <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Professores
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                            <?php if($getlider_pf > 1): ?>
                            <li >
                                    <a href="forms.php?type=add_professor" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Adicionar professor</a>
                                </li>
                                <?php endif; ?>
                            <li>
                                    <a href="forms.php?type=add_te">
                                        <i class="fas fa-sign-in-alt"></i>T. Especializado (Sargento)</a>
                                </li>
                                <li>
                                    <a href="forms.php?type=add_tf">
                                        <i class="fas fa-sign-in-alt"></i>T. Formação (Subtenente)</a>
                                </li>
                             <?php if($getlider_pf > 1): ?>
                                <li >
                                    <a href="tables.php?type=relatorios_professores" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Ver relatórios</a>
                                </li>
                                <li >
                                    <a href="tables.php?type=ver_professores" style='color: red;'>
                                        <i class="fas fa-sign-in-alt"></i>Ver professores</a>
                                </li>
                             <?php endif; ?>
                            </ul>
                        </li>
                                            <?php endif; ?>




                                            <?php if($num_select_pf > 0): ?>
                                                <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Scripts Professores
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                           
                            <li>
                                    <a href="documento_te.php">
                                        <i class="fas fa-sign-in-alt"></i>T. Especializado (Sargento)</a>
                                </li>
                                <li>
                                    <a href="documento_tf.php">
                                        <i class="fas fa-sign-in-alt"></i>T. Formação (Subtenente)</a>
                                </li>
                             
                            </ul>
                        </li>
                                            <?php endif; ?>
























                            


                        
                        <li>
                            <a href="logout.php" style="color: black;">
                                <i class="fas fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
            </aside>
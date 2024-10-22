<?php
session_start();
include_once('config.php'); // Conexão com o banco de dados

$sql = "SELECT data, qualidade_ar FROM qualidade_ar WHERE estado = 'São Paulo'";
$result = $conexao->query($sql);
$data = [];
$qualidade = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['data'];
        $qualidade[] = $row['qualidade_ar'];
    }
} else {
    echo "Nenhum dado encontrado.";
}

$data_json = json_encode($data);
$qualidade_json = json_encode($qualidade);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico da Qualidade do Ar</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #9ebbeb; /* Cor de fundo */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .logo {
            position: fixed; 
            top: 20px; 
            left: 20px; 
            width: 150px; 
            z-index: 1000; 
        }
        .container {
            margin-top: 50px; 
            padding: 20px; 
        }
        .box {
            background-color: white; 
            border-radius: 8px; 
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3); 
            padding: 20px; 
            border: 2px solid black; 
        }
        h2 {
            margin-bottom: 20px; 
        }
        a {
            background-image: linear-gradient(white, rgb(102, 188, 249));
            width: 100%;
            padding: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            cursor: pointer;
            border-radius: 20px;
            text-decoration: none;
            color: black;
        }
        a:hover {
            background-image: linear-gradient(rgb(214, 212, 212), rgb(59, 163, 237));
            color: black;
        }
    </style>
</head>
<body>
    <img src="TigerTech.png" alt="Logotipo da Empresa" class="logo"> 

    <div class="container">
        <div class="box"> 
            <h2>Gráfico da Qualidade do Ar - São Paulo</h2>
            <canvas id="graficoQualidadeAr"></canvas>
            <a href="agradecimento.php">Voltar para a página anterior</a> 
        </div>
    </div>

    <script>
        const ctx = document.getElementById('graficoQualidadeAr').getContext('2d');
        const data = <?php echo $qualidade_json; ?>;
        const labels = <?php echo $data_json; ?>;

        const graficoQualidadeAr = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Qualidade do Ar',
                    data: data,                         
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Índice de Qualidade do Ar'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Data'
                        }
                    }
                }
            }
        });
    </script>
    <div vw="" class="enabled" style="left: initial; right: 0px; top: 50%; bottom: initial; transform: translateY(calc(-50% - 10px));">
			<div vw-access-button="" class="active"><img class="access-button" data-src="assets/access_icon.svg" alt="Conteúdo acessível em Libras usando o VLibras Widget com opções dos Avatares Ícaro, Hosana ou Guga." src="https://vlibras.gov.br/app//assets/access_icon.svg">
<img class="pop-up" data-src="assets/access_popup.jpg" alt="Conteúdo acessível em Libras usando o VLibras Widget com opções dos Avatares Ícaro, Hosana ou Guga." src="https://vlibras.gov.br/app//assets/access_popup.jpg"></div>
			<div vw-plugin-wrapper="" class="" style="background: rgb(235, 235, 235);"><div vp="">
  <div vp-box="" class="vpw-box"><span class="vpw-mes">VLIBRAS</span>
<div settings-btn="" class="vpw-settings-btn"><div>
    <button title="Configurações" class="vpw-header-btn-settings"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.1726 19.34C15.3929 19.34 14.6451 19.0303 14.0937 18.4789C13.5424 17.9275 13.2326 17.1797 13.2326 16.4C13.2326 15.6203 13.5424 14.8725 14.0937 14.3211C14.6451 13.7697 15.3929 13.46 16.1726 13.46C16.9524 13.46 17.7002 13.7697 18.2515 14.3211C18.8029 14.8725 19.1126 15.6203 19.1126 16.4C19.1126 17.1797 18.8029 17.9275 18.2515 18.4789C17.7002 19.0303 16.9524 19.34 16.1726 19.34ZM22.4138 17.2148C22.4474 16.946 22.4726 16.6772 22.4726 16.4C22.4726 16.1228 22.4474 15.8456 22.4138 15.56L24.1862 14.1908C24.3458 14.0648 24.3878 13.838 24.287 13.6532L22.607 10.7468C22.5062 10.562 22.2794 10.4864 22.0946 10.562L20.003 11.402C19.5662 11.0744 19.1126 10.7888 18.5834 10.5788L18.2726 8.3528C18.2556 8.25386 18.204 8.16416 18.1272 8.09958C18.0503 8.03501 17.953 7.99973 17.8526 8H14.4926C14.2826 8 14.1062 8.1512 14.0726 8.3528L13.7618 10.5788C13.2326 10.7888 12.779 11.0744 12.3422 11.402L10.2506 10.562C10.0658 10.4864 9.83904 10.562 9.73824 10.7468L8.05824 13.6532C7.94904 13.838 7.99944 14.0648 8.15904 14.1908L9.93144 15.56C9.89784 15.8456 9.87264 16.1228 9.87264 16.4C9.87264 16.6772 9.89784 16.946 9.93144 17.2148L8.15904 18.6092C7.99944 18.7352 7.94904 18.962 8.05824 19.1468L9.73824 22.0532C9.83904 22.238 10.0658 22.3052 10.2506 22.238L12.3422 21.3896C12.779 21.7256 13.2326 22.0112 13.7618 22.2212L14.0726 24.4472C14.1062 24.6488 14.2826 24.8 14.4926 24.8H17.8526C18.0626 24.8 18.239 24.6488 18.2726 24.4472L18.5834 22.2212C19.1126 22.0028 19.5662 21.7256 20.003 21.3896L22.0946 22.238C22.2794 22.3052 22.5062 22.238 22.607 22.0532L24.287 19.1468C24.3878 18.962 24.3458 18.7352 24.1862 18.6092L22.4138 17.2148Z" fill="#FDFDFD"></path></svg></button>
    <button title="Dicionário" class="vpw-header-btn-dictionary"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4351 18.0629H18.7124L18.4563 17.8159C19.3838 16.7401 19.8935 15.3667 19.8925 13.9463C19.8925 12.7702 19.5438 11.6206 18.8904 10.6427C18.237 9.66484 17.3083 8.90269 16.2218 8.45263C15.1353 8.00258 13.9397 7.88482 12.7862 8.11426C11.6327 8.3437 10.5732 8.91002 9.74162 9.74162C8.91002 10.5732 8.3437 11.6327 8.11426 12.7862C7.88482 13.9397 8.00258 15.1353 8.45263 16.2218C8.90269 17.3083 9.66484 18.237 10.6427 18.8904C11.6206 19.5438 12.7702 19.8925 13.9463 19.8925C15.4191 19.8925 16.773 19.3528 17.8159 18.4563L18.0629 18.7124V19.4351L22.6369 24L24 22.6369L19.4351 18.0629ZM13.9463 18.0629C11.6684 18.0629 9.82962 16.2241 9.82962 13.9463C9.82962 11.6684 11.6684 9.82962 13.9463 9.82962C16.2241 9.82962 18.0629 11.6684 18.0629 13.9463C18.0629 16.2241 16.2241 18.0629 13.9463 18.0629Z" fill="#FDFDFD"></path></svg></button>
</div>
<div>
    <button title="Conheça o VLibras" class="vpw-header-btn-about"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.12 20V20.08H15.2H16.8H16.88V20V15.2V15.12H16.8H15.2H15.12V15.2V20ZM16.6271 12.1731L16.6269 12.1729C16.4575 12.0042 16.2468 11.92 16 11.92C15.7532 11.92 15.5427 12.0042 15.3738 12.173C15.2045 12.3423 15.12 12.5531 15.12 12.8C15.12 13.0468 15.2045 13.2574 15.3738 13.4262C15.5426 13.5955 15.7532 13.68 16 13.68C16.2469 13.68 16.4577 13.5955 16.627 13.4262C16.7958 13.2573 16.88 13.0468 16.88 12.8C16.88 12.5532 16.7958 12.3425 16.6271 12.1731ZM12.8483 8.55614L12.8483 8.55615C11.8661 8.98026 11.0109 9.55599 10.2834 10.2834C9.55599 11.0109 8.98053 11.8661 8.55695 12.8483C8.13217 13.8321 7.92 14.8829 7.92 16C7.92 17.1171 8.13217 18.1679 8.55695 19.1517C8.98053 20.1339 9.55599 20.9891 10.2834 21.7166C11.0109 22.444 11.8661 23.0195 12.8483 23.443C13.8321 23.8678 14.8829 24.08 16 24.08C17.1171 24.08 18.1679 23.8678 19.1517 23.443C20.1339 23.0195 20.9891 22.444 21.7166 21.7166C22.444 20.9891 23.0195 20.1339 23.443 19.1517C23.8678 18.1679 24.08 17.1171 24.08 16C24.08 14.8829 23.8678 13.8321 23.443 12.8483C23.0195 11.8661 22.444 11.0109 21.7166 10.2834C20.9891 9.55599 20.1339 8.98026 19.1517 8.55615L19.1517 8.55614C18.1679 8.1319 17.1171 7.92 16 7.92C14.8829 7.92 13.8321 8.1319 12.8483 8.55614ZM20.4834 20.4834C19.2587 21.7081 17.7659 22.32 16 22.32C14.2341 22.32 12.7413 21.7081 11.5166 20.4834C10.2919 19.2587 9.68 17.7659 9.68 16C9.68 14.2341 10.2919 12.7413 11.5166 11.5166C12.7413 10.2919 14.2341 9.68 16 9.68C17.7659 9.68 19.2587 10.2919 20.4834 11.5166C21.7081 12.7413 22.32 14.2341 22.32 16C22.32 17.7659 21.7081 19.2587 20.4834 20.4834Z" fill="#FDFDFD" stroke="#FDFDFD" stroke-width="0.16"></path></svg></button>
    <button class="vpw-header-btn-close"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.2733 10.2849C10.4483 10.11 10.6856 10.0117 10.9331 10.0117C11.1806 10.0117 11.418 10.11 11.593 10.2849L15.5998 14.2917L19.6066 10.2849C19.6927 10.1958 19.7957 10.1247 19.9096 10.0758C20.0234 10.0269 20.1459 10.0011 20.2698 10C20.3938 9.99896 20.5167 10.0226 20.6314 10.0695C20.7461 10.1164 20.8503 10.1857 20.9379 10.2734C21.0255 10.361 21.0948 10.4652 21.1418 10.5799C21.1887 10.6946 21.2123 10.8175 21.2112 10.9414C21.2102 11.0654 21.1844 11.1878 21.1355 11.3017C21.0866 11.4156 21.0155 11.5186 20.9263 11.6047L16.9195 15.6115L20.9263 19.6183C21.0963 19.7943 21.1904 20.0301 21.1883 20.2748C21.1862 20.5195 21.088 20.7536 20.915 20.9266C20.7419 21.0997 20.5078 21.1978 20.2631 21.2C20.0184 21.2021 19.7826 21.108 19.6066 20.938L15.5998 16.9312L11.593 20.938C11.417 21.108 11.1812 21.2021 10.9365 21.2C10.6918 21.1978 10.4577 21.0997 10.2846 20.9266C10.1116 20.7536 10.0134 20.5195 10.0113 20.2748C10.0092 20.0301 10.1033 19.7943 10.2733 19.6183L14.2801 15.6115L10.2733 11.6047C10.0983 11.4296 10 11.1923 10 10.9448C10 10.6973 10.0983 10.46 10.2733 10.2849V10.2849Z" fill="#FDFDFD"></path></svg></button>
</div></div>
<div settings-btn-close=""></div>

<div class="vpw-container-dict">
</div></div>
  <div vp-message-box="" class="vpw-message-box"><span class="vpw-message"></span></div>
  <div vp-settings="" class="vpw-settings"><div class="vpw-settings-content">
    <div class="vpw-screen-header">
        <button><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.3758 14.9511H11.5981L16.7436 9.80561C17.1548 9.39439 17.1548 8.71957 16.7436 8.30835C16.646 8.21061 16.5302 8.13306 16.4026 8.08015C16.2751 8.02723 16.1383 8 16.0002 8C15.8621 8 15.7254 8.02723 15.5978 8.08015C15.4703 8.13306 15.3544 8.21061 15.2569 8.30835L8.30835 15.2569C8.21061 15.3544 8.13306 15.4703 8.08015 15.5978C8.02724 15.7254 8 15.8621 8 16.0002C8 16.1383 8.02724 16.2751 8.08015 16.4026C8.13306 16.5302 8.21061 16.646 8.30835 16.7436L15.2569 23.6921C15.3545 23.7897 15.4704 23.8671 15.5979 23.92C15.7255 23.9728 15.8622 24 16.0002 24C16.1383 24 16.275 23.9728 16.4025 23.92C16.5301 23.8671 16.646 23.7897 16.7436 23.6921C16.8412 23.5945 16.9186 23.4786 16.9715 23.351C17.0243 23.2235 17.0515 23.0868 17.0515 22.9487C17.0515 22.8107 17.0243 22.674 16.9715 22.5464C16.9186 22.4189 16.8412 22.303 16.7436 22.2054L11.5981 17.0599H23.3758C23.9557 17.0599 24.4302 16.5854 24.4302 16.0055C24.4302 15.4256 23.9557 14.9511 23.3758 14.9511Z" fill="#0F2B54"></path></svg></button>
        <span>Configurações</span>
    </div>

    <div class="vpw-options-container">

        <div class="vpw-option-content vpw-option__regionalism">
            <p>Dicionário</p>
            <div>
                <span>Regionalismo</span>
                <div class="vpw-selected-region">
                    <img src="https://vlibras.gov.br/app//assets/brazil.png">
                    <span>BR</span>
                </div>
            </div>
        </div>

        <div class="vpw-option-content vpw-widget-exclusive-opacity">
            <p>Aparência</p>
            <div>
                <div class="vpw-opacity-info">
                    <span>Opacidade</span>
                    <span class="vpw-opacity-value">100%</span>
                </div>
                <div class="vpw-opacity-range">
                    <input type="range" value="100" min="0" max="100" step="5">
                    <vpw-slider style="width: 100%;"></vpw-slider>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="vpw-option-content vpw-option__position vpw-widget-exclusive-position">
            <div>
                <span>Posição na tela</span>
                <div class="vpw-position-box">
                <span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="4" width="24" height="3" fill="#2470E0"></rect><rect y="11" width="16" height="3" fill="#2470E0"></rect><rect y="18" width="8" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="4" width="24" height="3" fill="#2470E0"></rect><rect x="4" y="11" width="16" height="3" fill="#2470E0"></rect><rect x="8" y="18" width="8" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="4" width="24" height="3" fill="#2470E0"></rect><rect x="8" y="11" width="16" height="3" fill="#2470E0"></rect><rect x="16" y="18" width="8" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="4" width="16" height="3" fill="#2470E0"></rect><rect y="11" width="24" height="3" fill="#2470E0"></rect><rect y="18" width="16" height="3" fill="#2470E0"></rect></svg></span><span style="visibility: hidden;"></span><span class="vpw-select-pos"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="4" width="16" height="3" fill="#2470E0"></rect><rect y="11" width="24" height="3" fill="#2470E0"></rect><rect x="8" y="18" width="16" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="4" width="8" height="3" fill="#2470E0"></rect><rect y="11" width="16" height="3" fill="#2470E0"></rect><rect y="18" width="24" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="4" width="8" height="3" fill="#2470E0"></rect><rect x="4" y="11" width="16" height="3" fill="#2470E0"></rect><rect y="18" width="24" height="3" fill="#2470E0"></rect></svg></span><span><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="16" y="4" width="8" height="3" fill="#2470E0"></rect><rect x="8" y="11" width="16" height="3" fill="#2470E0"></rect><rect y="18" width="24" height="3" fill="#2470E0"></rect></svg></span></div>
            </div>
        </div>

    </div>

    <div class="vpw-regions-container"><div class="vpw-region selected"><img class="vpw-flag" data-src="assets/brazil.png" src="https://vlibras.gov.br/app//assets/brazil.png">
<span class="vpw-name">Brasil (Padrão)</span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/1AC.png" src="https://vlibras.gov.br/app//assets/1AC.png">
<span class="vpw-name">Acré<span> - AC</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/2AL.png" src="https://vlibras.gov.br/app//assets/2AL.png">
<span class="vpw-name">Alagoas<span> - AL</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/3AP.png" src="https://vlibras.gov.br/app//assets/3AP.png">
<span class="vpw-name">Amapá<span> - AP</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/4AM.png" src="https://vlibras.gov.br/app//assets/4AM.png">
<span class="vpw-name">Amazonas<span> - AM</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/5BA.png" src="https://vlibras.gov.br/app//assets/5BA.png">
<span class="vpw-name">Bahia<span> - BA</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/6CE.png" src="https://vlibras.gov.br/app//assets/6CE.png">
<span class="vpw-name">Ceará<span> - CE</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/7DF.png" src="https://vlibras.gov.br/app//assets/7DF.png">
<span class="vpw-name">Distrito Federal<span> - DF</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/8ES.png" src="https://vlibras.gov.br/app//assets/8ES.png">
<span class="vpw-name">Espírito Santo<span> - ES</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/9GO.png" src="https://vlibras.gov.br/app//assets/9GO.png">
<span class="vpw-name">Goias<span> - GO</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/10MA.png" src="https://vlibras.gov.br/app//assets/10MA.png">
<span class="vpw-name">Maranhão<span> - MA</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/11MT.png" src="https://vlibras.gov.br/app//assets/11MT.png">
<span class="vpw-name">Mato Grosso<span> - MT</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/12MS.png" src="https://vlibras.gov.br/app//assets/12MS.png">
<span class="vpw-name">Mato Grosso do Sul<span> - MS</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/13MG.png" src="https://vlibras.gov.br/app//assets/13MG.png">
<span class="vpw-name">Minas Gerais<span> - MG</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/14PA.png" src="https://vlibras.gov.br/app//assets/14PA.png">
<span class="vpw-name">Pará<span> - PA</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/15PB.png" src="https://vlibras.gov.br/app//assets/15PB.png">
<span class="vpw-name">Paraíba<span> - PB</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/16PR.png" src="https://vlibras.gov.br/app//assets/16PR.png">
<span class="vpw-name">Paraná<span> - PR</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/17PE.png" src="https://vlibras.gov.br/app//assets/17PE.png">
<span class="vpw-name">Pernambuco<span> - PE</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/18PI.png" src="https://vlibras.gov.br/app//assets/18PI.png">
<span class="vpw-name">Piauí<span> - PI</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/19RJ.png" src="https://vlibras.gov.br/app//assets/19RJ.png">
<span class="vpw-name">Rio de Janeiro<span> - RJ</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/20RN.png" src="https://vlibras.gov.br/app//assets/20RN.png">
<span class="vpw-name">Rio Grande do Norte<span> - RN</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/21RS.png" src="https://vlibras.gov.br/app//assets/21RS.png">
<span class="vpw-name">Rio Grande do Sul<span> - RS</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/22RO.png" src="https://vlibras.gov.br/app//assets/22RO.png">
<span class="vpw-name">Rondônia<span> - RO</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/23RR.png" src="https://vlibras.gov.br/app//assets/23RR.png">
<span class="vpw-name">Roráima<span> - RR</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/24SC.png" src="https://vlibras.gov.br/app//assets/24SC.png">
<span class="vpw-name">Santa Catarina<span> - SC</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/25SP.png" src="https://vlibras.gov.br/app//assets/25SP.png">
<span class="vpw-name">São Paulo<span> - SP</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/26SE.png" src="https://vlibras.gov.br/app//assets/26SE.png">
<span class="vpw-name">Sergipe<span> - SE</span></span>
<span class="vpw-radio"></span></div><div class="vpw-region"><img class="vpw-flag" data-src="assets/27TO.png" src="https://vlibras.gov.br/app//assets/27TO.png">
<span class="vpw-name">Tocantins<span> - TO</span></span>
<span class="vpw-radio"></span></div></div>
</div></div>
  <div vp-dictionary=""></div>
  <div vp-settings-btn=""></div>
  <div vp-info-screen="" class="vpw-info-screen"><!---------------------------------------------------------------------------->
<div class="vpw-info-header">
  <button class="vpw-back-button"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.3758 14.9511H11.5981L16.7436 9.80561C17.1548 9.39439 17.1548 8.71957 16.7436 8.30835C16.646 8.21061 16.5302 8.13306 16.4026 8.08015C16.2751 8.02723 16.1383 8 16.0002 8C15.8621 8 15.7254 8.02723 15.5978 8.08015C15.4703 8.13306 15.3544 8.21061 15.2569 8.30835L8.30835 15.2569C8.21061 15.3544 8.13306 15.4703 8.08015 15.5978C8.02724 15.7254 8 15.8621 8 16.0002C8 16.1383 8.02724 16.2751 8.08015 16.4026C8.13306 16.5302 8.21061 16.646 8.30835 16.7436L15.2569 23.6921C15.3545 23.7897 15.4704 23.8671 15.5979 23.92C15.7255 23.9728 15.8622 24 16.0002 24C16.1383 24 16.275 23.9728 16.4025 23.92C16.5301 23.8671 16.646 23.7897 16.7436 23.6921C16.8412 23.5945 16.9186 23.4786 16.9715 23.351C17.0243 23.2235 17.0515 23.0868 17.0515 22.9487C17.0515 22.8107 17.0243 22.674 16.9715 22.5464C16.9186 22.4189 16.8412 22.303 16.7436 22.2054L11.5981 17.0599H23.3758C23.9557 17.0599 24.4302 16.5854 24.4302 16.0055C24.4302 15.4256 23.9557 14.9511 23.3758 14.9511Z" fill="#0F2B54"></path></svg></button>
  <span class="text-black-header">Quem Somos</span>
</div>

<div class="vpw-info__main">
  <div class="vpw-info__section">
    <p class="vpw-info__section-title">Sobre o VLibras</p>
    <span class="vpw-info__section-desc">
      A suíte VLibras é um conjunto de ferramentas
      gratuitas de código aberto que traduz conteúdo digital
      (texto, áudio e vídeo) em Português para Libras.
    </span>
  </div>
  <div class="vpw-info__contributors">
    <p class="vpw-info__section-title">Realizadores</p>
    <div class="vpw-info__logos-container">
      <img class="vpw-logo" data-src="assets/ministerioDireitosHumanos.svg" src="https://vlibras.gov.br/app//assets/ministerioDireitosHumanos.svg">
      <img class="vpw-logo" data-src="assets/ministerioGestao.svg" src="https://vlibras.gov.br/app//assets/ministerioGestao.svg">
    </div>

    <div class="vpw-info__logos-container">
      <img class="vpw-logo" data-src="assets/lavid.svg" src="https://vlibras.gov.br/app//assets/lavid.svg">
      <img class="vpw-logo" data-src="assets/rnp.svg" src="https://vlibras.gov.br/app//assets/rnp.svg">
      <img class="vpw-logo" data-src="assets/camDeputados.svg" src="https://vlibras.gov.br/app//assets/camDeputados.svg">
    </div>
  </div>

  <div class="vpw-info__footer">
    <span class="vpw-info__section-title">Redes sociais</span>
    <div class="vpw-info__networks-container">
      <a target="_blank" href="https://www.gov.br/governodigital/pt-br/vlibras/"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.488 17.6C19.552 17.072 19.6 16.544 19.6 16C19.6 15.456 19.552 14.928 19.488 14.4H22.192C22.32 14.912 22.4 15.448 22.4 16C22.4 16.552 22.32 17.088 22.192 17.6M18.072 22.048C18.552 21.16 18.92 20.2 19.176 19.2H21.536C20.7609 20.5346 19.5313 21.5456 18.072 22.048ZM17.872 17.6H14.128C14.048 17.072 14 16.544 14 16C14 15.456 14.048 14.92 14.128 14.4H17.872C17.944 14.92 18 15.456 18 16C18 16.544 17.944 17.072 17.872 17.6ZM16 22.368C15.336 21.408 14.8 20.344 14.472 19.2H17.528C17.2 20.344 16.664 21.408 16 22.368ZM12.8 12.8H10.464C11.2311 11.4618 12.4598 10.4492 13.92 9.952C13.44 10.84 13.08 11.8 12.8 12.8ZM10.464 19.2H12.8C13.08 20.2 13.44 21.16 13.92 22.048C12.4629 21.5453 11.2359 20.5342 10.464 19.2ZM9.808 17.6C9.68 17.088 9.6 16.552 9.6 16C9.6 15.448 9.68 14.912 9.808 14.4H12.512C12.448 14.928 12.4 15.456 12.4 16C12.4 16.544 12.448 17.072 12.512 17.6M16 9.624C16.664 10.584 17.2 11.656 17.528 12.8H14.472C14.8 11.656 15.336 10.584 16 9.624ZM21.536 12.8H19.176C18.9256 11.8092 18.5549 10.8527 18.072 9.952C19.544 10.456 20.768 11.472 21.536 12.8ZM16 8C11.576 8 8 11.6 8 16C8 18.1217 8.84285 20.1566 10.3431 21.6569C11.086 22.3997 11.9679 22.989 12.9385 23.391C13.9091 23.7931 14.9494 24 16 24C18.1217 24 20.1566 23.1571 21.6569 21.6569C23.1571 20.1566 24 18.1217 24 16C24 14.9494 23.7931 13.9091 23.391 12.9385C22.989 11.9679 22.3997 11.086 21.6569 10.3431C20.914 9.60028 20.0321 9.011 19.0615 8.60896C18.0909 8.20693 17.0506 8 16 8Z" fill="#0D459D"></path></svg></a>
      <a target="_blank" href="https://facebook.com/vlibras"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.808 10.656H20.312V8.11202C19.5838 8.0363 18.8521 7.99892 18.12 8.00002C15.944 8.00002 14.456 9.32802 14.456 11.76V13.856H12V16.704H14.456V24H17.4V16.704H19.848L20.216 13.856H17.4V12.04C17.4 11.2 17.624 10.656 18.808 10.656Z" fill="#0D459D"></path></svg></a>
      <a target="_blank" href="https://instagram.com/vlibrasoficial"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 13.6C15.3635 13.6 14.753 13.8529 14.3029 14.3029C13.8529 14.753 13.6 15.3635 13.6 16C13.6 16.6365 13.8529 17.247 14.3029 17.6971C14.753 18.1471 15.3635 18.4 16 18.4C16.6365 18.4 17.247 18.1471 17.6971 17.6971C18.1471 17.247 18.4 16.6365 18.4 16C18.4 15.3635 18.1471 14.753 17.6971 14.3029C17.247 13.8529 16.6365 13.6 16 13.6ZM16 12C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20C14.9391 20 13.9217 19.5786 13.1716 18.8284C12.4214 18.0783 12 17.0609 12 16C12 14.9391 12.4214 13.9217 13.1716 13.1716C13.9217 12.4214 14.9391 12 16 12ZM21.2 11.8C21.2 12.0652 21.0946 12.3196 20.9071 12.5071C20.7196 12.6946 20.4652 12.8 20.2 12.8C19.9348 12.8 19.6804 12.6946 19.4929 12.5071C19.3054 12.3196 19.2 12.0652 19.2 11.8C19.2 11.5348 19.3054 11.2804 19.4929 11.0929C19.6804 10.9054 19.9348 10.8 20.2 10.8C20.4652 10.8 20.7196 10.9054 20.9071 11.0929C21.0946 11.2804 21.2 11.5348 21.2 11.8ZM16 9.6C14.0208 9.6 13.6976 9.6056 12.7768 9.6464C12.1496 9.676 11.7288 9.76 11.3384 9.912C11.0117 10.032 10.7163 10.2242 10.4744 10.4744C10.224 10.7163 10.0315 11.0117 9.9112 11.3384C9.7592 11.7304 9.6752 12.1504 9.6464 12.7768C9.6048 13.66 9.6 13.9688 9.6 16C9.6 17.9792 9.6056 18.3024 9.6464 19.2232C9.676 19.8496 9.76 20.2712 9.9112 20.6608C10.0472 21.0088 10.2072 21.2592 10.4728 21.5248C10.7424 21.7936 10.9928 21.9544 11.3368 22.0872C11.732 22.24 12.1528 22.3248 12.7768 22.3536C13.66 22.3952 13.9688 22.4 16 22.4C17.9792 22.4 18.3024 22.3944 19.2232 22.3536C19.8488 22.324 20.2704 22.24 20.6608 22.0888C20.987 21.9682 21.2822 21.7764 21.5248 21.5272C21.7944 21.2576 21.9552 21.0072 22.088 20.6632C22.24 20.2688 22.3248 19.8472 22.3536 19.2232C22.3952 18.34 22.4 18.0312 22.4 16C22.4 14.0208 22.3944 13.6976 22.3536 12.7768C22.324 12.1512 22.24 11.7288 22.088 11.3384C21.9674 11.012 21.7753 10.7168 21.5256 10.4744C21.2838 10.2239 20.9884 10.0313 20.6616 9.9112C20.2696 9.7592 19.8488 9.6752 19.2232 9.6464C18.34 9.6048 18.0312 9.6 16 9.6ZM16 8C18.1736 8 18.4448 8.008 19.2976 8.048C20.1496 8.088 20.7296 8.2216 21.24 8.42C21.768 8.6232 22.2128 8.8984 22.6576 9.3424C23.0644 9.74232 23.3792 10.2261 23.58 10.76C23.7776 11.2696 23.912 11.8504 23.952 12.7024C23.9896 13.5552 24 13.8264 24 16C24 18.1736 23.992 18.4448 23.952 19.2976C23.912 20.1496 23.7776 20.7296 23.58 21.24C23.3797 21.7742 23.0649 22.2581 22.6576 22.6576C22.2576 23.0643 21.7738 23.379 21.24 23.58C20.7304 23.7776 20.1496 23.912 19.2976 23.952C18.4448 23.9896 18.1736 24 16 24C13.8264 24 13.5552 23.992 12.7024 23.952C11.8504 23.912 11.2704 23.7776 10.76 23.58C10.2259 23.3796 9.74202 23.0648 9.3424 22.6576C8.93553 22.2577 8.62075 21.774 8.42 21.24C8.2216 20.7304 8.088 20.1496 8.048 19.2976C8.0104 18.4448 8 18.1736 8 16C8 13.8264 8.008 13.5552 8.048 12.7024C8.088 11.8496 8.2216 11.2704 8.42 10.76C8.62019 10.2257 8.93504 9.74186 9.3424 9.3424C9.74214 8.93538 10.2259 8.62058 10.76 8.42C11.2704 8.2216 11.8496 8.088 12.7024 8.048C13.5552 8.0104 13.8264 8 16 8Z" fill="#0D459D"></path></svg></a>
      <a target="_blank" href="https://twitter.com/VLibrasoficial"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3647 9.92352C18.6342 9.9234 17.9328 10.2101 17.4115 10.7218C16.8903 11.2336 16.5907 11.9295 16.5774 12.6599L16.5505 14.1737C16.5489 14.255 16.5301 14.335 16.4955 14.4085C16.4608 14.482 16.4109 14.5474 16.3492 14.6003C16.2875 14.6532 16.2153 14.6925 16.1374 14.7155C16.0594 14.7386 15.9774 14.7449 15.8969 14.734L14.3965 14.5303C12.4224 14.2612 10.5308 13.3519 8.71619 11.84C8.14142 15.0214 9.26404 17.2253 11.9677 18.9256L13.6468 19.9809C13.7266 20.031 13.7929 20.1 13.8399 20.1816C13.8869 20.2633 13.9131 20.3553 13.9163 20.4494C13.9196 20.5436 13.8997 20.6371 13.8584 20.7218C13.8171 20.8066 13.7557 20.8798 13.6795 20.9353L12.1494 22.0531C13.0596 22.1098 13.9237 22.0695 14.6407 21.9272C19.1753 21.0218 22.1904 17.6098 22.1904 11.9813C22.1904 11.5219 21.2178 9.92352 19.3647 9.92352ZM14.6551 12.6243C14.6719 11.6978 14.9616 10.7969 15.488 10.0343C16.0144 9.27165 16.754 8.68126 17.6144 8.33703C18.4747 7.99279 19.4175 7.91 20.3246 8.09903C21.2318 8.28806 22.063 8.74049 22.7143 9.3997C23.3976 9.39489 23.9791 9.5679 25.2795 8.77976C24.9576 10.356 24.799 11.0404 24.1127 11.9813C24.1127 19.3264 19.5982 22.898 15.0174 23.812C11.8764 24.4387 7.30908 23.4093 6 22.0426C6.66703 21.9907 9.37745 21.6994 10.9441 20.5528C9.6187 19.6791 4.34299 16.5746 7.80983 8.22807C9.43704 10.1282 11.0873 11.4219 12.7597 12.1082C13.8727 12.5647 14.1457 12.5551 14.656 12.6253L14.6551 12.6243Z" fill="#0D459D"></path></svg></a>
      <a target="_blank" href="https://youtube.com/@vlibras-lavid3180"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.606 10.995C23.53 10.697 23.314 10.472 23.067 10.403C22.63 10.28 20.5 10 16 10C11.5 10 9.372 10.28 8.931 10.403C8.687 10.471 8.471 10.696 8.394 10.995C8.285 11.419 8 13.196 8 16C8 18.804 8.285 20.58 8.394 21.006C8.47 21.303 8.686 21.528 8.932 21.596C9.372 21.72 11.5 22 16 22C20.5 22 22.629 21.72 23.069 21.597C23.313 21.529 23.529 21.304 23.606 21.005C23.715 20.581 24 18.8 24 16C24 13.2 23.715 11.42 23.606 10.995ZM25.543 10.498C26 12.28 26 16 26 16C26 16 26 19.72 25.543 21.502C25.289 22.487 24.546 23.262 23.605 23.524C21.896 24 16 24 16 24C16 24 10.107 24 8.395 23.524C7.45 23.258 6.708 22.484 6.457 21.502C6 19.72 6 16 6 16C6 16 6 12.28 6.457 10.498C6.711 9.513 7.454 8.738 8.395 8.476C10.107 8 16 8 16 8C16 8 21.896 8 23.605 8.476C24.55 8.742 25.292 9.516 25.543 10.498ZM14 19.5V12.5L20 16L14 19.5Z" fill="#0D459D"></path></svg></a>
    </div>

  </div>
</div>
<!----------------------------------------------------------------------------></div>
  <div vp-suggestion-screen=""><div class="vp-suggestion-screen-header">
  <span>Feedback</span>
  <button><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6317 19.8897C22.5157 20.0059 22.3779 20.0981 22.2262 20.161C22.0745 20.224 21.9119 20.2563 21.7477 20.2563C21.5835 20.2563 21.4209 20.224 21.2692 20.161C21.1175 20.0981 20.9798 20.0059 20.8638 19.8897L15.9989 15.0248L11.134 19.8897C10.8996 20.1241 10.5816 20.2558 10.2501 20.2558C9.91855 20.2558 9.60058 20.1241 9.36614 19.8897C9.1317 19.6552 9 19.3373 9 19.0057C9 18.6742 9.1317 18.3562 9.36614 18.1218L15.1212 12.3667C15.2372 12.2505 15.375 12.1582 15.5267 12.0953C15.6784 12.0324 15.841 12 16.0052 12C16.1694 12 16.332 12.0324 16.4837 12.0953C16.6353 12.1582 16.7731 12.2505 16.8891 12.3667L22.6442 18.1218C23.1207 18.5982 23.1207 19.4007 22.6317 19.8897Z" fill="#0F2B54"></path></svg></button>
</div>

<div class="vp-suggestion-screen-content">

  <span class="vp-suggestion-screen__title">Informe a glosa correta</span>

  <div class="vp-user-textarea-container">
    <textarea class="vp-user-textarea"></textarea>
  </div>
  
  <ul class="vp-dropdown-suggest"></ul>

  <div vp-sugestion-area="" class="vp-suggestion-buttons-container">
    <button class="vp-send-gloss-button">Enviar sugestão</button>
    <button class="vp-play-gloss-button">Reproduzir</button>
  </div>

</div>
</div>
  <div vp-translator-screen=""><div class="vp-translator-screen-header">
  <span>Tradutor</span>
  <button><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.2733 10.2849C10.4483 10.11 10.6856 10.0117 10.9331 10.0117C11.1806 10.0117 11.418 10.11 11.593 10.2849L15.5998 14.2917L19.6066 10.2849C19.6927 10.1958 19.7957 10.1247 19.9096 10.0758C20.0234 10.0269 20.1459 10.0011 20.2698 10C20.3938 9.99896 20.5167 10.0226 20.6314 10.0695C20.7461 10.1164 20.8503 10.1857 20.9379 10.2734C21.0255 10.361 21.0948 10.4652 21.1418 10.5799C21.1887 10.6946 21.2123 10.8175 21.2112 10.9414C21.2102 11.0654 21.1844 11.1878 21.1355 11.3017C21.0866 11.4156 21.0155 11.5186 20.9263 11.6047L16.9195 15.6115L20.9263 19.6183C21.0963 19.7943 21.1904 20.0301 21.1883 20.2748C21.1862 20.5195 21.088 20.7536 20.915 20.9266C20.7419 21.0997 20.5078 21.1978 20.2631 21.2C20.0184 21.2021 19.7826 21.108 19.6066 20.938L15.5998 16.9312L11.593 20.938C11.417 21.108 11.1812 21.2021 10.9365 21.2C10.6918 21.1978 10.4577 21.0997 10.2846 20.9266C10.1116 20.7536 10.0134 20.5195 10.0113 20.2748C10.0092 20.0301 10.1033 19.7943 10.2733 19.6183L14.2801 15.6115L10.2733 11.6047C10.0983 11.4296 10 11.1923 10 10.9448C10 10.6973 10.0983 10.46 10.2733 10.2849V10.2849Z" fill="#FDFDFD"></path></svg></button>
</div>

<div class="vp-translator-screen-content">

  <span class="vp-translator-screen__title">
    Insira seu texto
  </span>
  
  <div class="vp-user-textarea-container">
    <textarea class="vp-user-textarea"></textarea>
    <button disabled="" class="vp-clear-textarea">Limpar</button>
  </div>

  <div vp-sugestion-area="" class="vp-translator-buttons-container">
    <button disabled="" class="vp-play-gloss-button">
      Traduzir
    </button>
  </div>
</div>
</div>
  <div vp-main-guide-screen="" class="vp-enabled" style="top: 0px; max-width: 639px; left: auto; right: 50px;"><p class="vpw-guide__main__title">Primeira vez por aqui?</p>
<span class="vpw-guide__main__desc">Que tal aprender sobre as funcionalidades do VLibras Widget?</span>

<div class="vpw-guide__main__buttons-container">
    <button class="vpw-guide__main__accept-btn">
        <span>Sim</span>
        <span>, ir para o tutorial</span>
    </button>
    <button class="vpw-guide__main__deny-btn">
        <span>Não</span>
        <span>, obrigado</span>
    </button>
</div></div>
  <div vp-suggestion-button=""></div>
  <div vp-rate-box=""><div class="vp-rate-box-header">
  <span>Feedback</span>
  <button><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6317 19.8897C22.5157 20.0059 22.3779 20.0981 22.2262 20.161C22.0745 20.224 21.9119 20.2563 21.7477 20.2563C21.5835 20.2563 21.4209 20.224 21.2692 20.161C21.1175 20.0981 20.9798 20.0059 20.8638 19.8897L15.9989 15.0248L11.134 19.8897C10.8996 20.1241 10.5816 20.2558 10.2501 20.2558C9.91855 20.2558 9.60058 20.1241 9.36614 19.8897C9.1317 19.6552 9 19.3373 9 19.0057C9 18.6742 9.1317 18.3562 9.36614 18.1218L15.1212 12.3667C15.2372 12.2505 15.375 12.1582 15.5267 12.0953C15.6784 12.0324 15.841 12 16.0052 12C16.1694 12 16.332 12.0324 16.4837 12.0953C16.6353 12.1582 16.7731 12.2505 16.8891 12.3667L22.6442 18.1218C23.1207 18.5982 23.1207 19.4007 22.6317 19.8897Z" fill="#0F2B54"></path></svg></button>
</div>

<div class="vp-rate-box-content">
  <div class="vp-rate-box__translation">
    <span>Gostou da tradução?</span>
    <div class="vp-rate-btns">
      <button class="vp-rate-btns--like"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27.4162 16.6862C27.9462 15.9858 28.2396 15.1277 28.2396 14.2348C28.2396 12.8182 27.4477 11.4774 26.1731 10.7297C25.845 10.5372 25.4714 10.4359 25.091 10.4363H17.5254L17.7147 6.55881C17.7589 5.62179 17.4276 4.73209 16.784 4.05378C16.4681 3.71944 16.0871 3.45343 15.6644 3.27219C15.2416 3.09094 14.7862 2.99831 14.3263 3.00002C12.6857 3.00002 11.2344 4.10426 10.799 5.68489L8.08894 15.4968H4.00959C3.45116 15.4968 3 15.948 3 16.5064V27.9904C3 28.5488 3.45116 29 4.00959 29H22.9803C23.2706 29 23.5545 28.9432 23.8164 28.8296C25.3181 28.1892 26.2867 26.7221 26.2867 25.0942C26.2867 24.6966 26.2299 24.3054 26.1164 23.9268C26.6464 23.2264 26.9398 22.3683 26.9398 21.4754C26.9398 21.0779 26.883 20.6867 26.7694 20.3081C27.2995 19.6077 27.5929 18.7496 27.5929 17.8567C27.5866 17.4592 27.5298 17.0648 27.4162 16.6862ZM5.27157 26.7284V17.7684H7.82708V26.7284H5.27157ZM25.3497 15.5914L24.6588 16.1909L25.0973 16.9922C25.2418 17.2562 25.3167 17.5526 25.315 17.8535C25.315 18.3741 25.0878 18.8694 24.6966 19.2102L24.0057 19.8096L24.4442 20.611C24.5887 20.875 24.6636 21.1714 24.6619 21.4723C24.6619 21.9928 24.4348 22.4882 24.0435 22.8289L23.3526 23.4284L23.7911 24.2297C23.9356 24.4937 24.0105 24.7901 24.0088 25.091C24.0088 25.7977 23.5924 26.435 22.9488 26.7253H9.84625V17.6674L12.9854 6.2938C13.0664 6.00228 13.2401 5.74509 13.4804 5.5612C13.7206 5.37732 14.0143 5.27675 14.3168 5.27475C14.5566 5.27475 14.7932 5.34415 14.9825 5.48613C15.2949 5.71959 15.4621 6.07295 15.4431 6.44839L15.1403 12.7078H25.0594C25.621 13.0517 25.9681 13.6322 25.9681 14.2348C25.9681 14.7554 25.7409 15.2476 25.3497 15.5914Z" fill="#838891"></path></svg><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27.4162 16.6862C27.9462 15.9858 28.2396 15.1277 28.2396 14.2348C28.2396 12.8182 27.4477 11.4774 26.1731 10.7297C25.845 10.5372 25.4714 10.4359 25.091 10.4363H17.5254L17.7147 6.55881C17.7589 5.62179 17.4276 4.73209 16.784 4.05378C16.4681 3.71944 16.0871 3.45343 15.6644 3.27219C15.2416 3.09094 14.7862 2.99831 14.3263 3.00002C12.6857 3.00002 11.2344 4.10426 10.799 5.68489L8.08894 15.4968H8.07948V29H22.9803C23.2706 29 23.5545 28.9432 23.8164 28.8296C25.3181 28.1892 26.2867 26.7221 26.2867 25.0942C26.2867 24.6966 26.2299 24.3054 26.1163 23.9268C26.6464 23.2264 26.9398 22.3683 26.9398 21.4754C26.9398 21.0779 26.883 20.6867 26.7694 20.3081C27.2995 19.6077 27.5929 18.7496 27.5929 17.8567C27.5866 17.4592 27.5298 17.0648 27.4162 16.6862ZM3 16.5064V27.9904C3 28.5488 3.45116 29 4.00959 29H6.06031V15.4968H4.00959C3.45116 15.4968 3 15.948 3 16.5064Z" fill="#0D459D"></path></svg>Sim</button>
      <button class="vp-rate-btns--deslike"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27.4162 16.6862C27.9462 15.9858 28.2396 15.1277 28.2396 14.2348C28.2396 12.8182 27.4477 11.4774 26.1731 10.7297C25.845 10.5372 25.4714 10.4359 25.091 10.4363H17.5254L17.7147 6.55881C17.7589 5.62179 17.4276 4.73209 16.784 4.05378C16.4681 3.71944 16.0871 3.45343 15.6644 3.27219C15.2416 3.09094 14.7862 2.99831 14.3263 3.00002C12.6857 3.00002 11.2344 4.10426 10.799 5.68489L8.08894 15.4968H4.00959C3.45116 15.4968 3 15.948 3 16.5064V27.9904C3 28.5488 3.45116 29 4.00959 29H22.9803C23.2706 29 23.5545 28.9432 23.8164 28.8296C25.3181 28.1892 26.2867 26.7221 26.2867 25.0942C26.2867 24.6966 26.2299 24.3054 26.1164 23.9268C26.6464 23.2264 26.9398 22.3683 26.9398 21.4754C26.9398 21.0779 26.883 20.6867 26.7694 20.3081C27.2995 19.6077 27.5929 18.7496 27.5929 17.8567C27.5866 17.4592 27.5298 17.0648 27.4162 16.6862ZM5.27157 26.7284V17.7684H7.82708V26.7284H5.27157ZM25.3497 15.5914L24.6588 16.1909L25.0973 16.9922C25.2418 17.2562 25.3167 17.5526 25.315 17.8535C25.315 18.3741 25.0878 18.8694 24.6966 19.2102L24.0057 19.8096L24.4442 20.611C24.5887 20.875 24.6636 21.1714 24.6619 21.4723C24.6619 21.9928 24.4348 22.4882 24.0435 22.8289L23.3526 23.4284L23.7911 24.2297C23.9356 24.4937 24.0105 24.7901 24.0088 25.091C24.0088 25.7977 23.5924 26.435 22.9488 26.7253H9.84625V17.6674L12.9854 6.2938C13.0664 6.00228 13.2401 5.74509 13.4804 5.5612C13.7206 5.37732 14.0143 5.27675 14.3168 5.27475C14.5566 5.27475 14.7932 5.34415 14.9825 5.48613C15.2949 5.71959 15.4621 6.07295 15.4431 6.44839L15.1403 12.7078H25.0594C25.621 13.0517 25.9681 13.6322 25.9681 14.2348C25.9681 14.7554 25.7409 15.2476 25.3497 15.5914Z" fill="#838891"></path></svg><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27.4162 16.6862C27.9462 15.9858 28.2396 15.1277 28.2396 14.2348C28.2396 12.8182 27.4477 11.4774 26.1731 10.7297C25.845 10.5372 25.4714 10.4359 25.091 10.4363H17.5254L17.7147 6.55881C17.7589 5.62179 17.4276 4.73209 16.784 4.05378C16.4681 3.71944 16.0871 3.45343 15.6644 3.27219C15.2416 3.09094 14.7862 2.99831 14.3263 3.00002C12.6857 3.00002 11.2344 4.10426 10.799 5.68489L8.08894 15.4968H8.07948V29H22.9803C23.2706 29 23.5545 28.9432 23.8164 28.8296C25.3181 28.1892 26.2867 26.7221 26.2867 25.0942C26.2867 24.6966 26.2299 24.3054 26.1163 23.9268C26.6464 23.2264 26.9398 22.3683 26.9398 21.4754C26.9398 21.0779 26.883 20.6867 26.7694 20.3081C27.2995 19.6077 27.5929 18.7496 27.5929 17.8567C27.5866 17.4592 27.5298 17.0648 27.4162 16.6862ZM3 16.5064V27.9904C3 28.5488 3.45116 29 4.00959 29H6.06031V15.4968H4.00959C3.45116 15.4968 3 15.948 3 16.5064Z" fill="#0D459D"></path></svg>Não</button>
    </div>
  </div>

  <div class="vp-rate-box__gloss">
    <p class="vp-rate-box__suggestion-text">Quer sugerir uma nova animação para <box-gloss></box-gloss>?</p>
    <a class="vp-rate-box__suggestion-wiki" target="_blank" href="https://wiki.vlibras.gov.br/">
      Sim, acessar WikiLibras
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 6V8H14.59L5 17.59L6.41 19L16 9.41V18H18V6H6Z" fill="black"></path></svg></a>
    <button class="vp-rate-box__suggestion-deny">Não sugerir animação</button>
  </div>
</div></div>
  <div vp-change-avatar="" class="vp--off active"><button class="vp-button-change-avatar avatar-icaro vp-selected" avatar-name="Ícaro"><svg viewBox="0 0 15 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.1978 0.544955C14.2458 0.210663 14.2796 0.0704356 14.3199 0.0394909C14.3947 -0.0180806 14.4181 -0.0148594 14.4941 0.0634105C14.5638 0.135272 14.8299 0.96204 14.918 1.38067C14.968 1.61832 14.9679 1.65365 14.9162 1.8705C14.8195 2.2757 14.5298 2.61636 14.0643 2.87211C13.9634 2.92752 13.671 3.02735 13.4145 3.09393C12.7982 3.2539 12.43 3.38011 11.8959 3.61448C11.6529 3.72109 11.4477 3.8145 11.4397 3.82211C11.4318 3.82968 11.4413 3.85237 11.4609 3.87252C11.4861 3.8985 11.5269 3.89284 11.6016 3.85306C11.716 3.79206 11.8364 3.81022 11.8364 3.88846C11.8364 3.91546 11.8226 3.93756 11.8057 3.93756C11.7889 3.93756 11.7293 3.97725 11.6734 4.02574C11.5234 4.15589 11.4894 4.32692 11.5567 4.61324C11.7076 5.25451 11.7067 5.52503 11.5522 6.04509C11.4789 6.2921 11.4698 6.81096 11.534 7.09029C11.5972 7.36533 11.8085 7.79674 11.996 8.03336C12.224 8.32105 12.4668 8.50309 12.8532 8.67601C13.4486 8.94241 13.6198 9.11639 13.5225 9.35614C13.4568 9.51823 13.1041 9.96167 12.8936 10.1468C12.6951 10.3214 12.4511 10.4862 12.1418 10.6546C12.0221 10.7198 11.9129 10.8069 11.8878 10.8572C11.8635 10.9058 11.8328 11.0955 11.8195 11.2788C11.8062 11.4621 11.7785 11.6263 11.7577 11.6438C11.737 11.6613 11.6571 11.693 11.5802 11.7141C11.407 11.7619 11.3819 11.7994 11.4772 11.8681C11.6465 11.9904 11.6434 12.0468 11.4506 12.3516C11.1485 12.8294 10.9934 13.328 10.854 14.2696C10.7599 14.9051 10.6978 15.0198 10.3989 15.1108C10.2332 15.1612 8.31063 14.8339 7.95594 14.6949C7.90365 14.6744 7.83733 14.6821 7.74787 14.719C7.63548 14.7654 7.59539 14.8135 7.47013 15.0525C7.38959 15.2062 7.2519 15.4981 7.16411 15.7012L7.00451 16.0706L7.14762 16.2798C7.28471 16.4802 7.29259 16.5055 7.33504 16.8818C7.36971 17.1889 7.39833 17.308 7.46628 17.4275C7.53446 17.5474 7.54483 17.5908 7.51441 17.6286C7.48124 17.6698 7.46385 17.6688 7.39451 17.622C7.25057 17.5248 7.26772 17.6057 7.42293 17.756C7.61201 17.9391 7.84294 18.3089 7.96355 18.6217C8.01441 18.7537 8.12776 19.1623 8.21542 19.5298C8.30289 19.8964 8.47092 20.5571 8.58938 21H0.959429C0.972833 20.9627 -0.0135542 20.9263 0.000141312 20.891C0.146141 20.5154 0.428168 19.9945 0.769199 19.4705C1.2794 18.6866 1.76783 17.7435 2.19379 16.7198C2.54164 15.8839 2.95523 15.5 2.95523 15.5C2.84759 15.4403 3.16022 15.5357 3.16022 15.4334C3.16022 15.3632 3.45179 14.7941 3.65539 14.4669C3.85737 14.1423 3.99114 14.0582 4.20765 14.1198C4.39653 14.1736 4.48399 14.1353 4.55316 13.9687C4.75265 13.488 5.07214 12.5469 5.17406 12.1399C5.32465 11.5384 5.32352 11.5324 4.89067 10.6326C4.25887 9.3194 3.56252 8.25152 2.69243 7.26163C2.01712 6.49329 1.68417 6.03056 1.3444 5.38799C1.26142 5.23107 1.18081 5.1027 1.16522 5.1027C1.11675 5.1027 1.09817 5.21939 1.12899 5.33021C1.16851 5.47219 1.11845 5.55875 1.05017 5.46657C0.953403 5.33604 0.933424 5.07515 0.977437 4.51787C1.01673 4.0206 1.026 3.97536 1.11406 3.84963C1.16602 3.77551 1.30298 3.64038 1.41839 3.54937C1.62699 3.38491 1.70767 3.27806 1.93026 2.87139C2.11897 2.52661 2.68432 1.99398 2.76896 2.08122C2.78422 2.09695 2.73043 2.26946 2.64945 2.46466C2.56847 2.65982 2.50907 2.83791 2.51748 2.86046C2.52779 2.88815 2.65314 2.84607 2.90465 2.73051C3.10919 2.63651 3.65802 2.39002 4.12424 2.18276C5.03322 1.7787 6.098 1.24253 6.76746 0.851763C7.27191 0.557326 7.38533 0.504758 7.75266 0.395098C8.24122 0.249284 8.67719 0.228038 9.98524 0.286329C10.6217 0.314703 11.1565 0.346847 11.1736 0.357779C11.2438 0.4025 11.1958 0.466754 11.0421 0.533681C10.8788 0.604823 10.791 0.705573 10.8332 0.773596C10.8628 0.821367 12.164 1.41189 12.4756 1.51898C12.6085 1.56469 12.837 1.62809 12.9833 1.65992C13.5575 1.78487 13.8101 1.72322 13.9718 1.41881C14.0934 1.18989 14.1197 1.08811 14.1978 0.544955Z" fill="#FDFDFD"></path></svg></button>
<button class="vp-button-change-avatar avatar-hosana" avatar-name="Hosana"><svg viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.40241 0.631978C8.9808 0.716853 9.16038 0.769907 9.81694 1.04987C10.3368 1.27153 10.4929 1.29756 11.002 1.2474C11.6047 1.18803 11.7875 1.22545 12.3658 1.52658C12.8876 1.79833 13.5098 2.24078 13.872 2.5977C14.4245 3.14203 14.9568 4.25334 15.0293 5.01382C15.0647 5.38446 14.9857 7.1975 14.9278 7.34425C14.9086 7.39291 14.8658 7.44131 14.8327 7.45183C14.7562 7.47609 14.6277 7.39278 14.5799 7.28788C14.5312 7.18102 14.4891 7.18571 14.4275 7.30485C14.3831 7.3907 14.3824 7.42398 14.4218 7.57474C14.4598 7.72042 14.4599 7.76892 14.4221 7.89206C14.3283 8.19814 14.2787 8.4955 14.3 8.62366C14.3568 8.96556 14.6937 9.52705 14.9792 9.75568C15.2453 9.96881 15.3003 10.0666 15.3003 10.3267C15.3003 10.6665 15.1939 10.8196 14.7916 11.0586C14.6387 11.1494 14.5516 11.2255 14.5166 11.2989C14.4673 11.4023 14.469 11.413 14.5628 11.5945C14.6409 11.7456 14.6533 11.7958 14.6253 11.8482C14.5523 11.9853 14.4879 12.0542 14.3383 12.1551L14.1839 12.2593L14.234 12.363C14.2616 12.4201 14.3052 12.5052 14.3309 12.5523C14.3745 12.6319 14.3708 12.6476 14.2788 12.7803C14.2244 12.8586 14.1423 12.9774 14.0963 13.0443C14.0306 13.1397 14.003 13.2409 13.9676 13.5165C13.9339 13.7776 13.8975 13.9171 13.8248 14.0627C13.7087 14.2953 13.6829 14.3282 13.5244 14.4466C13.206 14.6844 12.786 14.7047 11.9036 14.5249C11.1224 14.3658 11.0853 14.3615 10.871 14.4058C10.4166 14.4997 10.2533 14.677 10.0621 15.284C9.99727 15.49 9.90139 15.7734 9.84912 15.9137C9.79681 16.0541 9.75401 16.1957 9.75401 16.2285C9.75401 16.2613 9.93187 16.5275 10.1492 16.8201C11.2261 18.2696 11.886 19.4454 12.422 20.8695C12.4894 21.0487 12.5541 21.2336 12.5656 21.2805L12.5866 21.3658L10.5841 21.39C9.48268 21.4033 7.68231 21.4033 6.58328 21.3901L4.58502 21.3659L4.55007 21.0821C4.50428 20.7101 4.57726 20.0497 4.72516 19.4983C4.92653 18.7473 5.14849 18.2057 5.7315 17.0427C5.95151 16.6038 6.14734 16.1935 6.16669 16.1308C6.23603 15.906 6.27071 15.5826 6.2401 15.4464C6.20395 15.2854 6.24697 15.1027 6.33175 15.0574C6.36458 15.0398 6.55761 15.0097 6.76071 14.9906C6.97433 14.9704 7.14001 14.9395 7.15378 14.9172C7.16691 14.8959 7.19423 14.7756 7.21449 14.6497C7.23475 14.5239 7.26396 14.3722 7.2794 14.3126C7.3333 14.1045 7.29559 14.0971 7.00117 14.2575C6.70538 14.4188 6.60806 14.4244 6.64275 14.2781C6.65385 14.2313 6.69525 14.1715 6.73472 14.1453C6.84301 14.0735 7.04311 13.8612 7.139 13.7163C7.22338 13.5888 7.22368 13.5861 7.16759 13.4685C7.08155 13.2881 6.71062 12.8597 6.4514 12.6414C6.32429 12.5343 5.98043 12.2827 5.68721 12.0822C5.01593 11.6232 4.69259 11.3551 4.46415 11.0682C4.26897 10.8231 3.97262 10.2518 3.86042 9.90446C3.77171 9.62961 3.74552 9.6073 3.58075 9.66599C3.50992 9.6912 3.35668 9.71341 3.24025 9.7153C3.12381 9.71719 2.92032 9.72956 2.78803 9.74282C2.58949 9.76269 2.49563 9.75383 2.25064 9.69211C1.30751 9.45452 0.61103 8.74315 0.24792 7.64659C-0.14333 6.46499 -0.0664988 5.01141 0.442454 3.96631C0.741533 3.35216 1.23967 2.8749 1.73511 2.72775C1.82591 2.70078 2.07109 2.6575 2.27992 2.63161C2.61375 2.59021 2.70153 2.59038 3.00692 2.6332C3.40378 2.68883 3.53744 2.72111 3.75291 2.81347C3.94842 2.8973 3.99763 2.87568 4.21949 2.60855C4.47066 2.30618 5.03925 1.82136 5.49593 1.52016C6.23512 1.03267 6.87897 0.783293 7.71846 0.659336C7.95133 0.624943 8.15651 0.59827 8.17443 0.600061C8.19234 0.601852 8.29493 0.616215 8.40241 0.631978Z" fill="#FDFDFD"></path></svg></button>
<button class="vp-button-change-avatar avatar-guga" avatar-name="Guga"><svg viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.48336 0.162225C3.11944 0.342375 2.91798 0.625103 2.83877 1.06725L2.78711 1.35516H2.25916C1.96878 1.35516 1.70497 1.3814 1.67289 1.41349C1.64081 1.44557 1.73023 1.56912 1.87163 1.68815C2.22831 1.98824 2.20775 2.22408 1.80023 2.50648C0.689716 3.27602 0.0857602 4.52975 0.0121373 6.21815C-0.0792539 8.31258 0.309426 9.14982 2.42023 11.4052C2.91749 11.9366 3.28042 12.3936 3.28042 12.4884C3.28042 12.7837 3.37626 12.9127 3.5977 12.9155C3.71731 12.917 3.90371 12.992 4.01204 13.0823C4.19869 13.2376 4.20626 13.2797 4.15542 13.8815C4.12589 14.231 4.06683 14.5286 4.02405 14.5429C3.66548 14.6634 3.38555 14.9804 3.17258 15.5071C2.86221 16.2749 2.54765 17.5808 2.48472 18.3625L2.43347 19H5.85945H9.28542V18.708C9.28542 18.3362 9.16738 18.1111 8.33869 16.9024C7.37394 15.4951 7.36201 15.4669 7.42412 14.7323C7.48203 14.0471 7.60312 13.8013 7.97839 13.6073C8.21991 13.4823 8.26227 13.4867 8.81819 13.6926C9.52456 13.9545 10.4033 14.147 10.9482 14.1592C11.4604 14.1708 11.6814 13.9762 11.8796 13.3393C11.9596 13.082 12.0956 12.7806 12.1817 12.6695C12.2815 12.5408 12.321 12.3983 12.2906 12.2769C12.2591 12.1515 12.2838 12.0707 12.3631 12.0404C12.4293 12.0149 12.5073 11.8859 12.5364 11.7535C12.5654 11.6213 12.6634 11.4733 12.754 11.4247C12.9411 11.3246 13.1517 10.8774 13.1517 10.5802C13.1517 10.4707 13.0223 10.193 12.8641 9.96305C12.3946 9.28061 12.3001 8.96103 12.3505 8.2262C12.3815 7.775 12.4618 7.43272 12.6194 7.0818C12.8306 6.61102 12.8405 6.53633 12.7855 5.83309C12.7276 5.09282 12.7288 5.086 12.8982 5.17673C12.9923 5.22707 13.0694 5.30284 13.0694 5.34512C13.0694 5.38732 13.1254 5.4004 13.1939 5.37416C13.2623 5.34783 13.3682 5.36782 13.4294 5.41858C13.519 5.49294 13.5505 5.43708 13.5928 5.12836C13.6786 4.50236 13.65 4.25032 13.4576 3.93781C13.1207 3.39078 10.892 1.58451 10.0796 1.20019C8.5997 0.50015 6.02693 0.384821 4.73939 0.96089C4.28145 1.1658 4.25973 1.16794 4.10187 1.02514C3.91876 0.859381 3.88133 0.416985 4.03722 0.261102C4.09151 0.20681 4.2251 0.111844 4.30917 0.111844C4.39324 0.111844 4.4189 0.125372 4.39094 0.0801288C4.30711 -0.0554362 3.83732 -0.0129898 3.48336 0.162225Z" fill="#FDFDFD"></path></svg></button></div>
  <div vp-additional-options="" class="vp--off vp-enabled"><button class="vpw-translator-button" data-title="Tradutor"><svg viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.39719 7.97288L4.88063 9.5H3.5625L5.77362 3.5625H7.29838L9.5 9.5H8.11419L7.59762 7.97288H5.39719ZM7.33756 7.09888L6.53125 4.69775H6.47306L5.66675 7.09888H7.33756Z" fill="#FDFDFD"></path><path d="M0 2.375C0 1.74511 0.250223 1.14102 0.695621 0.695621C1.14102 0.250223 1.74511 0 2.375 0H10.6875C11.3174 0 11.9215 0.250223 12.3669 0.695621C12.8123 1.14102 13.0625 1.74511 13.0625 2.375V5.9375H16.625C17.2549 5.9375 17.859 6.18772 18.3044 6.63312C18.7498 7.07852 19 7.68261 19 8.3125V16.625C19 17.2549 18.7498 17.859 18.3044 18.3044C17.859 18.7498 17.2549 19 16.625 19H8.3125C7.68261 19 7.07852 18.7498 6.63312 18.3044C6.18772 17.859 5.9375 17.2549 5.9375 16.625V13.0625H2.375C1.74511 13.0625 1.14102 12.8123 0.695621 12.3669C0.250223 11.9215 0 11.3174 0 10.6875V2.375ZM2.375 1.1875C2.06006 1.1875 1.75801 1.31261 1.53531 1.53531C1.31261 1.75801 1.1875 2.06006 1.1875 2.375V10.6875C1.1875 11.0024 1.31261 11.3045 1.53531 11.5272C1.75801 11.7499 2.06006 11.875 2.375 11.875H10.6875C11.0024 11.875 11.3045 11.7499 11.5272 11.5272C11.7499 11.3045 11.875 11.0024 11.875 10.6875V2.375C11.875 2.06006 11.7499 1.75801 11.5272 1.53531C11.3045 1.31261 11.0024 1.1875 10.6875 1.1875H2.375ZM10.8514 13.0566C11.0806 13.414 11.3287 13.7489 11.5995 14.0612C10.7112 14.744 9.61281 15.2499 8.3125 15.5954C8.52388 15.8531 8.84806 16.3495 8.97156 16.625C10.3075 16.1987 11.4416 15.6227 12.3987 14.8509C13.3214 15.6406 14.4638 16.2343 15.8781 16.5989C16.036 16.2972 16.3697 15.7997 16.625 15.542C15.2891 15.2416 14.1823 14.7179 13.2763 14.0173C14.0849 13.1302 14.7274 12.0567 15.2012 10.7433H16.625V9.5H13.0625V10.7433H13.9709C13.5933 11.7456 13.0922 12.5792 12.4604 13.2727C12.2859 13.0868 12.1214 12.8918 11.9676 12.6884C11.6325 12.9033 11.2485 13.0299 10.8514 13.0566Z" fill="#FDFDFD"></path></svg></button>
<button class="vpw-help-button" data-title="Ajuda"><svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.95 16C10.3 16 10.596 15.879 10.838 15.637C11.08 15.395 11.2007 15.0993 11.2 14.75C11.2 14.4 11.0793 14.104 10.838 13.862C10.5967 13.62 10.3007 13.4993 9.95 13.5C9.6 13.5 9.30433 13.621 9.063 13.863C8.82167 14.105 8.70067 14.4007 8.7 14.75C8.7 15.1 8.821 15.396 9.063 15.638C9.305 15.88 9.60067 16.0007 9.95 16ZM9.05 12.15H10.9C10.9 11.6 10.9627 11.1667 11.088 10.85C11.2133 10.5333 11.5673 10.1 12.15 9.55C12.5833 9.11667 12.925 8.704 13.175 8.312C13.425 7.92 13.55 7.44933 13.55 6.9C13.55 5.96667 13.2083 5.25 12.525 4.75C11.8417 4.25 11.0333 4 10.1 4C9.15 4 8.379 4.25 7.787 4.75C7.195 5.25 6.78267 5.85 6.55 6.55L8.2 7.2C8.28333 6.9 8.471 6.575 8.763 6.225C9.055 5.875 9.50067 5.7 10.1 5.7C10.6333 5.7 11.0333 5.846 11.3 6.138C11.5667 6.43 11.7 6.75067 11.7 7.1C11.7 7.43333 11.6 7.746 11.4 8.038C11.2 8.33 10.95 8.60067 10.65 8.85C9.91667 9.5 9.46667 9.99167 9.3 10.325C9.13333 10.6583 9.05 11.2667 9.05 12.15ZM10 20C8.61667 20 7.31667 19.7373 6.1 19.212C4.88333 18.6867 3.825 17.9743 2.925 17.075C2.025 16.175 1.31267 15.1167 0.788 13.9C0.263333 12.6833 0.000666667 11.3833 0 10C0 8.61667 0.262667 7.31667 0.788 6.1C1.31333 4.88333 2.02567 3.825 2.925 2.925C3.825 2.025 4.88333 1.31267 6.1 0.788C7.31667 0.263333 8.61667 0.000666667 10 0C11.3833 0 12.6833 0.262667 13.9 0.788C15.1167 1.31333 16.175 2.02567 17.075 2.925C17.975 3.825 18.6877 4.88333 19.213 6.1C19.7383 7.31667 20.0007 8.61667 20 10C20 11.3833 19.7373 12.6833 19.212 13.9C18.6867 15.1167 17.9743 16.175 17.075 17.075C16.175 17.975 15.1167 18.6877 13.9 19.213C12.6833 19.7383 11.3833 20.0007 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#FDFDFD"></path></svg></button></div>
  <div vp-controls="" class="vpw-controls vpw-subtitles vpw-stopped"><span class="vpw-selectTextLabel">Escolha um texto para traduzir.</span>

<button class="vpw-controls-button">
	<span title="Tocar animação" class="vpw-component-play"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.067 24.5665C10.6152 24.8601 10.1575 24.8768 9.69396 24.6166C9.23132 24.3573 9 23.9565 9 23.4144V9.38601C9 8.84386 9.23132 8.44266 9.69396 8.18242C10.1575 7.92309 10.6152 7.94026 11.067 8.23393L22.1135 15.2481C22.5201 15.5192 22.7234 15.9032 22.7234 16.4002C22.7234 16.8972 22.5201 17.2812 22.1135 17.5523L11.067 24.5665Z" fill="#0F2B54"></path></svg></span>
	<span title="Parar animação" class="vpw-component-pause"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 23V9H22V23H18ZM10 23V9H14V23H10Z" fill="#0F2B54"></path></svg></span>
	<span title="Reiniciar animação" class="vpw-component-restart"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.0249 12.9H17H16.9V13V15V15.1H17H24H24.1V15V8V7.9H24H22H21.9V8V10.4844C21.1769 9.6871 20.3237 9.06605 19.3412 8.62188C18.2783 8.14071 17.1642 7.9 16 7.9C13.7407 7.9 11.8234 8.68514 10.2543 10.2543C8.68514 11.8234 7.9 13.7407 7.9 16C7.9 18.2593 8.68514 20.1766 10.2543 21.7457C11.8234 23.3149 13.7407 24.1 16 24.1C17.8554 24.1 19.5104 23.5344 20.9615 22.4039C22.4122 21.2737 23.3745 19.8132 23.8467 18.0255L23.8798 17.9H23.75H21.65H21.5789L21.5555 17.9672C21.1457 19.1476 20.4334 20.0972 19.4171 20.8184C18.4009 21.5396 17.2629 21.9 16 21.9C14.3596 21.9 12.9684 21.327 11.8207 20.1793C10.673 19.0316 10.1 17.6404 10.1 16C10.1 14.3596 10.673 12.9684 11.8207 11.8207C12.9684 10.673 14.3596 10.1 16 10.1C17.0661 10.1 18.0531 10.3622 18.9631 10.8866C19.8223 11.3822 20.5092 12.0529 21.0249 12.9Z" fill="#0F2B54" stroke="#0F2B54" stroke-width="0.2"></path></svg></span>
</button>

<div class="vpw-controls-slider">
	<div class="vpw-slider noUi-target noUi-ltr noUi-horizontal noUi-connect" disabled="true"><div class="noUi-base"><div class="noUi-origin noUi-background noUi-stacking" style="left: 100%;"><div class="noUi-handle noUi-handle-lower"></div></div></div></div>
</div>

<button title="Alterar velocidade" class="vpw-button-speed">1x</button>
<button title="Ativar/desativar legenda" class="vpw-controls-subtitles"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.4 15.8H12.1V14.1H10.4V15.8ZM10.4 19.2H17.2V17.5H10.4V19.2ZM18.9 19.2H20.6V17.5H18.9V19.2ZM13.8 15.8H20.6V14.1H13.8V15.8ZM8.7 22.6C8.2325 22.6 7.83243 22.4337 7.4998 22.1011C7.1666 21.7679 7 21.3675 7 20.9V10.7C7 10.2325 7.1666 9.83243 7.4998 9.4998C7.83243 9.1666 8.2325 9 8.7 9H22.3C22.7675 9 23.1679 9.1666 23.5011 9.4998C23.8337 9.83243 24 10.2325 24 10.7V20.9C24 21.3675 23.8337 21.7679 23.5011 22.1011C23.1679 22.4337 22.7675 22.6 22.3 22.6H8.7Z" fill="#0F2B54"></path></svg></button>
<button title="Ativar/desativar tela cheia" class="vpw-controls-fullscreen"><svg id="vw-max-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 10.5L8 8L10.5 8L10.5 6L6 6L6 10.5L8 10.5Z" fill="black"></path><path d="M16 13.5L16 16L13.5 16L13.5 18H18L18 13.5H16Z" fill="black"></path><path d="M10.5 16H8L8 13.5H6L6 18H10.5V16Z" fill="black"></path><path d="M13.5 8L16 8L16 10.5L18 10.5V6L13.5 6V8Z" fill="black"></path></svg><svg id="vw-min-icon" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.2786 24V24.15H11.4286H13.7143H13.8643V24V18.2857V18.1357H13.7143H8H7.85V18.2857V20.5714V20.7214H8H11.2786V24ZM18.1357 24V24.15H18.2857H20.5714H20.7214V24V20.7214H24H24.15V20.5714V18.2857V18.1357H24H18.2857H18.1357V18.2857V24ZM7.85 13.7143V13.8643H8H13.7143H13.8643V13.7143V8V7.85H13.7143H11.4286H11.2786V8V11.2786H8H7.85V11.4286V13.7143ZM18.1357 13.7143V13.8643H18.2857H24H24.15V13.7143V11.4286V11.2786H24H20.7214V8V7.85H20.5714H18.2857H18.1357V8V13.7143Z" fill="#0F2B54" stroke="#0F2B54" stroke-width="0.3"></path></svg></button>
<button title="Pular animação" class="vpw-skip-welcome-message vp-disabled"><svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.58 10.89L7.35 6.82C7.91 6.42 7.91 5.58 7.35 5.19L1.58 1.11C0.91 0.65 0 1.12 0 1.93V10.07C0 10.88 0.91 11.35 1.58 10.89ZM10 1V11C10 11.55 10.45 12 11 12C11.55 12 12 11.55 12 11V1C12 0.45 11.55 0 11 0C10.45 0 10 0.45 10 1Z" fill="#0D459D"></path></svg><span>Pular</span></button></div>
  <span vp-click-blocker="" class="vp-enabled"></span>
<div id="gameContainer" class="emscripten" style="padding: 0px; margin: 0px; border: 0px; background: rgb(255, 255, 255);"><canvas id="#canvas" style="cursor: default;" height="370"></canvas><div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); background: url(&quot;data:image/png;base64,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&quot;) center center / contain no-repeat; width: 154px; height: 130px; display: none;"></div><div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); height: 18px; width: 141px; margin-top: 90px; display: none;"><div style="background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAI0AAAASCAYAAABmbl0zAAAACXBIWXMAAAsSAAALEgHS3X78AAAAUUlEQVRo3u3aMQ4AEAxAUcRJzGb3v1mt3cQglvcmc/NTA3XMFQUuNCPgVk/nahwchE2D6wnRIBpEg2hANIgG0SAaRAOiQTR8lV+5/avBpuGNDcz6A6oq1CgNAAAAAElFTkSuQmCC&quot;) right center / cover no-repeat; float: right; width: 0%; height: 100%; display: inline-block;"></div><div style="background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAI0AAAASCAYAAABmbl0zAAAACXBIWXMAAAsSAAALEgHS3X78AAAAQElEQVRo3u3SMREAMAgAsVIpnTvj3xlogDmR8PfxftaBgSsBpsE0mAbTYBowDabBNJgG04BpMA2mwTSYBkzDXgP/hgGnr4PpeAAAAABJRU5ErkJggg==&quot;) left center / cover no-repeat; float: left; width: 100%; height: 100%; display: inline-block;"></div></div></div></div></div>
		  </div>
          <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
          <script>
			new window.VLibras.Widget('https://vlibras.gov.br/app');
		  </script>
</body>
</html>

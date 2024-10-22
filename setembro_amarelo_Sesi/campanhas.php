<?php include 'header.php'; ?>

<main>
    <h1>Campanhas de 2024</h1>
    <section>
        <h2>Campanhas Mensais</h2>
        <ul>
            <?php
                $campanhas = [
                    "Janeiro Branco" => [
                        "descricao" => "Conscientização sobre saúde mental.",
                        "imagem" => "janeiro_branco.jpg"
                    ],
                    "Fevereiro Roxo" => [
                        "descricao" => "Prevenção do câncer com foco em exames regulares.",
                        "imagem" => "fevereiro_roxo.jpg"
                    ],
                    "Março Verde" => [
                        "descricao" => "Conscientização sobre saúde do fígado e alimentação saudável.",
                        "imagem" => "março_verde.jpg"
                    ],
                    "Abril Azul" => [
                        "descricao" => "Inclusão e apoio às pessoas com autismo.",
                        "imagem" => "abril_azul.jpg"
                    ],
                    "Maio Amarelo" => [
                        "descricao" => "Segurança no trânsito e redução de acidentes.",
                        "imagem" => "maio_amarelo.jpg"
                    ],
                    "Junho Vermelho" => [
                        "descricao" => "Incentivo à doação de sangue.",
                        "imagem" => "junho_vermelho.jpg"
                    ],
                    "Julho Verde" => [
                        "descricao" => "Prevenção do câncer bucal.",
                        "imagem" => "julho_verde.jpg"
                    ],
                    "Agosto Dourado" => [
                        "descricao" => "Promoção da amamentação.",
                        "imagem" => "agosto_dourado.jpg"
                    ],
                    "Setembro Amarelo" => [
                        "descricao" => "Prevenção ao suicídio e promoção da saúde mental.",
                        "imagem" => "setembro_amarelo.jpg"
                    ],
                    "Outubro Rosa" => [
                        "descricao" => "Conscientização sobre câncer de mama.",
                        "imagem" => "outubro_rosa.jpg"
                    ],
                    "Novembro Azul" => [
                        "descricao" => "Prevenção do câncer de próstata.",
                        "imagem" => "novembro_azul.jpg"
                    ],
                    "Dezembro Laranja" => [
                        "descricao" => "Prevenção do câncer de pele.",
                        "imagem" => "dezembro_laranja.jpg"
                    ]
                ];

                foreach ($campanhas as $nome => $dados) {
                    echo "<li><strong>$nome</strong>: {$dados['descricao']}";
                    echo "<br><img src='{$dados['imagem']}' alt='Imagem da campanha $nome' class='campanha'></li>";
                }
            ?>
        </ul>
    </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>

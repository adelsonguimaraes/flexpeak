<?php
    $control = new AlunoControl();
    $resp = $control->listar();
    if ($resp['success']===false) die ($resp);
    $alunos = $resp['data'];
?>

<style>
    .table-memorando {
        width: 100%;    
        font-size: 14px;
        border-spacing: -0.5px; /* removendo espaço das borda */
    }
    .table-memorando td {
        border: 1px solid #afafaf;
        padding: 5px;
    }
    .table-memorando thead td {
        background: #ccc;
        font-weight: bold;
    }
    .table-memorando tbody td {
        font-size: 10px;
    }
</style>
<div class="corpo-capa">
    <table class="table-memorando">
        <thead>
            <tr>
                <td align=center colspan="3">
                    Relatório de Alunos
                </td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>Curso</td>
                <td>Professor</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $exonerados_justificados = 0;
                foreach ($alunos as $key) {
                    ?>
                        <tr>
                            <td><?php echo $key['nome'] ?></td>
                            <td><?php echo $key['curso'] ?></td>
                            <td><?php echo $key['professor'] ?></td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
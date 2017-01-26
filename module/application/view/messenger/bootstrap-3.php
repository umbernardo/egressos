<?php
use Cupcake\Messenger\FlashMessenger;

/* @var $messenger FlashMessenger */

if ($messenger->existeMensagens()) {
    $mensagens = $messenger->listarMensagens();
    ?>
    <div class="modal fade" id="modalMsg">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><?= $this instanceof ControllerComTraducaoInterface ? $this->__('Informações') : 'Informações' ?></h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($mensagens as $k) {
                        ?>
                        <p class="text-<?= $k['classe'] ?>"><?= $k['mensagem'] ?></p>
                        <?php
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?= $this instanceof ControllerComTraducaoInterface ? $this->__('Fechar') : 'Fechar' ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
        jQuery('#modalMsg').modal('show');
    </script>
    <?php
}
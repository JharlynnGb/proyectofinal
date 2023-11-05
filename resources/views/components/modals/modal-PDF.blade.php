<div class="modal fade z-index-n2 position-absolute" id="modal-PDF" tabindex="-1" role="dialog"
    aria-labelledby="modal-dialog" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-end modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">MI BOLETA</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="pdfContainer">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-white ml-auto"
                    data-bs-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#modal-PDF').on('show.bs.modal', function(e) {
            console.log('El evento show.bs.modal se activó.');
            var pdfUrl = "{{ asset('/storage/' . $boleta->Boleta) }}"; // URL del PDF
            var pdfContainer = document.getElementById('pdfContainer');

            // Cargar el PDF en el contenedor
            var pdfViewer = PDFViewer({
                container: pdfContainer
            });
            pdfViewer.load(pdfUrl);
        });
    });
</script>


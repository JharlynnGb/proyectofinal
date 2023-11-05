<div id="calendar"></div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveBtn">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                $('#bookingModal').modal('toggle');
            },
            locale: 'es',
        });

        $("#bookingModal").on("hidden.bs.modal", function() {
            $('#title').val(''); // Restablecer el valor del campo de título
        });
    });
</script>

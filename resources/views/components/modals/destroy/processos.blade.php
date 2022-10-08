<div class="modal fade" id="delete_processo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete_processoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete_processoLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja deletar este processo?
                Esta ação não pode ser desfeita
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('processos.destroy') }}" method="get">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const delete_processo = document.getElementById('delete_processo')
    delete_processo.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-id')

        console.log(recipient);
        const modalID = delete_processo.querySelector('#id')
        const titulo = delete_processo.querySelector('.modal-title')
        modalID.value = recipient;
        titulo.textContent = "Excluir o processo numero: " + recipient + "?"
    })

</script>

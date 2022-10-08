<div class="modal fade" id="delete_pessoa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete_pessoaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete_pessoaLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja deletar esta pessoa?
                Esta ação não pode ser desfeita
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('pessoas.destroy') }}" method="get">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const delete_pessoa = document.getElementById('delete_pessoa')
    delete_pessoa.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-id')
        const name = button.getAttribute('data-bs-name')

        console.log(recipient);
        const modalID = delete_pessoa.querySelector('#id')
        const titulo = delete_pessoa.querySelector('.modal-title')
        modalID.value = recipient;
        titulo.textContent = "Excluir  " + name + "?"
    })

</script>

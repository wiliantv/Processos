<div class="modal fade @error('numero') show @enderror" id="novoPraso_Modal" tabindex="-1" aria-labelledby="novoPraso_ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form method="POST" action="{{ route('praso') }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="novoPraso_ModalLabel">Novo Praso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="processo" name="processo" value="{{ old('processo') }}">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Tipo:</label>
                        <input type="text" class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo" value="{{ old('tipo') }}">
                    </div>
                    <div class="form-group">
                        <label for="data_final" class="col-form-label">Data para o fim do praso:</label>
                        <input type="date" class="form-control @error('data_final') is-invalid @enderror" id="data_final" name="data_final" value="{{ old('data_final') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const novoPraso_Modal = document.getElementById('novoPraso_Modal')
    novoPraso_Modal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-id')

        const modalID = novoPraso_Modal.querySelector('#processo')
        modalID.value = recipient
    });
</script>

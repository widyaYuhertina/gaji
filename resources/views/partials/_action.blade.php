<div class="btn-group" role="group">
    <form action="{{ $form_url }}" method="post" class="form-inline">
        @method('DELETE')
        @csrf
        <a class="btn btn-sm btn-warning" href="{{ $edit_url }}"><i class="fa fa-edit"></i> Edit</a> &nbsp;
        <button type="submit" onclick="return confirm('Anda Yakin?')" class="btn btn-sm btn-danger"><i
                class="fa fa-trash"></i> Hapus</button>
    </form>
</div>

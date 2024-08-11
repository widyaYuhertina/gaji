@if ($errors->any())
    <div class="alert bg-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" ariahidden="true">x</button>
        <h5><i class="icon fas fa-times"></i>Upps Error!!!</h5>

        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

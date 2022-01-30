<div>
    {{--@section('meta-description', 'Description')--}}
    {{--@section('meta-keywords', 'admin,path')--}}
    {{--@section('meta-author', 'Indieapps Studio')--}}
    {{--@section('title-page', 'Dashboard')--}}

    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Apps</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    @endsection
    @section('page-options')
        <a href="#" class="btn btn-secondary">Settings</a>
        <a href="#" class="btn btn-primary">Upgrade</a>
    @endsection

    <div class="row">
        <div class="col">
            <a wire:click="delete" href="#" class="btn btn-secondary">Modal</a>
            <a wire:click="message" href="#" class="btn btn-secondary">Toast</a>
        </div>
    </div>
</div>
